<?php

include("app/includes/resources/security.php");

echo addNPCBox(36, $txt['casino_title'], $txt['casino_npc_text']);

$casino_arr = array($txt['casino_slots'], $txt['casino_kluis'], $txt['casino_quiz'], $txt['casino_wheel'], $txt['casino_store']);

?>

<div class="box-content" style="margin-bottom: 7px"><h3 class="title" style="background: none"> <?=$txt['casino_tickets_inv']?> <img src="<?=$static_url?>/images/icons/ticket.png" title="Tickets" />  <?= highamount($gebruiker['tickets']); ?></h3> </div>

<style>
    .carousel-cell {
        margin: 10px 10px;
        filter: grayscale(100%);
		overflow: hidden;
		transform: scale(0.8);
    }
    .carousel-cell.is-selected {
        filter: grayscale(20%);
        transition: .5s;
		box-shadow: 0 0 15px #0e0d0d66;
		border-radius: 6px;
		transform: scale(1);
    }
</style>

<div class="box-content" style="display: inline-block; width: 100%;">
	<form method="post"><table class="general bordered" width="100%">
		<thead>
			<tr><th colspan="6"><?=$txt['casino_header']?></th></tr>
		</thead>
		<tbody>
			<tr>
				<td style="width: 100%; padding: 0">
					<div style="width: 100%; height: 217px;">
						<div class="main-carousel carousel">
							<div class="carousel-cell" style="text-align: center; width: 300px;">
								<img src="<?=$static_url?>/images/cassino/encartes/slots.png" style="width: 100%; border-radius: 6px; height: 195px;">
							</div>
							<div class="carousel-cell" style="text-align: center; width: 300px;">
								<img src="<?=$static_url?>/images/cassino/encartes/kluis.png" style="width: 100%; border-radius: 6px; height: 195px;">
							</div>
							<div class="carousel-cell" style="text-align: center; width: 300px;">
								<img src="<?=$static_url?>/images/cassino/encartes/who-is-it-quiz.png" style="width: 100%; border-radius: 6px; height: 195px;">
							</div>
							<div class="carousel-cell" style="text-align: center; width: 300px;">
								<img src="<?=$static_url?>/images/cassino/encartes/wheel-of-fortune.png" style="width: 100%; border-radius: 6px; height: 195px;">
							</div>
							<div class="carousel-cell" style="text-align: center; width: 300px;">
								<img src="<?=$static_url?>/images/cassino/encartes/casino-store.png" style="width: 100%; border-radius: 6px; height: 195px;">
							</div>
						</div>
					</div>
				</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td>
				<?php $rand = rand(0, 4); ?>
					<center><a href="#" id="visitar-link" class="noanimate"><button type="button" id="visitar" style="margin: 10px;"><?=sprintf($txt['casino_visit'], $casino_arr[$rand]);?></button></a></center>
				</td>
			</tr>
		</tfoot>
	</table>
	</form>
</div>
<script>
	var $carousel = $('.main-carousel');
	var $links = ['slots', 'kluis', 'who-is-it-quiz', 'wheel-of-fortune', 'casino-store'];
	var $names = ['<?=$txt['casino_slots']?>', '<?=$txt['casino_kluis']?>', '<?=$txt['casino_quiz']?>', '<?=$txt['casino_wheel']?>', '<?=$txt['casino_store']?>'];

    $carousel.flickity({
        pageDots: false,
        initialIndex: <?=$rand?>
    });

	var flkty = $carousel.data('flickity');
	var $input = $('#visitar');
	var $link = $('#visitar-link');

    $carousel.on('select.flickity', function() {
		$link.attr('href', './'+$links[flkty.selectedIndex]);
		$input.text('<?=$txt['casino_visit']?>'.replace('%s', $names[flkty.selectedIndex]));
	});

	$link.attr('href', './'+$links[flkty.selectedIndex]);
</script>