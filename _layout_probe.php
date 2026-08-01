<?php
$target = isset($_GET['page']) ? 'index.php?page=' . $_GET['page'] : 'index.php';
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>layout probe</title></head>
<body>
<iframe id="f" src="<?php echo htmlspecialchars($target); ?>" style="width:1280px;height:900px;border:0;"></iframe>
<pre id="result">waiting</pre>
<script>
window.addEventListener('load', function () {
    setTimeout(function () {
        try {
            var d = document.getElementById('f').contentDocument;
            var out = {};
            out.viewport = { w: d.documentElement.clientWidth, h: d.documentElement.clientHeight };
            var logo = d.getElementById('logo');
            if (logo) {
                var r = logo.getBoundingClientRect();
                out.logo = { left: r.left, top: r.top, right: r.right, bottom: r.bottom, w: r.width, h: r.height };
            } else { out.logo = null; }
            var hd = d.getElementById('header');
            if (hd) { var hr = hd.getBoundingClientRect(); out.header = { left: hr.left, top: hr.top, right: hr.right, bottom: hr.bottom, w: hr.width, h: hr.height }; }
            out.charBars = [];
            var bars = d.querySelectorAll('[style*="player.png"]');
            for (var i = 0; i < bars.length; i++) {
                var r2 = bars[i].getBoundingClientRect();
                out.charBars.push({ left: r2.left, top: r2.top, right: r2.right, bottom: r2.bottom, w: r2.width, h: r2.height });
            }
            out.barWrappers = [];
            var b2 = d.querySelectorAll('[style*="bar.png"]');
            for (var i = 0; i < b2.length; i++) {
                var r3 = b2[i].getBoundingClientRect();
                out.barWrappers.push({ left: r3.left, top: r3.top, right: r3.right, bottom: r3.bottom, w: r3.width, h: r3.height });
            }
            out.flags = null;
            var fl = d.querySelector('.hub [href*="language"]');
            if (fl) { var r5 = fl.getBoundingClientRect(); out.flags = { left: r5.left, top: r5.top, right: r5.right, bottom: r5.bottom }; }
            out.hubs = [];
            var hubs = d.querySelectorAll('.hub');
            for (var i = 0; i < hubs.length; i++) {
                var r4 = hubs[i].getBoundingClientRect();
                out.hubs.push({ left: r4.left, top: r4.top, right: r4.right, bottom: r4.bottom, w: r4.width, h: r4.height });
            }
            out.silvers = null;
            var sv = d.getElementById('silvers');
            if (sv) { var r6 = sv.getBoundingClientRect(); out.silvers = { left: r6.left, top: r6.top, right: r6.right, bottom: r6.bottom }; }
            document.getElementById('result').textContent = JSON.stringify(out, null, 1);
        } catch (e) {
            document.getElementById('result').textContent = 'ERROR: ' + e.message;
        }
    }, 4000);
});
</script>
</body>
</html>
