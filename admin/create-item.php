<?php
require_once __DIR__ . '/../app/includes/GameUrl.php';
#Script laden zodat je nooit pagina buiten de index om kan laden
include("app/includes/resources/security.php");
include_once("language/language-admin.php");

#Admin controle
if ($gebruiker['admin'] < 3) { game_redirect_header('location: ./home'); exit; }

if (isset($_POST['create'])) {
    $naam = ($_POST['naam'] ?? '');
    $soort = str_replace('_', ' ', ($_POST['soort'] ?? ''));
    $beschikbaar = empty($_POST['beschikbaar'])? 0 : 1;
    $silver = ($_POST['silver'] ?? '');
    $gold = ($_POST['gold'] ?? '');
    $roleta = empty($_POST['roleta'])? 'nao' : 'sim';
    $equip = empty($_POST['equip'])? 0 : 1;
    $descr = ($_POST['descr'] ?? '');
    $foto = $_FILES['sprite'];

    // if (!empty($foto['name'])) {
    //     if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])) {
    //         echo "Isso não é uma imagem.";
    //         exit ();
   	//  	} else {
    //         preg_match("/\.(gif|bmp|png|jpg|jpeg) {1}$/i", $foto["name"], $ext);

    //     	$nome_imagem = $naam.".".$ext[1];

    //     	$caminho_imagem = "public/images/items/" . $nome_imagem;

	// 		move_uploaded_file($foto["tmp_name"], $caminho_imagem);        
    //     }
    // } else {
    //     $dir = scandir ('cron/atualizador_db/itens/Itens/');
    //     $name = $naam.'.png';
    //     if (in_array($name, $dir)) {
    //         copy ("cron/atualizador_db/itens/Itens/".$name, "public/images/items/".$name);
    //     } else {
    //         exit ();
    //     }
    // }

    DB::exQuery("ALTER TABLE `gebruikers_item` ADD `$naam` INT(255) NOT NULL DEFAULT 0");
    DB::exQuery("INSERT INTO `markt` (`naam`, `soort`, `beschikbaar`, `silver`, `gold`, `roleta`, `equip`, `omschrijving_nl`, `omschrijving_en`, `omschrijving_pt`) 
    VALUES ('$naam', '$soort', '$beschikbaar', '$silver', '$gold', '$roleta', '$equip', '$descr', '$descr', '$descr')"); 

    header("refresh: 0;");
}

?>

<form method="post" enctype="multipart/form-data">
<center>
<p><?=$txt['adm_item_create']?></p>
<table width="600">
	<tr>
    	<td width="150"><?=$txt['adm_item_name']?></td>
        <td width="200"><input type="text" name="naam" class="text_long"></td>
    </tr>
    <!-- <tr>
        <td>Sprite:</td>
        <td><input type="file" name="sprite" id="sprite"></td>
    </tr> -->
    <tr>
    	<td><?=$txt['adm_item_type']?></td>
        <td>
            <select name="soort" class="text_select" required>
				<option value="none"><?=$txt['adm_choose']?></option>
				<option value="balls"><?=$txt['adm_item_balls']?></option>
                <option value="hm">HM</option>
                <option value="items"><?=$txt['adm_item_items']?></option>
                <option value="potions"><?=$txt['adm_item_potions']?></option>
                <option value="special_items"><?=$txt['adm_item_special']?></option>
                <option value="stones" selected><?=$txt['adm_item_stones']?></option>
                <option value="tm">TM</option>
			</select>
        </td>
    </tr>
    <tr>
    	<td><?=$txt['adm_item_active']?></td>
        <td><input type="checkbox" value="1" name="beschikbaar" class="text_long"/> <?=$txt['adm_item_checkbox_hint']?></td>
    </tr>
    <tr>
    	<td><?=$txt['adm_item_price']?></td>
        <td>Silver: &nbsp;<input type="number" name="silver" min="0" value="0"><br>Gold: &nbsp;&nbsp;&nbsp;<input type="number" name="gold" min="0" value="0"></td>
    </tr>
    <tr>
      <td><?=$txt['adm_item_roulette']?></td>
      <td><input type="checkbox" value="sim" name="roleta" class="text_long"/> <?=$txt['adm_item_checkbox_hint']?></td>
    </tr>
    <tr>
      <td><?=$txt['adm_item_equip']?></td>
      <td><input type="checkbox" value="1" name="equip" class="text_long"/> <?=$txt['adm_item_checkbox_hint']?></td>
    </tr>
    <tr>
      <td><?=$txt['adm_item_description']?></td>
      <td><textarea name="descr" id="" cols="30" rows="5"></textarea></td>
    </tr>
    <tr>
    	<td>&nbsp;</td>
        <td><input type="submit" name="create" value="<?=htmlspecialchars($txt['adm_item_create_btn'], ENT_QUOTES)?>" class="button" style="width: 60%"/></td>
    </tr>
</table>
</center>
</form>