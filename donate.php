
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>

<form id="comprar" action="https://ws.pagseguro.uol.com.br/v2/checkout/payment.html" method="post" onsubmit="PagSeguroLightbox(this); return false;"><input type="hidden" name="code" id="code" value="" /></form>

<?php
require_once('app/includes/resources/security-account.php');

echo addNPCBox(18, $txt['titlenpc'], $txt['textnpc']);

if (isset($_POST['pack']) && isset($_POST['button-pack']) && ctype_digit(($_POST['pack'] ?? ''))) {
    $pack = ($_POST['pack'] ?? '');
    $exist = DB::exQuery("SELECT * FROM `donate_packs` WHERE `id`='$pack' AND `ativo`='1'")->fetch_assoc();
    if ($exist) {
        require_once ('app/classes/PagSeguro_WL.php');
        $ps = new PagSeguro();
        $data = date ('d-m-Y H:i:s');
        $status = '1';
        $forma  = 'PagSeguro';
        $price = str_replace(',', '.', $exist['value']);
        $name = 'Pacote '.$exist['naam'];
        
        DB::exQuery("INSERT INTO fatura (`id_user`, `forma`, `data`, `valor`, `status`, `pack_id`, `user_id`) VALUES ('$_SESSION[acc_id]','$forma','$data','$exist[value]','$status', '$exist[id]', '$_SESSION[id]')");
        
        $id_ref = DB::insertID();
        
        $ref = $ps->getCode('1', $name, $price, $id_ref);

        if (isset($ref)) {
            DB::exQuery("UPDATE `fatura` SET `ref` = '$ref' WHERE `id` = '$id_ref';");
            echo "<script>$('#code').val('".$ref."');$('#comprar').submit();</script>";
        } else {
            DB::exQuery("DELETE FROM `fatura` WHERE `id`='$id_ref'");
        }
    } else {
        echo '<div class="red">'.$txt['donate_pack_not_exist'].'</div>';
    }
}

?>

<?php if (!empty($message))	echo $message; ?>

<?php if(true) { ?>
<div class="box-content">
	<table class="general" width="100%">
		<thead>
			<tr>
				<th><?=$txt['donate_featured_title']?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="padding: 13px 0; background: #34465f;">
					<div class="main-carousel">
					    <?php
                			$sql1 = DB::exQuery("SELECT * FROM `donate_packs` WHERE `destaque`='1' AND `ativo`='1'");
                			$i = 1;
                			while($s1 = $sql1->fetch_assoc()) {
                			    $i++;
                		?>
						<div class="destaque" style="margin: 0 10px">
							<table width="99%">
								<tr>
									<th colspan="2"><h3 class="title" style="text-align: center; margin: 0px 0 0;"><?=$s1['naam']?></h3></th>
								</tr>
								<tr>
									<td colspan="2"><img src="<?=$static_url?>/images/layout/logo_footer.png" class="img"></td>
								</tr>
								<tr>
									<td style="padding-top: 21px; width: 49%"><span><b style="cursor: help" title="<?=$s1['msg']?>"><?=$txt['donate_content_label']?></b></span></td>
									<td style="padding-top: 21px; width: 50%"><span>R$ <?=$s1['value']?></span></td>
								</tr>
								<tr>
									<td colspan="2" style="padding-top: 10px;"><form method="post" onsubmit="return confirm('<?=addslashes(sprintf($txt['donate_confirm_buy'], $s1['naam'], 'R$ '.$s1['value']))?>')"><input type="hidden" name="pack" value="<?=$s1['id']?>"><input type="submit" value="<?=$txt['donate_buy_btn']?>" name="button-pack"></form></td>
								</tr>
							</table>
						</div>
						<?php } if ($i == 1) {echo '<div class="red">'.$txt['donate_no_featured'].'</div>';} ?>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?php } ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">

<?php /*<div class="box-content" style="margin-top:7px">
    <h3 class="title">ATÉ DIA 17/08 OS PACOTES A PARTIR DO PROFESSIONAL DARÃO UM PRIMAL DIALGA DE BRINDE!</h3>
    <p>
        <img src="<?=$static_url?>/images/pokemon/902.gif" alt="Primal Dialga" title="Primal Dialga" style="margin: 0 3%;" class="animated delay-2s bounceIn">
    </p>
</div>*/ ?>

