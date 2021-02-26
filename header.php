<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width" />
        <?php wp_head(); ?>
         <?php 
    
    ?>
    </head>
    <body <?php body_class(); ?>>
    <div id="wrapper" class="hfeed"> 
        <div id="anti-footer">
            <header id="header">
                <div id="branding">
                    <div id="site-title">
                        <?php if( function_exists( 'the_custom_logo' ) ) {
                            if(has_custom_logo()) {
                                the_custom_logo();
                            } else {
                                ?><h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h1><?php
                            }
                        }?>
                    </div>
                    <div id="site-description"><h2><?php bloginfo( 'description' ); ?></h2></div>
                </div>
                <?php if (has_nav_menu('main-menu')) { ?>
                    <nav id="main-menu">
                        <div class="mobile-menu-toggle"><?php echo file_get_contents(get_template_directory_uri() . "/svgs/bars-solid.svg") ?></div>
                        <?php wp_nav_menu( array( 
                            'theme_location'    => 'main-menu',
                            'menu_class'        => 'primary-menu',
                            'walker'            => new Weightless_Walker()
                        ) ); ?>
                    </nav>
                <?php } ?>
            </header>
            <div id="container">