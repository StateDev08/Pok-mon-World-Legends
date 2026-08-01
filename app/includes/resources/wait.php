<?php
if ($type_timer == 'pokecenter') {
	$npc = 33;
	$title = $txt['wait_pokecenter_title'];
	$text = $txt['wait_pokecenter_text'] . '<br /><br /><br /><br />
		' . $txt['wait_pokecenter_end'] . ' <b><span class="timer">' . formatTime($wait_time) . '</span></b>';
} else if ($type_timer == 'travel') {
	$npc = 21;
	$title = $txt['wait_travel_title'];
	$text = sprintf($txt['wait_travel_text'], $gebruiker['wereld']) . '<br /><br /><br /><br />
		' . $txt['wait_travel_end'] . ' <b><span class="timer">' . formatTime($wait_time) . '</span></b>';
}
echo addNPCBox($npc, $title, $text);
