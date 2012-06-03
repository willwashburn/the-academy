<?php
	/*
	 * Default Template
	 * @use the ..template...duh
	 * @oa	Will
	 *
	 * html_class
	 * controller_action
	 * page_title
	 * main_content
	 *
	 */
?>
<!doctype html>
<!--[if lt IE 7]>
<html id="public" class="no-js lt-ie9 lt-ie8 lt-ie7 <?= $html_class; ?> <?= $controller_action; ?>" lang="en"> <![endif]-->
<!--[if IE 7]>
<html id="public" class="no-js lt-ie9 lt-ie8 <?= $html_class; ?> <?= $controller_action; ?>" lang="en"> <![endif]-->
<!--[if IE 8]>
<html id="public" class="no-js lt-ie9 <?= $html_class; ?> <?= $controller_action; ?>" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html id="public" class="no-js <?= $html_class; ?> <?= $controller_action; ?>" lang="en"> <!--<![endif]-->

<head>
	<meta charset="utf-8">

	<meta name="version" content="<? echo __APPLICATION_VERSION;?>"/>

	<link rel="dns-prefetch" href="//ajax.googleapis.com">
	<link rel="dns-prefetch" href="//<? echo __STATIC_DOMAIN;?>">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><? echo $page_title; ?> :: The Academy </title>
	<meta name="description"
		  content="This is a project based on the Academy framework">

	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="//<?= __WWW_DOMAIN; ?>/<?= __DYNAMIC_EXTERNAL_URL; ?>/css">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<link rel="shortcut icon" href="favicon.ico">

</head>

<body >

	<div id="main_content">
		<?= $main_content; ?>
	</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
	<script src="//<?= __WWW_DOMAIN; ?>/<?= __DYNAMIC_EXTERNAL_URL; ?>/js"></script>

	<script>
		var _gaq = [
			['_setAccount', '<?= __GOOGLE_ANALYTICS_ID ;?>'],
			['_trackPageview']
		];
		(function (d, t) {
			var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
			g.src = ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g, s)
		}(document, 'script'));
	</script>

</body>
</html>