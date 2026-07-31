<?php if (($_SESSION['share_acc'] ?? '') == 0) { ?>
<table class='in_menu'>
    <tr>
        <td>
            <div class='menu_title'><?=$txt['hmenu_social']?></div>
             <ul>
                <li><a href='./friends-add'><?=$txt['hmenu_find_trainers']?></a></li>
                <li><a href='./attack/duel/invite'><?=$txt['hmenu_challenge_trainers']?></a></li>
                <li><a href='./friends'><?=$txt['hmenu_my_friends']?></a></li>
            </ul>
        </td>
        <td>
            <div class='menu_title'><?=$txt['hmenu_extras']?></div>
             <ul>
                <li><a href='./badges'><?=$txt['hmenu_badges']?></a></li>
                <li><a href='./fishing'><?=$txt['hmenu_fishing']?></a></li>
                <li><a href='./pokedex'><?=$txt['hmenu_pokedex']?></a></li>
            </ul>
        </td>
    </tr>
    <tr>
        <td>
            <div class='menu_title'><?=$txt['hmenu_assistance']?></div>
             <ul>
                <li><a href='./calculator'><?=$txt['hmenu_calculator']?></a></li>
                <li><a href='./information'><?=$txt['hmenu_pokemon_guide']?></a></li>
                <li><a href='./juiz'><?=$txt['hmenu_pokemon_judge']?></a></li>
            </ul>
        </td>
        <td>
            <div class='menu_title'><?=$txt['hmenu_others']?></div>
             <ul>
                <li><a href='./house-seller'><?=$txt['hmenu_buy_house']?></a></li>
                <li><a href='./specialists'><?=$txt['hmenu_pokemon_specialists']?></a></li>
                <li><a href='./statistics'><?=$txt['hmenu_general_stats']?></a></li>
            </ul>
        </td>
    </tr>
</table>
<?php } else { ?>

<table class='in_menu'>
    <tr>
        <td>
            <div class='menu_title'><?=$txt['hmenu_accessible']?></div>
             <ul>
                <li><a href='./statistics'><?=$txt['hmenu_general_stats']?></a></li>
                <li><a href='./information'><?=$txt['hmenu_pokemon_guide']?></a></li>
                <li><a href='./badges'><?=$txt['hmenu_badges']?></a></li>
                <li><a href='./pokedex'><?=$txt['hmenu_pokedex']?></a></li>
            </ul>
        </td>
    </tr>
</table>

<?php } ?>
