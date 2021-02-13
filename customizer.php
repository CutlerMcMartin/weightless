<?php

function weightless_customize_register($weightless_customize){
    
    // This is the Color Section

    $weightless_customize->add_section('color', array(
        'title'         => __('Color', 'weightless'),
        'priority'      => 2
    ));

    $weightless_customize->add_setting('navigation_main_color', array(
        'default'   => '#000000',
        'type'      => 'theme_mod'
    ));

    $weightless_customize->add_control(new WP_Customize_Color_Control( $weightless_customize,'navigation_main_color', array(
       'label'       => __('Navigation Bar Color','weightless'),
       'section'     => 'color',
       'priority'    => 2
    )));

    // This is the Font Section

    $weightless_customize->add_section('font', array(
        'title'         => __('Font', 'weightless'),
        'priority'      => 3
    ));

    $weightless_customize->add_setting('font', array(
        'default'   => 'light',
        'type'      => 'theme_mod'
    ));

    $weightless_customize->add_control(new WP_Customize_Control( $weightless_customize,'font', array(
        'label'       => __('Font','weightless'),
        'section'     => 'font',
        'priority'    => 3,
        'type'        => 'radio',
        'choices'     => array(
            'light'    => __( 'Light' ),
            'dark'     => __( 'Dark' )
        )
    )));    

    // This is the Footer Section

    $weightless_customize->add_section('footer', array(
        'title'         => __('Footer', 'weightless'),
        'description'   => sprintf(__('Where to edit the colors on the footer.', 'weightless')),
        'priority'      => 5
    ));

    $weightless_customize->add_setting('footer', array(
        'default'   => 'light',
        'type'      => 'theme_mod'
    ));

    $weightless_customize->add_control(new WP_Customize_Control( $weightless_customize,'footer', array(
        'label'       => __('Body Text Scheme','weightless'),
        'section'     => 'footer',
        'priority'    => 3,
        'type'        => 'radio',
        'choices'     => array(
            'light'    => __( 'Light' ),
            'dark'     => __( 'Dark' )
        )
    )));

    // This is the Site Identity Section Additions

    $weightless_customize->add_setting('icon-display', array(
        'default'   => 'display',
        'type'      => 'theme_mod'
    ));

    $weightless_customize->add_control(new WP_Customize_Control( $weightless_customize,'icon-display', array(
        'label'       => __('Site Icon Display Settings','weightless'),
        'section'     => 'title_tagline',
        'priority'    => 50,
        'type'        => 'radio',
        'choices'     => array(
            'display'    => __( 'Display Icon' ),
            'no-display'     => __( "Don't Display Icon" )
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