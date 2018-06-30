<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="UTF-8">

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
        <link href="https://fonts.googleapis.com/css?family=Dosis:300,700" rel="stylesheet">
        <?php wp_head(); ?>


    </head>
    <body <?php body_class(); ?>>

      <?php $logo = get_field('logo', 'option'); ?>

        <div class="container" >
            <header id="page_header"  accesskey="n">
                <a href="#" id="menu_button" >Menu</a>
                <a  accesskey="1" class=" branding" href="<?php echo home_url(); ?>" style="background-image:url('<?php echo $logo; ?>')" ><?php echo $blog_name; ?></a>
                <nav>
                    <ul>
                        <?php chilly_nav('header_nav'); ?>
                        <li style="position:initial"><a id="ticketing_link" href="http://forumsirius.fr/orion/divonne.phtml?kld=1" target="_blank">Billetterie En Ligne</a></li>
                    </ul>
                </nav>

            </header>
        </div>
        <main id="main" >
