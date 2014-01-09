<!DOCTYPE html>
<html>
<head>
	<base href="<?php echo $SCHEME . "://" . $HOST . $BASE . "/"; ?>" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="keywords" content="<?php echo $this->app->get('meta.keywords'); ?>" />
	<meta name="description" content="<?php echo $this->app->get('meta.description'); ?>" />
	<meta name="generator" content="<?php echo $this->app->get('meta.generator'); ?>" />
	<meta name="author" content="">


    <link href="/site/css/metro-bootstrap.css" rel="stylesheet">
    <link href="/site/css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="/site/css/docs.css" rel="stylesheet">
    <link href="/site/js/prettify/prettify.css" rel="stylesheet">
    <link href="/site/css/style.css" rel="stylesheet">

    <!-- Load JavaScript Libraries -->
    <script src="/site/js/jquery/jquery.min.js"></script>
    <script src="/site/js/jquery/jquery.widget.min.js"></script>
    <script src="/site/js/jquery/jquery.mousewheel.js"></script>
    <script src="/site/js/prettify/prettify.js"></script>

    <!-- Metro UI CSS JavaScript plugins -->
    <script src="/site/js/load-metro.js"></script>

    <!-- Local JavaScript -->
    <script src="/site/js/docs.js"></script>

    <title><?php echo $this->app->get('meta.title'); ?></title>

</head>