param([Parameter(Mandatory)][string]$BaseUri,[Parameter(Mandatory)][string]$CredentialFile)
$ErrorActionPreference='Stop'
$credentials=Get-Content -LiteralPath $CredentialFile -Raw|ConvertFrom-Json
$checks=0
$tutorText=@{pt='Tutor de golpes';en='Move Tutor';pl='Nauczyciel ataków';ru='Наставник приёмов';zh='招式教学';de='Attacken-Lehrer'}
$base=[uri]($BaseUri.TrimEnd('/')+'/')
foreach($language in @('pt','en','pl','ru','zh','de')){
    $session=New-Object Microsoft.PowerShell.Commands.WebRequestSession
    $session.Cookies.Add([System.Net.Cookie]::new('pa_language',$language,'/',$base.Host))
    function Request($route,$body=$null){
        $args=@{Uri=($base.AbsoluteUri+$route);WebSession=$session;UserAgent='PokemonLocaleIntegration/1.0';SkipHttpErrorCheck=$true}
        if($null -ne $body){$args.Method='Post';$args.Body=$body}
        Invoke-WebRequest @args
    }
    $null=Request '' @{login='1';username=$credentials.username;password=$credentials.password}
    $null=Request 'my_characters' @{submit='1';user_id='900001'}
    foreach($page in @('home','box','account-options','account-options&category=restart','pokedex','items','bank','profile&player=SecurityTrainer','town','transferlist','moves','statistics','online','rankinglist','information')){
        $response=Request ('index.php?page='+$page)
        if([int]$response.StatusCode -ne 200){throw "$language/$page returned $($response.StatusCode)"}
        if($response.Content -notmatch ('<html lang="'+$language+'"')){throw "$language/$page lost its selected language"}
        if($response.Content -match 'Fatal error|Uncaught (?:ArgumentCountError|ValueError)'){throw "$language/$page rendering failed"}
        if($page -eq 'moves' -and !$response.Content.Contains($tutorText[$language])){throw "$language move tutor translation missing"}
        if($language -ne 'pt' -and $response.Content -match 'Recomeçar|Nem todos os personagens|Itens [Ee]specais'){throw "$language/$page contains Portuguese UI text"}
        $checks++
    }
    $table=Request ('public/translations/datatables-'+$language+'.json')
    if([int]$table.StatusCode -ne 200){throw "$language table labels inaccessible"}
    $null=$table.Content|ConvertFrom-Json
    $checks++
    Write-Output "PASS: $language - 15 game views and table language file"
}
Write-Output "PASS: $checks live locale checks across all six languages"
