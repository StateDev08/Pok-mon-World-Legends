param([Parameter(Mandatory)][string]$BaseUri,[Parameter(Mandatory)][string]$CredentialFile)
$ErrorActionPreference='Stop'
$credentials=Get-Content -LiteralPath $CredentialFile -Raw|ConvertFrom-Json
$session=New-Object Microsoft.PowerShell.Commands.WebRequestSession
function Request($route,$body=$null,$noRedirect=$false){
    $args=@{Uri=($BaseUri.TrimEnd('/')+'/'+$route);WebSession=$session;UserAgent='PokemonRouteTest/1.0';SkipHttpErrorCheck=$true}
    if($null -ne $body){$args.Method='Post';$args.Body=$body}
    if($noRedirect){$args.MaximumRedirection=0;$args.ErrorAction='SilentlyContinue'}
    Invoke-WebRequest @args
}
$null=Request '' @{login='1';username=$credentials.username;password=$credentials.password}
$null=Request 'my_characters' @{submit='1';user_id='900001'}
$map=Request 'attack/attack_map'
$expected=([uri]($BaseUri.TrimEnd('/')+'/')).AbsolutePath
if($map.Content -notmatch ('<base href="'+[regex]::Escape($expected)+'"')){throw 'Wrong base URL'}
$form=[regex]::Match($map.Content,"(?s)<form[^>]*name='Gras'.*?</form>").Value
if(!$form){throw 'Map form not available'}
$body=@{}
foreach($m in [regex]::Matches($form,"<input type='hidden' value='([^']*)' name='([^']*)'")){$body[$m.Groups[2].Value]=$m.Groups[1].Value}
if($body.Count -ne 2){throw 'Missing map form tokens'}
$response=Request 'attack/attack_map' $body $true
if([int]$response.StatusCode -ne 302){throw "Battle start returned $($response.StatusCode)"}
$target=[string]$response.Headers.Location[0]
if($target -notmatch ('^'+[regex]::Escape($expected)+'attack/(wild/wild-attack|trainer/trainer-attack)$')){throw "Wrong battle redirect: $target"}
$battle=Invoke-WebRequest -Uri ([uri]::new([uri]$BaseUri,$target)) -WebSession $session -UserAgent 'PokemonRouteTest/1.0' -SkipHttpErrorCheck
if([int]$battle.StatusCode -ne 200){throw "Battle page returned $($battle.StatusCode)"}
if($battle.Content -notmatch ('<base href="'+[regex]::Escape($expected)+'"')){throw 'Battle base URL lost'}
Write-Output "PASS: map form POST -> $target -> HTTP 200, installation path preserved"
