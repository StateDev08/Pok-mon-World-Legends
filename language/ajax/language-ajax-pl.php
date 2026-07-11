<?php
if ($page == 'use_spcitem') {
} else if ($page == 'use_potion') {
} else if ($page == 'use_rarecandy') {
} else if ($page == 'use_stone') {
} else if ($page == 'use_pokemon') {
} else if ($page == 'use_attack') {
} else if ($page == 'use_attack_finish') {
} else if ($page == 'sell-box') {
	$txt['alert_not_your_pokemon']			= 'Uważaj, ten Pokémon nie należy do ciebie!';
	$txt['alert_beginpokemon']				= 'Nie możesz sprzedać swojego Pokémona startera!';
	$txt['alert_too_low_rank']				= 'Nie możesz sprzedawać pokemonów!';
	$txt['alert_geb_too_low_rank']			= 'Ten trener nie może kupić tego Pokémona!';
	$txt['alert_no_amount']					= 'Musisz wprowadzić prawidłową wartość!';
	$txt['alert_price_too_less']			= 'Wartość nie może być mniejsza niż %s!';
	$txt['alert_price_too_much']			= 'Wartość nie może być większa niż %s!';
	$txt['alert_user_dont_exist']			= 'Nie znaleziono trenera!';
	$txt['alert_pokemon_already_for_sale']	= 'Ten Pokémon jest teraz na sprzedaż!';
	$txt['alert_success_sell']				= 'Pokémon pomyślnie ogłoszony!';

	$txt['pagetitle']	= 'Czy na pewno chcesz wystawić %s na sprzedaż?';
	$txt['information']	= 'Informacja';
	$txt['sell']		= 'Sprzedać';
	$txt['pokemon']		= 'Pokémony';
	$txt['min_silver']	= 'Cena minimalna';
	$txt['min_gold']	= 'Cena minimalna';
	$txt['level']		= '<b>Poz.</b> %s';
	$txt['gebruiker']	= 'Trener';
	$txt['price']		= 'Wartość';
	$txt['currency']	= 'Moneta';
	$txt['button']		= 'Wystawić na sprzedaż';
} else if ($page == 'release-box') {
	$txt['alert_not_your_pokemon']			= 'Uważaj, ten Pokémon nie należy do ciebie!';
	$txt['alert_beginpokemon']				= 'Nie możesz wypuścić swojego Pokémona startera!';
	$txt['alert_too_low_rank']				= 'Nie możesz wypuszczać Pokémonów!';
	$txt['alert_success_release']				= 'Pokémon pomyślnie wypuszczony!';

	$txt['pagetitle']	= 'Czy na pewno chcesz porzucić %s?';
	$txt['information']	= 'Informacja';
	$txt['pokemon']		= 'Pokémony';
	$txt['level']		= '<b>Poz.</b> %s';
	$txt['button']		= 'Uwolnienie';
	$txt['irreversivel']    = 'Pamiętaj, że ta czynność jest nieodwracalna.';
} else if ($page == 'transfer-box') {
	$txt['alert_not_your_pokemon']			= 'Uważaj, ten Pokémon nie należy do ciebie!';
	$txt['alert_pokeequiped']			= 'Nie możesz przenieść Pokémona ze swojej drużyny!';
	$txt['alert_success']				= 'Pokémon przeniesiony pomyślnie!';
	$txt['alert_fail']				= 'Pudełko'.$_POST['newbox'].'Jest pełno!';

	$txt['pagetitle']	= 'Czy chcesz przenieść skrzynkę %s?';
	$txt['information']	= 'Informacja';
	$txt['pokemon']		= 'Pokémony';
	$txt['level']		= '<b>Poz.</b> %s';
	$txt['button']		= 'Przenosić';
	$txt['box1']		= 'Aktualne pudełko';
	$txt['box2']		= 'Nowe pudełko';
}
?>