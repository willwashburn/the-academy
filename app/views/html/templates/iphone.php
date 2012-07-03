<?php

    /*
     * iPhone generic template
     * @author Will
     *
     * icon_url - needs to be 57px x 57px
     * bar_style
     * startup_image 640*920
     *
     *
     */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <meta name="version" content="<? echo __APPLICATION_VERSION;?>"/>

    <link rel="dns-prefetch" href="//ajax.googleapis.com">
    <link rel="dns-prefetch" href="//<? echo __STATIC_DOMAIN;?>">

    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>

    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <link rel="apple-touch-icon" href="<?= __STATIC_DOMAIN;?>/images/"/>

    <link rel="apple-touch-startup-image" href="<?= __STATIC_DOMAIN;?>/images/"/>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <? //WBN move this to local ?>
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico">

    <title><? echo $page_title; ?> :: The Academy </title>
    <meta name="description"
          content="This is a project based on the Academy framework">

    <link rel="stylesheet" href="//<?= __MOBILE_DOMAIN; ?>/<?= __DYNAMIC_EXTERNAL_URL; ?>/css"
          type="text/css" media="screen, mobile" title="main" charset="utf-8">

</head>
<body>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">Project name</a>

            <div class="nav-collapse">
                <ul class="nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>


<div class="container-fluid">

    <h1>Bootstrap starter template</h1>

    <p>Use this document as a way to quick start any new project.<br> All you get is this message and a barebones HTML
        document.</p>
    <div style="font-size: 24px;">
        <i class="icon-camera-retro"></i> icon-camera-retro
    </div>
</div>
<!-- /container -->

<div class="navbar navbar-fixed-bottom">
    <div class="navbar-inner">

    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script src="//<?= __MOBILE_DOMAIN; ?>/<?= __DYNAMIC_EXTERNAL_URL; ?>/js"></script>

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