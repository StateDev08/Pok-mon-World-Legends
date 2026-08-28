<script src="<?=$static_url?>/javascripts/timeago/jquery.timeago.js"></script>
<?php
$time = (strtotime(date('2019-04-27 03:00:00')) - strtotime(date('Y-m-d H:i:s')));
$time2 = '<span id="timer" data-seconds-left="'.$time.'"></span><script>$("#timer").startTimer();</script>';
echo addNPCBox(11, sprintf($txt['countdown_title'], $time2), $txt['countdown_text']);

?>
<style>
    #logo_login {
        margin-top: 45px;
    }
    
    #container_login div#npc-section #npc-content h3 {
        font-size: 24px; 
    }
</style>