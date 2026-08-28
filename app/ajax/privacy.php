<?php require_once('language/language-legal.php'); ?>
<!DOCTYPE html>
<html lang="<?=$txt['legal_html_lang']?>">
<head>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<title><?=$site_title;?></title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<link rel="stylesheet" type="text/css" href="<?=$static_url;?>/stylesheets/style.css" />
</head>
<body>
    <div class="box-content" style="text-align: center; padding: 10px">
<?php foreach ($txt['legal_privacy'] as $legal_section): ?>
    <h3 class="title"><b><?=$legal_section['h']?></b></h3>
<?php foreach ($legal_section['p'] as $legal_paragraph): ?>
    <p><?=$legal_paragraph?></p>
<?php endforeach; ?>
<?php endforeach; ?>
<?php if (!empty($txt['legal_note'])): ?>
    <p><i><?=$txt['legal_note']?></i></p>
<?php endif; ?>
    </div>
</body>
