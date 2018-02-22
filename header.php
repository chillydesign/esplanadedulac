<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
        <?php $tdu =  get_template_directory_uri(); ?>
        <?php $blog_name =  get_bloginfo('name'); ?>
        <!-- <link href="//www.google-analytics.com" rel="dns-prefetch"> -->
        <meta name="apple-mobile-web-app-title" content="<?php echo $blog_name; ?>">
        <meta name="application-name" content="<?php echo $blog_name; ?>">
        <meta name="theme-color" content="#ffffff">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <!-- <link href="https://fonts.googleapis.com/css?family=Cormorant:700i|Montserrat:300,300i,800,800i" rel="stylesheet"> -->
        <?php wp_head(); ?>


    </head>
    <body <?php body_class(); ?>>

        <?php if (have_posts()): while (have_posts()) : the_post(); ?>
            <?php $header_image = get_field('image'); ?>
            <?php $header_colour = get_field('colour'); ?>
            <?php $welcome_paragraph = get_field('welcome_paragraph'); ?>
        <?php endwhile; endif; ?>

        <header id="page_header"  >
            <a href="#" id="menu_button" >Menu</a>
            <div id="mobile_branding" class=" branding"><a href="#" ><?php echo $blog_name; ?></a></div>
            <nav class="">
                <div class="container">
                <ul>
                    <?php chilly_nav('header_nav'); ?>
                </ul>
                </div>
            </nav>
            <div class="container">
            <div class="header_text">
                <?php if (is_front_page()) : ?>
                <h5>bienvenue au</h5>
                <h1>Chalet Agate</h1>
                <p><?php echo $welcome_paragraph; ?></p>
                <p><a href="#" class="button button_white">Réserver</a></p>
                <?php else: ?>
                    <h1><?php the_title(); ?></h1>
                <?php endif; ?>
            </div>
            </div>

            <div id="header_image" style="background-image:url(<?php echo $header_image['sizes']['large']; ?>)"></div>
            <div id="header_colour" class="header_colour_<?php echo $header_colour; ?>"></div>
            <div id="header_mask"></div>

        </header>

        <main id="main" >
