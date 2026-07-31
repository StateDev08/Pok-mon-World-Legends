<?php
include("app/includes/resources/security.php");
include('app/classes/Messages.php');

echo addNPCBox(14, $txt['inbox_title'], $txt['inbox_npc_msg']);
?>

<div class="red"><?=$txt['inbox_warning']?></div>

<div style="width: 100%; display: flex" class="box-content">
    <table style="flex: 0 0 17%;" class="msg-table">
        <tr>
            <td onclick="window.location = './official-messages'">
                <i class="material-icons" style="font-size: 30px">email</i> <br><?=$txt['inbox_official']?> <span class="badges" id="official-badges">0</span>
            </td>
        </tr>
        <tr>
            <td class="selected" onclick="window.location = './inbox'">
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

    <div style="flex: 1; width: 80%" class="msg-container">
        <div class="title">
            <p id="title"></p>
        </div>
        <div id="div-container" style="max-height: 450px; overflow-y: auto;">
            <ul class="ul" style="margin: 0">
                <?php
                    $var = new Messages ( $_GET['id'] ?? 0 );
                    $is = false;
					if ( empty ($_GET['action']) ) {
                        if (empty($_GET['id'])) {
                            if (isset($_POST['messages'])) {
                                echo $var->delete_conversa(implode("','", ($_POST['messages'] ?? [])));
                            }

                            $var->include_list();
                        } else {
                            $var->include_by_id();
                            $block = $var->blocked ();
                            if (!$block[0]) {
                                $is = true;
                            }
                        }
                    } else if ( !empty ($_GET['action']) && ($_GET['action'] ?? '') == 'send' ) {
						$var->selected_modify('#new_msg');
                        $var->text_modify ('#title', 'Nova Conversa');
                        
                        $player = '';
                        if (!empty($_GET['player'])) {
                            $player = 'value="'.($_GET['player'] ?? '').'"';
                        }

                        $assunto = '';
                        if (!empty($_GET['assunto'])) {
                            $assunto = 'value="'.base64_decode(($_GET['assunto'] ?? '')).'"';
                        }
                        
                        if (isset($_POST['destinatario']) && isset($_POST['assunto']) && isset($_POST['mensagem'])) {
                            $destinatario = strval(strip_tags(($_POST['destinatario'] ?? '')));
                            $assunto = strval(strip_tags(($_POST['assunto'] ?? '')));
                            $mensagem = strval(strip_tags(($_POST['mensagem'] ?? '')));

                            if (empty($destinatario)) {
                                echo '<div class="red">'.$txt['inbox_error_empty_to'].'</div>';
                            } else if (empty($assunto)) {
                                echo '<div class="red">'.$txt['inbox_error_empty_subject'].'</div>';
                            } else if (empty($mensagem)) {
                                echo '<div class="red">'.$txt['inbox_error_empty_msg'].'</div>';
                            } else if ($var->blocked ($destinatario)[0]) { 
                                echo $var->blocked_msg ();
                            } else {
                                $var->create_message ($destinatario, $assunto, $mensagem);
                            }
                        }
                ?>
                    <form action="./inbox&action=send" method="post">
                        <div style='width: 100%;'>
                            <div style='background: #34465f;padding: 10px;border-bottom: 2px solid #27374e;'>
                                <div>
                                    <input type="text" name='destinatario' placeholder="<?=$txt['inbox_to_placeholder']?>" <?=$player?> style='width: 100%; height:30px; padding: 5px 0 5px 10px;' required>
                                    <small style="color: #fff"><?=$txt['inbox_single_recipient']?></small>
                                </div>
                            </div>
                        </div>
                        <div style='width: 100%; margin-top: 10px;'>
                            <div style='background: #34465f;padding: 10px;border-bottom: 2px solid #27374e;'>
                                <div>
                                    <input type="text" name='assunto' placeholder="<?=$txt['inbox_subject_placeholder']?>" <?=$assunto?> style='width: 100%; height:30px; padding: 5px 0 5px 10px;' max="50" required>
                                </div>
                            </div>
                        </div>
                        <div style='width: 100%; margin-top: 10px;'>
                            <div style='background: #34465f;padding: 10px;'>
                                <div>
                                    <textarea name='mensagem' id='mensagem' placeholder="<?=$txt['inbox_msg_placeholder']?>" maxlength="1000" style='padding: 5px 30px 5px 10px; border-radius: 5px; resize: none; height: 190px; width: 100%' required></textarea>
                                    <input type="submit" value="<?=$txt['inbox_send_btn']?>" class="button">
                                </div>
                            </div>
                        </div>
                    </form>
                <?php
					}

                ?>
            </ul>
        </div>
        <?php
            if ($is) {
        ?>
                <div style='width: 100%;float: left; margin-top: 25px;'>
                        <div style='background: #34465f; padding: 10px'>
                            <form method="post" id="messageForm">
                                <table style="width: 100%">
                                    <tr>
                                        <td style="width: 60%; padding-right: 10px">
                                            <textarea name='mensagem' id='mensagem' class="mensagem_<?=($_SESSION['id'] ?? '')?>" placeholder="<?=$txt['inbox_reply_placeholder']?>" maxlength="1000" style='padding: 5px 30px 5px 10px; border-radius: 5px; resize: none; height: 155px; width: 100%' required></textarea>
                                            <input type="hidden" id="conversa" name="conversa" value="<?=($_GET['id'] ?? '')?>"><input type="hidden" id="sender" name="sender" value="<?=($_SESSION['id'] ?? '')?>">
                                        </td>
                                        <td style="width: 40%">
                                            <table style="width: 100%">
                                                <tr>
                                                    <td colspan="6"><b style="color: #fff"><?=$txt['inbox_emojis']?></b></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="<?=$static_url?>/images/emoticons/001.png" style="cursor: pointer;" onclick="emote_chat(':)')"></td>
                                                    <td><img src="<?=$static_url?>/images/emoticons/002.png" style="cursor: pointer;" onclick="emote_chat(':D')"></td>
                                                    <td><img src="<?=$static_url?>/images/emoticons/003.png" style="cursor: pointer;" onclick="emote_chat('xD')"></td>
                                                    <td><img src="<?=$static_url?>/images/emoticons/004.png" style="cursor: pointer;" onclick="emote_chat(':P')"></td>
                                                    <td><img src="<?=$static_url?>/images/emoticons/005.png" style="cursor: pointer;" onclick="emote_chat(';)')"></td>
                                                    <td><img src="<?=$static_url?>/images/emoticons/006.png" style="cursor: pointer;" onclick="emote_chat(':S')"></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="<?=$static_url?>/images/emoticons/007.png" style="cursor: pointer;" onclick="emote_chat(':O')"></td>
                                                    <td><img src="<?=$static_url?>/images/emoticons/008.png" style="cursor: pointer;" onclick="emote_chat('8-)')"></td>
                                                    <td><img src="<?=$static_url?>/images/emoticons/009.png" style="cursor: pointer;" onclick="emote_chat(':*')"></td>
                                                    <td><img src="<?=$static_url?>/images/emoticons/010.png" style="cursor: pointer;" onclick="emote_chat(':(')"></td>
                                                    <td><img src="<?=$static_url?>/images/emoticons/011.png" style="cursor: pointer;" onclick="emote_chat(':\'(')"></td>
                                                    <td><img src="<?=$static_url?>/images/emoticons/012.png" style="cursor: pointer;" onclick="emote_chat(':|')"></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="<?=$static_url?>/images/emoticons/013.png" style="cursor: pointer;" onclick="emote_chat(':b')"></td>
                                                    <td><img src="<?=$static_url?>/images/emoticons/014.png" style="cursor: pointer;" onclick="emote_chat('(BOO)')"></td>
                                                    <td><img src="<?=$static_url?>/images/emoticons/015.png" style="cursor: pointer;" onclick="emote_chat('(zZZ)')"></td>
                                                    <td><img src="<?=$static_url?>/images/emoticons/016.png" style="cursor: pointer;" onclick="emote_chat(':v')"></td>
                                                    <td><img src="<?=$static_url?>/images/emoticons/017.png" style="cursor: pointer;" onclick="emote_chat('(GRR)')"></td>
                                                    <td><img src="<?=$static_url?>/images/emoticons/018.png" style="cursor: pointer;" onclick="emote_chat(':3')"></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="<?=$static_url?>/images/emoticons/019.png" style="cursor: pointer;" onclick="emote_chat('@-)')"></td>
                                                    <td><img src="<?=$static_url?>/images/emoticons/020.png" style="cursor: pointer;" onclick="emote_chat('o_O')"></td>
                                                    <td><img src="<?=$static_url?>/images/emoticons/021.png" style="cursor: pointer;" onclick="emote_chat('._.')"></td>
                                                    <td><img src="<?=$static_url?>/images/emoticons/022.png" style="cursor: pointer;" onclick="emote_chat('(S2)')"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="submit" value="<?=$txt['inbox_send_btn']?>" class="button">
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                    
                    <script>
                        var lock = true;
                        function emote_chat ($param = ':)') {
                            let msg = $('#mensagem').val();
                            msg = msg + ' ' + $param;
                            
                            $('#mensagem').val(msg);
                        }

                        $( '#messageForm' ).submit( function() {
                            let msg = $( '#mensagem' ).val();
                            let conversa = $('#conversa').val();
                            let send = $('#sender').val();
                            
                            if (lock) {
                                if (msg && conversa && send) {
                                    lock = false;
                                    $.ajax({
                                        url: "ajax.php?act=new-message",
                                        type: "POST",
                                        data: { id: conversa, message: msg, sender: send },
                                        success: function(data) {
                                            window.location = './inbox';
                                        }
                                    });
                                }
                            }
                            
                            return false;
                        });
                    </script>
        <?php
            } else {
                if (!empty($block) && $block[0]) {
                    echo $var->blocked_msg();
                }
            }
        ?>
    </div>
</div>