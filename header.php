<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<!-- TEST -->

<head>
    <meta charset="UTF-8">

    <title><?php wp_title(''); ?><?php if (wp_title('', false)) {
                                        echo ' :';
                                    } ?> <?php bloginfo('name'); ?></title>
    <?php $tdu =  get_template_directory_uri(); ?>
    <?php $blog_name =  get_bloginfo('name'); ?>
    <!-- <link href="//www.google-analytics.com" rel="dns-prefetch"> -->
    <meta name="apple-mobile-web-app-title" content="<?php echo $blog_name; ?>">
    <meta name="application-name" content="<?php echo $blog_name; ?>">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link href="https://fonts.googleapis.com/css?family=Dosis:300,700" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $tdu; ?>/img/favicon/apple-touch-icon.png?v=ngkn6OpdjR">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $tdu; ?>/img/favicon/favicon-32x32.png?v=ngkn6OpdjR">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $tdu; ?>/img/favicon/favicon-16x16.png?v=ngkn6OpdjR">
    <link rel="manifest" href="<?php echo $tdu; ?>/img/favicon/site.webmanifest?v=ngkn6OpdjR">
    <link rel="mask-icon" href="<?php echo $tdu; ?>/img/favicon/safari-pinned-tab.svg?v=ngkn6OpdjR" color="#5bbad5">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon.ico?v=ngkn6OpdjR">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">
    <?php $feature_color = get_field('feature_colour', 'option'); ?>
    <?php if ($feature_color) :
        generate_color_stylesheet($feature_color);
    endif; ?>
    <?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>

    <?php $logo = get_field('logo', 'option'); ?>

    <div class="container">
        <header id="page_header" accesskey="n">
            <a href="#" id="menu_button">Menu</a>
            <a accesskey="1" class=" branding" href="<?php echo home_url(); ?>" style="background-image:url('<?php echo $logo; ?>')"><?php echo $blog_name; ?></a>
            <nav>
                <ul>
                    <?php chilly_nav('header_nav'); ?>
                    <?php $billeterie_link = get_field('lien_billetterie_en_ligne', 'option'); ?>

                    <?php if ($billeterie_link) : ?>
                        <li style="position:initial">
                            <a id="ticketing_link" href="<?php echo $billeterie_link; ?>" target="_blank">Billetterie En Ligne</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>

        </header>
    </div>
    <main id="main">