<div class="box-content" style="margin-top: 7px">
	<table class="general" width="100%" style="padding: 13px 0;">
		<thead>
			<tr>
				<th colspan="2"><?=$txt['donate_title']?></th>
			</tr>
		</thead>
		<tbody>
			<tr style="background: #34465f;">
			<?php
				$sql = DB::exQuery("SELECT * FROM `donate_packs` WHERE `destaque`='0'");
				$i = 1;

				while($s = $sql->fetch_assoc()) {
				    $top = '40px';
				    // if ($s['id'] >= 3) {
				    //     $top = '7px';
					// }
					if ($s['id'] >= 2) {
				        $top = '21px';
					}
			?>
				<td>
					<center>
					<div class="pack">
						<table width="99%" style="text-align: left">
							<tr>
								<td style="width: 30%">
									<img src="<?=$static_url?>/images/layout/logo_footer.png" style="margin-top: -23px; margin-left: 17px; width: 100px">
								</td>
								<td>
									<h3 class="title" style="background: none;margin-top: 20px;"><?=$s['naam']?></h3>
									<p style="margin-left: 6px;width: 166px;hyphens: manual;word-wrap: break-word;margin: 0 6px;"><?=$s['descritivo']?><form method="post" onsubmit="return confirm('<?=addslashes(sprintf($txt['donate_confirm_buy'], $s['naam'], 'R$ '.$s['value']))?>')"><input type="hidden" name="pack" value="<?=$s['id']?>"><input type="submit" value="<?=$txt['donate_buy_btn']?>" name="button-pack" style="margin-top:<?=$top?>;margin-left:31px"></form></p>		
								</td>
								<td style="width: 25%">
									<div style="margin-top: 61px;">
									<?php if ($s['promo'] == 0) { ?>
										<h3 style="font-weight: bold; font-size: 17px; margin-left: 20px;margin-top: -65px">R$ <?=$s['value']?></h3>
									<?php } else { ?>
										<h3 style="font-weight: bold;font-size: 17px;margin-left: 20px;margin-top: -89px;"><span style="font-size: 10px;text-decoration:line-through;float: right;margin-right: 12px;">R$ <?=$s['value_fix']?></span>
										<span style="margin-top: -3px;float: left;">R$ <?=$s['value']?></span></h3>
									<?php } ?>
									</div>
								</td>
							</tr>
						</table>
					</div>
					</center>
				</td>
			<?php
					if ($i == 2) {
						echo '</tr><tr style="background: #34465f;">';
						$i = 0;
					}
					$i++;
				}
			?>
		</tbody>
	</table>
</div>

<div class="box-content" style="margin-top: 7px">
	<table class="general" width="100%" style="padding: 13px 0;">
		<thead>
			<tr>
				<th colspan="5"><?=$txt['donate_transfers_title']?></th>
			</tr>
			<tr>
			    <th>#</th>
			    <th><?=$txt['donate_package']?></th>
			    <th><?=$txt['donate_transfers_price']?></th>
			    <th><?=$txt['donate_transfers_date']?></th>
			    <th><?=$txt['donate_transfers_status']?></th>
			</tr>
		</thead>
		<tbody>
			<?php
				$sql = DB::exQuery("SELECT * FROM `fatura` WHERE `user_id`='$_SESSION[id]' ORDER BY `id` DESC LIMIT 0, 10");
				$i = 0;
				$status = array($txt['donate_status_pending'], $txt['donate_status_analysis'], $txt['donate_status_paid'], $txt['donate_status_available'], $txt['donate_status_dispute'], $txt['donate_status_refunded'], $txt['donate_status_cancelled']);

				while($f = $sql->fetch_assoc()) {
				    ++$i;
				    $pack = DB::exQuery("SELECT `id`, `naam` FROM `donate_packs` WHERE `id`='$f[pack_id]'")->fetch_assoc();
			?>
				<tr style="text-align: center">
				    <td><?=$i?></td>
				    <td><?=$txt['donate_package']?> <?=$pack['naam']?></td>
				    <td>R$<?=$f['valor']?></td>
				    <td><?=str_replace('-', '/', $f['data'])?></td>
				    <td><b><?=$status[$f['status']-1]?></b></td>
				</tr>
			<?php
				}
				
				if ($i == 0) {
				    echo '<td colspan="5" style="text-align: center">'.$txt['donate_transfers_none'].'</td>';
				}
			?>
		</tbody>
	</table>
</div>

<script>
	var $carousel = $('.main-carousel');

	var $car = $carousel.flickity({
		cellAlign: 'center',
		contain: false,
		pageDots: false,
		wrapAround: false
	});

	$car.resize();
</script>