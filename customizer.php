<?php

function weightless_customize_register($weightless_customize){
    
    //This is the Navigation Bar Section

    $weightless_customize->add_section('navigation', array(
        'title'         => __('Navigation Style', 'weightless'),
        'description'   => sprintf(__('All editable elements for the main navigation bar.', 'weightless')),
        'priority'      => 2
    ));

    $weightless_customize->add_setting('navigation_main_color', array(
        'default'   => '#000000',
        'type'      => 'theme_mod'
    ));

    $weightless_customize->add_control(new WP_Customize_Color_Control( $weightless_customize,'navigation_main_color', array(
       'label'       => __('Navigation Bar Color','weightless'),
       'section'     => 'navigation',
       'priority'    => 2
    )));

    $weightless_customize->add_setting('navigation_text_color', array(
      'default'   => '#ffffff',
      'type'      => 'theme_mod'
  ));

    $weightless_customize->add_control(new WP_Customize_Color_Control( $weightless_customize,'navigation_text_color', array(
        'label'       => __('Navigation Text Color','weightless'),
        'section'     => 'navigation',
        'priority'    => 3
    )));

    $weightless_customize->add_setting('nav_logo', array(
        'default'   => null,
        'type'      => 'theme_mod'
    ));

    $weightless_customize->add_control(new WP_Customize_Image_Control($weightless_customize,'nav_logo',array(
        'label'      => __( 'Upload a logo', 'weightless' ),
        'section'    => 'navigation',
        'settings'   => 'nav_logo',
        'priority'    => 1 
    )));

    //This is the Footer Section

    $weightless_customize->add_section('footer', array(
        'title'         => __('Footer Style', 'weightless'),
        'description'   => sprintf(__('Where to edit the colors on the footer.', 'weightless')),
        'priority'      => 5
    ));

    $weightless_customize->add_setting('footer_main_color', array(
        'default'   => '#000000',
        'type'      => 'theme_mod'
    ));

    $weightless_customize->add_control(new WP_Customize_Color_Control( $weightless_customize,'footer_main_color', array(
    'label'       => __('Footer Bar Color','weightless'),
    'section'     => 'footer',
    'priority'    => 2
    )));

    $weightless_customize->add_setting('footer_text_color', array(
    'default'   => '#ffffff',
    'type'      => 'theme_mod'
    ));

    $weightless_customize->add_control(new WP_Customize_Color_Control( $weightless_customize,'footer_text_color', array(
        'label'       => __('Footer Text Color','weightless'),
        'section'     => 'footer',
        'priority'    => 3
    )));

    //This is the Body Section

    $weightless_customize->add_section('body', array(
        'title'         => __('Body Style', 'weightless'),
        'description'   => sprintf(__('Where to edit the colors in the body.', 'weightless')),
        'priority'      => 6
    ));

    $weightless_customize->add_setting('body_background_color', array(
        'default'   => '#ffffff',
        'type'      => 'theme_mod'
    ));

    $weightless_customize->add_control(new WP_Customize_Color_Control( $weightless_customize,'body_background_color', array(
        'label'       => __('Body Background Color','weightless'),
        'section'     => 'body',
        'priority'    => 2
    )));

    $weightless_customize->add_setting('body_text_scheme', array(
        'default'   => 'light',
        'type'      => 'theme_mod'
    ));

    $weightless_customize->add_control(new WP_Customize_Control( $weightless_customize,'body_text_scheme', array(
        'label'       => __('Body Text Scheme','weightless'),
        'section'     => 'body',
        'priority'    => 3,
        'type'        => 'radio',
        'choices'     => array(
            'light'    => __( 'Light' ),
            'dark'     => __( 'Dark' )
        )
    )));

    //This is the Font Section

    $weightless_customize->add_section('font', array(
        'title'         => __('Fonts', 'weightless'),
        'description'   => sprintf(__('Pick your font.', 'weightless')),
        'priority'      => 7
    ));

    $weightless_customize->add_setting('site_font', array(
        'default'   => 'arial',
        'type'      => 'theme_mod'
    ));

    $weightless_customize->add_control(new WP_Customize_Control( $weightless_customize,'site_font', array(
        'label'       => __('Site\'s','weightless'),
        'section'     => 'font',
        'priority'    => 1,
        'type'        => 'radio',
        'choices'     => array(
            'arial'    => __( 'Arial' ),
            'trebuchet'    => __( 'Trebuchet' ),
            'timesRoman'    => __( 'Times New Roman' )
        )
    )));

}



add_action('customize_register', 'weightless_customize_register');

//Custominzer function
function weightless_customize_css()
{
    ?>
         <style type="text/css">

            #menu { background-color: <?php echo get_theme_mod('navigation_main_color', '#000000'); ?>; }
            .dropdown-item:hover{background-color:<?php echo get_theme_mod('navigation_main_color', '#000000'); ?> !important;}
            .dropdown-menu{background-color:<?php echo get_theme_mod('navigation_main_color', '#000000'); ?> !important;}

            .entry-content-title{ 
                color: <?php if (get_theme_mod('body_text_scheme', 'light') == 'dark') {echo '#ffffff';} else {echo '#000000';}?>;
            }
            .entry-content-title:hover{ 
                color: <?php if (get_theme_mod('body_text_scheme', 'light') == 'dark') {echo '#e6e6e6';} else {echo '#262626';}?>;
            }

            body{
                font-family: <?php 
                    if (get_theme_mod('site_font', 'arial') == 'arial') {echo 'Arial, Helvetica, sans-serif !important';} 
                    else if (get_theme_mod('site_font', 'arial') == 'timesRoman') {echo "'Times New Roman', Times, serif !important";} 
                    else if (get_theme_mod('site_font', 'arial') == 'trebuchet') {echo "'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif !important";}?>;
            }

         </style>
    <?php
}
add_action( 'wp_head', 'weightless_customize_css');