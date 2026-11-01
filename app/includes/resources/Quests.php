<?php

class Quests {

    public function allowedQuest ($uid) {
        $user = $this->getInfos($uid)->fetch_assoc();

        return (int) ($user['rank'] ?? 0) >= 4;
    }

    public function setStatus ($type, $uid, $force = 1) {
        $amount = filter_var($force, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
        if ($amount === false) return;
        $user = $this->getInfos($uid)->fetch_assoc();
        if (!$user || (int) $user['rank'] < 4) return;
        $userId = (int) $user['user_id'];
        $active = array_values(array_slice($this->getActualQuests(), 0, 2));

        foreach ($active as $index => $questId) {
            $definition = $this->getQuest($questId)->fetch_assoc();
            if (!$definition || $type !== $definition['type']) continue;
            $target = (int) $definition['quant_wid'];
            if ($target < 1) continue;
            $slot = $index + 1;
            $column = 'quest_' . $slot . '_req';
            $completed = 'quest_' . $slot;

            if ($type === 'catch_single') {
                // Here force is a species ID, including ID 1, rather than a count.
                if ($amount !== $target) continue;
                $value = (string) $target;
            } else {
                $step = min($amount, $target);
                // Clamp in the same statement that increments to handle concurrent events.
                $value = "LEAST({$target}, `{$column}` + {$step})";
            }
            DB::exQuery("UPDATE `gebruikers` SET `{$column}`={$value} WHERE `user_id`={$userId} AND `rank`>=4 AND `{$completed}`=0");
        }
    }

    public function setQuest ($id) {
        $quest = $this->getQuest($id)->fetch_assoc();
        if ($quest['type'] == 'catch_single') {
            $quant_wid = DB::exQuery("SELECT `wild_id` FROM `pokemon_wild` WHERE `zeldzaamheid` <= 3 AND `aparece` = 'sim' AND `gebied` != '' ORDER BY RAND() LIMIT 1")->fetch_assoc()['wild_id'];
        } else {
            $quant_all = explode(',', $quest['quant_wid_all']);
            shuffle($quant_all);
            $quant_wid = $quant_all[0];
        }

        DB::exQuery("UPDATE `daily_quest` SET `quant_wid`='".$quant_wid."' WHERE `id` = '$id'");
    }

    public function setPrize ($id) {
        $type = array('item', 'silver', 'gold');
        $quant_gold = array(3, 5, 10);
        $quant_silver = array(5000, 7000, 10000, 13000, 15000, 20000);
        $quant_item = array('106-5-10-20', '140-2-4', '62-1', '139-2-4', '103-5-10', '14-1', '27-1', '425-1', '138-2-4', '89-1', '389-2-4', '19-1', '30-1', '68-1', '424-1', '438-1', '116-2-4', '135-2-4', '439-1', '2-1', '126-2-4-5', '127-2-4-5', '128-2-4-5', '129-2-4-5', '130-2-4-5', '442-1-2', '443-1-2-3', '444-1-2-3', '445-1-2-3');
        $rand = rand(1, 100);

        if ($rand <= 65) {
            shuffle($quant_item);

            $type = $type[0];
            $items = explode('-', $quant_item[0]);
            $item = $items[0];
            unset($items[0]);

            $items = array_values($items);
            shuffle($items);
            $qnt = $items[0];
        } else if ($rand <= 90) {
            $type = $type[1];
            $item = '0';
            shuffle($quant_silver);
            $qnt = $quant_silver[0];
        } else {
            $type = $type[2];
            $item = '0';
            shuffle($quant_gold);
            $qnt = $quant_gold[0];
        }

        DB::exQuery("UPDATE `daily_quest` SET `recomp_type`='".$type."',`recomp_id`='".$item."',`recomp_quant`='".$qnt."'  WHERE `id` = '$id'");
    }

    public function getQuest ($id) {
        return DB::exQuery("SELECT * FROM `daily_quest` WHERE id='$id'");
    }

    public function getActualQuests () {
        $q1 = DB::exQuery("SELECT * FROM `configs` WHERE id='6'")->fetch_assoc();
        $q2 = DB::exQuery("SELECT * FROM `configs` WHERE id='7'")->fetch_assoc();
        return array($q1['valor'] ?? 0, $q2['valor'] ?? 0);
    }

    public function getItem ($id) {
        return DB::exQuery("SELECT * FROM `markt` WHERE `id`='$id'");
    }

    public function getInfos ($id, $get = '*') {
        $id = DB::real_escape_string((string) $id);
        if (ctype_digit($id)) {
            return DB::exQuery("SELECT $get FROM `gebruikers` WHERE user_id='$id'");
        } else {
            return DB::exQuery("SELECT $get FROM `gebruikers` WHERE username='$id'");
        }
    }

}
