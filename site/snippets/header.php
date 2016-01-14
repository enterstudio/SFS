<!doctype html>
<!--[if IE 9]> <html lang="en-GB" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en-GB" class="no-js"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
	<meta name="description" content="<?php echo $site->description()->html() ?>">
	<meta name="keywords" content="<?php echo $site->keywords()->html() ?>">
	<script src="https://use.typekit.net/wjy2nzb.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
	<?php echo css('static/assets/css/screen.min.css') ?>
	<?php echo js('static/assets/js/libs/modernizr.js') ?>
</head>
<body>
<div class="ui-canvas">
	<a href="#pagecontent" class="skiplink" data-js="skiplink">Skip to main content</a>	
	<header class="header" role="banner">
		<!--
		<a href="<?php echo url() ?>"><?php echo $site->title()->html() ?></a>
		<?php snippet('menu') ?>
		-->
	</header>
	<!-- ID and -nofocus required for proper skiplink operation -->
	<main id="pagecontent" class="pagecontent -nofocus" role="main" tabindex="-1">