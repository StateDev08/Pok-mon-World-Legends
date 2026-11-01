<?php
require_once __DIR__ . '/../app/includes/Security.php';
require_once __DIR__ . '/../app/includes/PaymentSecurity.php';

final class FakeResult {
    public $num_rows;
    private $row;
    public function __construct($row, $count = null) { $this->row = $row; $this->num_rows = $count ?? ($row ? 1 : 0); }
    public function fetch_assoc() { return $this->row; }
}
final class FakeStatement {
    private $slot; private $pokemon; private $user;
    public function bind_param($types, &$slot, &$pokemon, &$user) { $this->slot = &$slot; $this->pokemon = &$pokemon; $this->user = &$user; }
    public function execute() { DB::$updates[] = [$this->slot, $this->pokemon, $this->user]; return true; }
    public function close() {}
}
final class DB {
    public static $invoice; public static $pack; public static $owner; public static $locked;
    public static $releases; public static $updates = []; public static $account; public static $trainer;
    public static function reset() {
        self::$invoice = ['id'=>'7','id_user'=>'2','user_id'=>'5','valor'=>'32,00','status'=>'1','pack_id'=>'3'];
        self::$pack = ['id'=>'3']; self::$owner = ['user_id'=>'5']; self::$locked = false; self::$releases = 0;
        self::$account = ['acc_id'=>'2','account_code'=>'1','keylog'=>'secret','bloqueado'=>''];
        self::$trainer = ['user_id'=>'5','acc_id'=>'2','session'=>'session-1','banned'=>'N'];
    }
    public static function exQuery($sql) {
        if (str_contains($sql, 'GET_LOCK')) { if (self::$locked) return new FakeResult(['acquired'=>'0']); self::$locked = true; return new FakeResult(['acquired'=>'1']); }
        if (str_contains($sql, 'RELEASE_LOCK')) { self::$locked = false; self::$releases++; return new FakeResult(['released'=>'1']); }
        if (str_starts_with($sql, 'SELECT * FROM fatura')) return new FakeResult(self::$invoice);
        if (str_starts_with($sql, 'SELECT * FROM donate_packs')) return new FakeResult(self::$pack);
        if (str_starts_with($sql, 'SELECT g.user_id')) return new FakeResult(self::$owner);
        if (preg_match("/UPDATE fatura SET status='([^']+)'/", $sql, $m)) { self::$invoice['status']=$m[1]; return true; }
        if (str_starts_with($sql, 'SELECT * FROM `rekeningen`')) return new FakeResult(self::$account);
        if (str_starts_with($sql, 'SELECT * FROM `gebruikers`')) return new FakeResult(self::$trainer);
        if (str_starts_with($sql, 'SELECT id FROM pokemon_speler')) return new FakeResult(['id'=>1], 6);
        throw new RuntimeException('Unexpected test query: '.$sql);
    }
    public static function real_escape_string($value) { return str_replace("'", "\\'", $value); }
    public static function getInstance() { return new self; }
    public function prepare($sql) {
        if (!str_contains($sql, 'id=? AND user_id=?')) throw new RuntimeException('Unparameterized team update');
        return new FakeStatement;
    }
}
$count = 0;
function check($condition, $label) { global $count; if (!$condition) throw new RuntimeException('FAILED: '.$label); $count++; }
function transaction($status='3') { return (object)['reference'=>'7','currency'=>'BRL','grossAmount'=>'32.00','status'=>$status]; }
DB::reset();
foreach (["Leftovers", "King's Rock"] as $item) check(Security::safeItemIdentifier($item), 'valid item identifier accepted');
foreach (["x\x60 = 0 --", "x\n", [], "x\x00"] as $item) check(!Security::safeItemIdentifier($item), 'unsafe SQL identifier rejected');
foreach (Security::AJAX_ACTIONS as $action) check(is_file(Security::ajaxFile($action)), 'allowed route exists: '.$action);
foreach (['../../_sess_build','../cron/cron_day','%2e%2e/x','box/../box','box.php','BOX','',[],null,"box\0"] as $action) check(Security::ajaxFile($action) === null, 'reject malformed route');
check(Security::teamIds(['1','2','3','4','5','6']) === [1,2,3,4,5,6], 'six-member team accepted');
foreach ([[],['1','1'],['0'],['-1'],['1e2'],["1' OR 1=1 --"],[['1']],['999999999999999999999'],range(1,7), '1'] as $ids) check(Security::teamIds($ids) === null, 'reject malformed team');
check(Security::escapeInput(['pkm'=>["1' OR 1=1"]])['pkm'][0] === "1\\' OR 1=1", 'array SQL values escaped');
$session=['acc_id'=>'2','id'=>'5','keylog'=>'secret'];
check(Security::ajaxIdentity($session,'session-1') !== null, 'valid session accepted');
check(Security::ajaxIdentity([],'session-1') === null, 'guest denied');
check(Security::ajaxIdentity($session,'wrong-session') === null, 'stale trainer session denied');
check(Security::ajaxIdentity(array_replace($session,['keylog'=>'old']),'session-1') === null, 'stale account key denied');
DB::$trainer['banned']='Y'; check(Security::ajaxIdentity($session,'session-1') === null, 'banned trainer denied');
DB::reset(); DB::$account['account_code']='0'; check(Security::ajaxIdentity($session,'session-1') === null, 'disabled account denied');

