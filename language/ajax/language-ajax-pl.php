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
	$txt['alert_fail']				= 'Pudełko'.($_POST['newbox'] ?? '').'Jest pełno!';

	$txt['pagetitle']	= 'Czy chcesz przenieść skrzynkę %s?';
	$txt['information']	= 'Informacja';
	$txt['pokemon']		= 'Pokémony';
	$txt['level']		= '<b>Poz.</b> %s';
	$txt['button']		= 'Przenosić';
	$txt['box1']		= 'Aktualne pudełko';
	$txt['box2']		= 'Nowe pudełko';
}

/* === externalized strings (generated) === */

# daily-bonus
$txt['bonus_won_silvers'] = 'Gratulacje, wygrałeś %s <b>%s</b>!';
$txt['bonus_already_claimed'] = 'Odebrałeś już dziś swoją codzienną nagrodę!';
$txt['bonus_won_vip_days'] = 'Gratulacje, wygrałeś %s <b>%s</b> dzień/dni!';
$txt['bonus_won_item'] = 'Gratulacje, wygrałeś %s <b>%s</b>!';
$txt['bonus_won_exp'] = 'Gratulacje, zdobyłeś <b>%s</b> punktów doświadczenia!';

# poke-loot
$txt['loot_invalid_access'] = 'Nieprawidłowy dostęp!';
$txt['loot_won_silvers'] = 'Gratulacje, wygrałeś %s <b>%s</b> w <b>Poké-Loot</b>!';
$txt['loot_won_item'] = 'Gratulacje, wygrałeś <b>x%s</b> %s w <b>Poké-Loot</b>!';
$txt['loot_no_bag_space'] = 'Nie masz wystarczająco miejsca w plecaku!';
$txt['loot_won_vip_day'] = 'Gratulacje, wygrałeś <b>1 dzień</b> %s w <b>Poké-Loot</b>!';

# sell-box
$txt['sellbox_cannot_trade'] = 'Tym Pokémonem nie można handlować!';
$txt['sellbox_method_missing'] = 'Ta metoda sprzedaży nie istnieje!';
$txt['sellbox_in_daycare'] = 'Ten Pokémon jest w żłobku.';
$txt['sellbox_trainer_invalid'] = 'Ten trener nie istnieje lub to ty!';
$txt['sellbox_limit'] = 'Nie możesz wystawić więcej niż %s Pokémonów na tę sprzedaż!';
$txt['sellbox_confirm_title'] = 'CZY NA PEWNO CHCESZ SPRZEDAĆ TEGO <b>%s</b>?';
$txt['sellbox_select_method'] = 'WYBIERZ METODĘ SPRZEDAŻY';
$txt['sellbox_auction'] = 'Aukcja';
$txt['sellbox_auction_upper'] = 'AUKCJA';
$txt['sellbox_direct'] = 'Sprzedaż bezpośrednia';
$txt['sellbox_direct_upper'] = 'SPRZEDAŻ BEZPOŚREDNIA';
$txt['sellbox_private'] = 'Sprzedaż prywatna';
$txt['sellbox_private_upper'] = 'SPRZEDAŻ PRYWATNA';
$txt['sellbox_start_price'] = 'Cena początkowa:';
$txt['sellbox_between'] = 'między';
$txt['sellbox_until'] = 'a';
$txt['sellbox_auction_info'] = 'Ta kwota może wzrosnąć dzięki ofertom. <br>Ten Pokémon zostanie sprzedany po maksymalnie <b>48</b> godzinach; jeśli nie będzie ofert, wróci do twojego domu!';
$txt['sellbox_negotiable'] = 'Cena do negocjacji:';
$txt['sellbox_negotiable_hint'] = '(Zaznacz, aby otrzymywać oferty negocjacji ceny)';
$txt['sellbox_direct_info'] = 'Jeśli ten Pokémon nie zostanie sprzedany w ciągu <b>2</b> dni, wróci do twojego domu!';
$txt['sellbox_trainer'] = 'Trener:';
$txt['sellbox_trainer_hint'] = '(Nazwa trenera, któremu chcesz sprzedać)';
$txt['sellbox_submit'] = 'SPRZEDAJ POKÉMONA!';

# league
$txt['league_won_opponent_not_ready'] = 'Wygrałeś!<br/>Twój przeciwnik nie był gotowy!';
$txt['league_lost_not_ready'] = 'Przegrałeś!<br/>Nie byłeś gotowy do walki!';
$txt['league_creating_battle'] = 'Poczekaj, walka jest tworzona ...';
$txt['league_not_created_5min'] = 'Walka nie została utworzona w ciągu 5 minut';
$txt['league_lost_not_created'] = 'Przegrałeś!<br/>Walka nie została utworzona!';
$txt['league_won_not_created'] = 'Wygrałeś!<br/>Walka nie została utworzona!';
$txt['league_not_time_yet'] = 'To jeszcze nie czas na twoją walkę!';

