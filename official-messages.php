<?php
include("app/includes/resources/security.php");
include('app/classes/Official_messages.php');

echo addNPCBox(14, $txt['inbox_title'], $txt['inbox_npc_msg']);
?>

<div class="red"><?=$txt['inbox_warning']?></div>
<div style="width: 100%; display: flex" class="box-content">
    <table style="flex: 0 0 17%;" class="msg-table">
        <tr>
            <td class="selected" onclick="window.location = './official-messages'">
                <i class="material-icons" style="font-size: 30px">email</i> <br><?=$txt['inbox_official']?> <span class="badges" id="official-badges">0</span>
            </td>
        </tr>
        <tr>
            <td onclick="window.location = './inbox'">
                <i class="material-icons" style="font-size: 30px">people</i> <br><?=$txt['inbox_conversations']?> <span class="badges" id="mail-badges">0</span>
            </td>
        </tr>
        <tr>
            <td onclick="window.location = './inbox&action=send'" id="new_msg">
                <i class="material-icons" style="font-size: 30px">message</i> <br><?=$txt['inbox_new_conv']?>
            </td>
        </tr>
        <tr>
            <td onclick="window.location = './blocklist'">
                <i class="material-icons" style="font-size: 30px">block</i> <br><?=$txt['inbox_blocked']?> (<span id="block-badges">0</span>)
            </td>
        </tr>
    </table>

    <script>
        $('#official-badges').text(<?=$official_count?>);
        $('#mail-badges').text(<?=$mails_count?>);

        <?php
            $blocks = (count(explode(',', $gebruiker['blocklist']))-1)/2;
        ?>

        $('#block-badges').text(<?=$blocks?>);
    </script>

    <div style="flex: 1;" class="msg-container">
        <div class="title"><p id="title"></p></div>
        <div style="max-height: 500px; overflow-y: auto;">
            <ul class="ul">
                <?php
                    
                    $var = new Official ( $_GET['id'] ?? '' );

                    if ( empty ( $_GET['id'] ) ) {
                        $var->include_list ();
                    } else {
                        $var->include_by_id ();
                    }

                ?>
            </ul>
        </div>
    </div>
</div>