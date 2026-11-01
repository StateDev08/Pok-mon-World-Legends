<?php
    require_once('app/includes/resources/config.php');
    require_once('language/language-general.php');
    require_once('app/includes/resources/ingame.inc.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Pokémon World Legends</title>
        <link rel="stylesheet" type="text/css" href="<?=$static_url;?>/stylesheets/style.css" />
		<link rel="stylesheet" type="text/css" href="<?=$static_url;?>/stylesheets/style_override.css" />
		<style>
            #logo_login {
                margin-top: 45px;
            }
        </style>

    </head>
    <body>
        <script>window.location = document.baseURI + 'home';</script>
        <audio src="<?=$static_url?>/sounds/select-player.mp3" autoplay loop volume="0.3" style="display: none"></audio>
        <div id="wrap">
            <div id="container_wrap">
                <div id="container_login" style="height: 600px">
                    <a href="#" class="noanimate">
                        <div id="logo_login" class="logo_<?=rand(1, 5)?>"></div>
                    </a>
                    <?php
                        echo addNPCBox(11, $txt['noscript_title'], $txt['noscript_text']);
                    ?>
                </div>
            </div>
        </div>
        <div id="social_menu">
			<ul>
				<li>
					<a href="https://www.facebook.com/pkworldlegends/" class="noanimate" target="_blank">
						<img src="<?=$static_url?>/images/layout/menu/social/facebook.png">
					</a>
				</li>
				<li>
					<a href="https://twitter.com/pkworldlegends/" class="noanimate" target="_blank">
						<img src="<?=$static_url?>/images/layout/menu/social/twitter.png">
					</a>
				</li>
				<li>
					<a href="https://www.instagram.com/pkworldlegends/" class="noanimate" target="_blank">
						<img src="<?=$static_url?>/images/layout/menu/social/instagram.png">
					</a>
				</li>
				<li>
					<a href="#" class="noanimate">
						<img src="<?=$static_url?>/images/layout/menu/social/youtube.png">
					</a>
				</li>
			</ul>
		</div>
		<div id="footer-pokes"></div>
		<div id="footer">
			<div id="footer-container">
				<center>
					<table>
						<tr>
							<td id="footer-left">
								<a href="./"><img src="<?=$static_url?>/images/layout/logo_footer.png" alt="Logo Pokémon World Legends"></a>
							</td>
							<td id="footer-right">
								<?=$txt['footer_trademark']?> <br>
								<p style="font-size: 13px"><?=$txt['footer_not_affiliated']?></p>

								<p style="font-size: 13px"><?=$txt['footer_no_intent']?></p>
								<?=$txt['footer_follow_us']?> <a href="https://www.facebook.com/pkworldlegends/" target="_blank">Facebook</a> / <a href="https://twitter.com/pkworldlegends/" target="_blank">Twitter</a>.
							</td>
						</tr>
					</table>
				</center>
			</div>
		</div>
    </body>
</html>