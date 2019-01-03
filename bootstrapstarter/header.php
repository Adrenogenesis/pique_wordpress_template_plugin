<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="NewThème">
<meta name="author" content="Fred">

<title>Nouveau template</title>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
       <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item active" href="#">Acceuil</a>
            <a class="blog-nav-item" href="#">Articles</a>
            <a class="blog-nav-item" href="#">Liens</a>
            <a class="blog-nav-item" href="#">Portfolio</a>
            <a class="blog-nav-item" href="#">Contact</a>
        </nav>
    </div>
</div>

<div class="container">

    <div class="blog-header">
        <h1 class="blog-title">NewsTech template</h1>
        <p class="lead blog-description">Un thème crée avec Bootstrap.</p>
    </div>

    <div class="row">