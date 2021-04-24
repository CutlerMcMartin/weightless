<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); body_class(); ?>>
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
                    <div class="toggle-container">
                        <div id="mobile-menu-toggle"><?php echo wp_kses(file_get_contents(get_template_directory_uri() . "/svgs/bars-solid.svg"), weightless_get_kses_extended_ruleset()) ?></div>
                    </div>
                    <nav id="main-menu">
                        
                        <?php wp_nav_menu( array( 
                            'theme_location'    => 'main-menu',
                            'menu_class'        => 'primary-menu',
                            'walker'            => new Weightless_Walker()
                        ) ); ?>
                    </nav>
                <?php } ?>
            </header>
            <div id="container">