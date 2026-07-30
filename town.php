<?php
include("app/includes/resources/security.php");

echo addNPCBox(11, $txt['town_title'], $txt['town_npc_text']);
?>

<div class="blue"><?=$txt['town_hover_hint']?></div>
<div class="box-content container-tag" style="padding: 10px">
  <div class="tag">
    <a href="./attack/gyms" title="<?=$txt['town_gyms']?>" id="a" class="noanimate"></a>
    <a href="./specialists" title="<?=$txt['town_specialists']?>" id="b" class="noanimate"></a>
    <a href="./travel" title="<?=$txt['town_travel']?>" id="c" class="noanimate"></a>
    <a href="./bank" title="<?=$txt['town_bank']?>" id="d" class="noanimate"></a>
    <a href="./daycare" title="<?=$txt['town_daycare']?>" id="e" class="noanimate"></a>
    <a href="./transferlist" title="<?=$txt['town_transferlist']?>" id="f" class="noanimate"></a>
    <a href="./market" title="<?=$txt['town_market']?>" id="g" class="noanimate"></a>
    <a href="./casino" title="<?=$txt['town_casino']?>" id="h" class="noanimate"></a>
    <a href="./pokemoncenter" title="<?=$txt['town_pokemoncenter']?>" id="i" class="noanimate"></a>
    <a href="./traders" title="<?=$txt['town_traders']?>" id="j" class="noanimate"></a>
    <a href="./moves" title="<?=$txt['town_moves']?>" id="k" class="noanimate"></a>
    <a href="./fountain" title="<?=$txt['town_fountain']?>" id="l" class="noanimate"></a>
  </div>

  <img src="<?=$static_url?>/images/town/town.png" width="610" height="610"/>
</div>

<style>
  .container-tag {
    position: relative;
  }
  .tag {
    float: left;
    position: absolute;
    left: 0px;
    top: 0px;
  }

  #a {
    width: 98px;
    height: 117px;
    position: absolute;
    left: 218px;
    top: 40px;
  }

  #b {
    width: 44px;
    height: 95px;
    position: absolute;
    left: 343px;
    top: 102px;
  }
  
  #c {
    width: 94px;
    height: 140px;
    position: absolute;
    left: 439px;
    top: 22px;
  }

  #d {
    width: 53px;
    height: 91px;
    position: absolute;
    left: 626px;
    top: 108px;
  }

  #e {
    width: 51px;
    height: 78px;
    position: absolute;
    left: 209px;
    top: 430px;
  }

  #f {
    width: 103px;
    height: 184px;
    position: absolute;
    left: 275px;
    top: 229px;
  }

  #g {
    width: 45px;
    height: 47px;
    position: absolute;
    left: 625px;
    top: 256px;
  }

  #h {
    width: 93px;
    height: 75px;
    position: absolute;
    left: 460px;
    top: 320px;
  }

  #i {
    width: 54px;
    height: 57px;
    position: absolute;
    left: 626px;
    top: 338px;
  }

  #j {
    width: 49px;
    height: 80px;
    position: absolute;
    left: 493px;
    top: 428px;
  }
  
  #k {
    width: 40px;
    height: 91px;
    position: absolute;
    left: 659px;
    top: 465px;
  }

  #l {
    width: 45px;
    height: 47px;
    position: absolute;
    left: 492px;
    top: 248px;
  }
</style>