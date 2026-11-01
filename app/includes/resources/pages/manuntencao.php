<?php
session_start();
if (isset($_SESSION['acc_id'])) {
    DB::exQuery ("UPDATE `rekeningen` SET locked='0' WHERE `acc_id`='".$_SESSION[acc_id]."' LIMIT 1");
}

session_unset();
session_destroy();

if ($manutencao == 0) {
    echo '<script>window.location = document.baseURI + "";</script>';
}

echo addNPCBox(11, $txt['maintenance_title'], $txt['maintenance_text']);

?>

<audio src="<?=$static_url?>/sounds/select-player.mp3" autoplay loop volume="0.2" style="display: none"></audio>

<style>
    #logo_login {
        margin-top: 45px;
    }
</style>