# map
$txt['map_search_1'] = 'Nic tu nie ma!';
$txt['map_search_2'] = 'Prawie znalazłem legendarnego, ale zniknął!';
$txt['map_search_3'] = 'Nie poddam się!';
$txt['map_search_4'] = 'Jestem pewien, że gdzieś tu był Pokémon...';
$txt['map_search_5'] = 'Mam! O nie, to tylko kamień!';
$txt['map_search_6'] = 'Aaa... nic nie mogę znaleźć!';
$txt['map_search_7'] = 'No dalej, pokażcie się!';
$txt['map_search_8'] = 'Czy jest tu jakiś Pokémon!?';
$txt['map_search_9'] = 'Co jest za mną?! Uff, to tylko mój cień!';
$txt['map_search_10'] = 'Czy to Pokémon na niebie?! Ach, to tylko chmura.';
$txt['map_search_11'] = 'Chyba te Pokémony się mnie boją.';
$txt['map_search_12'] = 'Znalazłem ślady! Ech, to moje...';
$txt['map_safari_closed'] = 'Strefa Safari jest zamknięta!';

# use-items
$txt['use_choose_pokemon'] = 'Musisz wybrać Pokémona!';
$txt['use_choose_for_item'] = 'Wybierz Pokémona, na którym chcesz użyć %s.';
$txt['use_level'] = 'Poziom';
$txt['use_next'] = 'Dalej';
$txt['use_cannot_learn'] = 'Twój Pokémon nie może nauczyć się tego ataku!';
$txt['use_not_your_pokemon'] = 'Ten Pokémon nie należy do ciebie!';
$txt['use_already_learned'] = '%1$s już zna atak %2$s!';
$txt['use_learning'] = '%1$s uczy się %2$s - %3$s.';
$txt['use_item_missing'] = 'Nie masz tego przedmiotu!';
$txt['use_item_not_equippable'] = 'Tego przedmiotu nie można założyć temu Pokémonowi!';
$txt['use_item_already_equipped'] = 'Pokémon ma już założony ten przedmiot!';
$txt['use_item_egg'] = 'Tego przedmiotu nie można założyć jaju Pokémona!';
$txt['use_choose_receive_item'] = 'Wybierz, który Pokémon otrzyma przedmiot %s.';
$txt['use_old_item_destroyed'] = 'Jeśli Pokémon ma już przedmiot, stary przedmiot zostanie zniszczony!';
$txt['use_not_equipped'] = 'Nie założono';
$txt['use_no_items_to_equip'] = 'Nie masz przedmiotów do założenia Pokémonom!';
$txt['use_cannot_equip_egg'] = 'Nie możesz założyć tego przedmiotu jaju Pokémona!';
$txt['use_cannot_heal'] = 'Nie możesz uleczyć %s.';
$txt['use_only_fainted'] = 'Działa tylko na Pokémonach, które są całkowicie nieprzytomne.';
$txt['use_not_that_amount'] = 'Nie masz takiej ilości!';
$txt['use_amount_too_high'] = 'Nie możesz użyć tej ilości';
$txt['use_choose_receive_candy'] = 'Wybierz, który Pokémon otrzyma %s.';
$txt['use_spc_limit_25'] = ' Użyłeś już %1$s 25x na %2$s.';
$txt['use_spc_max'] = ' Maksymalnie można użyć %1$sx %2$s.';
$txt['use_dont_have_amount'] = 'Nie masz %1$s %2$s!';
$txt['use_choose_with_amount'] = 'Wybierz Pokémona, na którym użyjesz %1$s.<br> (Masz %2$s %1$s)';
$txt['use_choose_stone'] = 'Wybierz Pokémona, na którym użyjesz %s.';
$txt['use_evolved'] = 'Gratulacje, twój <strong>%1$s</strong> wyewoluował w <strong>%2$s</strong>!';
$txt['use_choose_for_stone_post'] = 'Wybierz Pokémona, aby użyć %s.';
$txt['use_stone_not_usable'] = 'Na Pokémonie %1$s nie można użyć %2$s.';
$txt['use_yes'] = 'Tak';
$txt['use_no'] = 'Nie';
$txt['use_not_usable'] = 'Nie do użycia';
$txt['use_usable'] = 'Do użycia';
$txt['use_pokemon_label'] = 'Pokémon';
$txt['use_quantity'] = 'Ilość';
$txt['use_equipped_col'] = 'Założony';
$txt['use_equipped_with'] = 'Założony przedmiot: %s';
$txt['use_check'] = 'Wybór:';
$txt['use_name_col'] = 'Nazwa:';
$txt['use_evolves_col'] = 'Ewoluuje:';
$txt['use_confirm_evolve'] = 'Czy na pewno chcesz ewoluować %s?';
$txt['use_stone_evolved'] = 'Gratulacje, twój <strong>%1$s</strong> ewoluował w <strong>%2$s</strong> za pomocą %3$s!';
/* === end externalized strings === */

$txt['battle_multi_hit'] = '%s trafia %d razy.';
$txt['battle_parental_hit'] = '%s trafia %d razy dzięki Parental Bond.';
$txt['battle_recoil'] = '%s otrzymuje obrażenia od odrzutu.';
$txt['battle_copy_move'] = '%s kopiuje ruch %s!';
$txt['battle_copy_pokemon'] = '%s kopiuje %s.';
$txt['battle_rocket_exit'] = 'Zespół R znowu odlatuje!';
$txt['battle_opponent_must_attack'] = 'Przeciwnik musi zaatakować!';
$txt['league_battle_created'] = 'Walka utworzona!<br />Przekierowanie do walki …';
?>