foreach (['32,00','32.00'] as $value) check(PaymentSecurity::cents($value) === 3200, 'exact currency parsing');
foreach (['-1','1e2','NaN','32.001','', '1,000.00'] as $value) check(PaymentSecurity::cents($value) === null, 'invalid money rejected');
DB::reset(); $credits=0;
$credit=function() use (&$credits) { check(DB::$invoice['status'] === PaymentSecurity::PROCESSING, 'claim persisted before rewards'); $credits++; };
check(PaymentSecurity::processInvoice(7,transaction(),$credit) === 200, 'first paid invoice accepted');
check($credits === 1 && DB::$invoice['status'] === '3' && DB::$releases === 1, 'credit completed and lock released');
check(PaymentSecurity::processInvoice(7,transaction(),$credit) === 200 && $credits === 1, 'duplicate payment does not credit again');
check(PaymentSecurity::processInvoice(7,transaction('1'),$credit) === 200 && DB::$invoice['status'] === '3', 'late pending status cannot regress paid invoice');
DB::reset(); check(PaymentSecurity::processInvoice(7,transaction('4'),$credit) === 200 && DB::$invoice['status'] === '3', 'first available notification also credits');
DB::reset(); DB::$invoice['status']='4'; $before=$credits; check(PaymentSecurity::processInvoice(7,transaction(),$credit)===200 && $credits===$before, 'legacy paid invoice protected');
DB::reset(); $xml=transaction(); $xml->grossAmount='0.01'; $before=$credits;
check(PaymentSecurity::processInvoice(7,$xml,$credit) === 400 && $credits === $before && DB::$invoice['status']==='1', 'wrong amount rejected before claim');
$xml=transaction(); $xml->currency='EUR'; check(PaymentSecurity::processInvoice(7,$xml,$credit)===400, 'wrong currency rejected');
$xml=transaction(); $xml->reference='8'; check(PaymentSecurity::processInvoice(7,$xml,$credit)===400, 'wrong reference rejected');
DB::reset(); DB::$locked=true; check(PaymentSecurity::processInvoice(7,transaction(),$credit) === 503 && DB::$invoice['status']==='1', 'competing worker cannot claim');
DB::reset();
try { PaymentSecurity::processInvoice(7,transaction(),function(){ throw new RuntimeException('simulated interrupted reward'); }); check(false,'crash must propagate'); } catch (RuntimeException $e) { check($e->getMessage()==='simulated interrupted reward','crash propagated'); }
check(DB::$invoice['status']===PaymentSecurity::PROCESSING && !DB::$locked, 'interrupted credit keeps claim and releases lock');
$before=$credits; check(PaymentSecurity::processInvoice(7,transaction(),$credit)===503 && $credits===$before, 'crashed payment never credits automatically again');
DB::reset(); DB::$owner=null;
try { PaymentSecurity::processInvoice(7,transaction(),$credit); check(false,'missing recipient must fail'); } catch (RuntimeException $e) { check(DB::$invoice['status']==='1' && !DB::$locked, 'invalid recipient rejected before claim'); }
DB::reset(); check(PaymentSecurity::processInvoice(7,transaction('1'),$credit)===200 && DB::$invoice['status']==='1', 'pending payment grants nothing');

// Execute the actual team endpoint against a recording database double.
DB::reset(); $_GET=['option'=>'order']; $_POST=['pkm'=>['1','2','3','4','5','6']]; $_SERVER['REQUEST_METHOD']='POST'; $_SESSION=['id'=>'5'];
ob_start(); require __DIR__.'/../app/ajax/box.php'; $output=ob_get_clean();
check(trim($output)==='1' && count(DB::$updates)===6, 'actual endpoint accepts complete team');
check(DB::$updates[5]===[6,6,5], 'prepared team update retains slot and ownership');
echo "PASS: {$count} security regression checks\n";
