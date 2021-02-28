<?php

function weightless_customize_register($weightless_customize){
    
    // This is the Color Section

    $weightless_customize->add_section('color', array(
        'title'         => __('Color', 'weightless'),
        'priority'      => 20
    ));

    $weightless_customize->add_setting('content_color', array(
        'default'   => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'type'      => 'theme_mod'
    ));

    $weightless_customize->add_control(new WP_Customize_Color_Control( $weightless_customize,'content_color', array(
       'label'       => __('Content Color','weightless'),
       'section'     => 'color',
       'priority'    => 2,
    )));

    $weightless_customize->add_setting('bkg_color', array(
        'default'   => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
        'type'      => 'theme_mod'
    ));

    $weightless_customize->add_control(new WP_Customize_Color_Control( $weightless_customize,'bkg_color', array(
       'label'       => __('Background Color','weightless'),
       'section'     => 'color',
       'priority'    => 2,
    )));

    // This is the Text Options Section

    $weightless_customize->add_section('text_options', array(
        'title'         => __('Text Options', 'weightless'),
        'priority'      => 21
    ));

    $weightless_customize->add_setting('site_font', array(
        'default'   => 'arial',
        'type'      => 'theme_mod'
    ));

    $weightless_customize->add_control(new WP_Customize_Control( $weightless_customize,'site_font', array(
        'label'       => __('Site\'s Font','weightless'),
        'section'     => 'text_options',
        'priority'    => 1,
        'type'        => 'radio',
        'choices'     => array(
            'arial'    => __( 'Arial' ),
            'trebuchet'    => __( 'Trebuchet' ),
            'timesRoman'    => __( 'Times New Roman' )
        )
    )));

    $weightless_customize->add_setting('text_line_height', array(
        'default'   => 1.5,
        'type'      => 'theme_mod'
    ));

    $weightless_customize->add_control( 'text_line_height', array(
        'type'        => 'range',
        'priority'    => 2,
        'section'     => 'text_options',
        'label'       => 'Text Line Height',
        'input_attrs' => array(
            'min'   => 1,
            'max'   => 4,
            'step'  => 0.1,
            'style' => 'color: #0a0'
        )
    ));

    // This is the Footer Section

    $weightless_customize->add_section('footer', array(
        'title'         => __('Footer', 'weightless'),
        'priority'      => 22
    ));

    $weightless_customize->add_setting( 'footer_text_content', array(
        'default' => '',
        'type'      => 'theme_mod'
    ));
        
    $weightless_customize->add_control( 'footer_text_content', array(
        'type' => 'text',
        'section' => 'footer', 
        'priority'    => 1,
        'label' => __( 'Footer Text Content' )
    ));

    $weightless_customize->add_setting( 'linkedin_url', array(
        'default' => '',
        'type'      => 'theme_mod'
    ));
        
    $weightless_customize->add_control( 'linkedin_url', array(
        'type' => 'text',
        'section' => 'footer', 
        'priority'    => 2,
        'label' => __( 'LinkedIn Profile URL' )
    ));

    $weightless_customize->add_setting( 'github_url', array(
        'default' => '',
        'type'      => 'theme_mod'
    ));
        
    $weightless_customize->add_control( 'github_url', array(
        'type' => 'text',
        'section' => 'footer', 
        'priority'    => 3,
        'label' => __( 'GitHub Profile URL' )
    ));
    
    $weightless_customize->add_setting( 'instagram_url', array(
        'default' => '',
        'type'      => 'theme_mod'
    ));
        
    $weightless_customize->add_control( 'instagram_url', array(
        'type' => 'text',
        'section' => 'footer', 
        'priority'    => 4,
        'label' => __( 'Instagram Profile URL' )
    ));

    $weightless_customize->add_setting( 'facebook_url', array(
        'default' => '',
        'type'      => 'theme_mod'
    ));
        
    $weightless_customize->add_control( 'facebook_url', array(
        'type' => 'text',
        'section' => 'footer', 
        'priority'    => 5,
        'label' => __( 'Facebook Profile URL' )
    ));

    $weightless_customize->add_setting( 'twitter_url', array(
        'default' => '',
        'type'      => 'theme_mod'
    ));
        
    $weightless_customize->add_control( 'twitter_url', array(
        'type' => 'text',
        'section' => 'footer', 
        'priority'    => 5,
        'label' => __( 'Twitter Profile URL' )
    ));

    // This is the Site Identity Section Additions

    $weightless_customize->add_setting('logo_size', array(
        'default'   => 480,
        'type'      => 'theme_mod'
    ));

    $weightless_customize->add_control( 'logo_size', array(
        'type'        => 'range',
        'priority'    => 8,
        'section'     => 'title_tagline',
        'label'       => 'Logo Size',
        'input_attrs' => array(
            'min'   => 60,
            'max'   => 720,
            'step'  => 5,
            'style' => 'color: #0a0'
        )
    ));

    $weightless_customize->add_setting('icon_display', array(
        'default'   => 'display',
        'type'      => 'theme_mod'
    ));

    $weightless_customize->add_control(new WP_Customize_Control( $weightless_customize,'icon_display', array(
        'label'       => __('Site Icon Display Settings','weightless'),
        'section'     => 'title_tagline',
        'priority'    => 5000,
        'type'        => 'radio',
        'choices'     => array(
            'display'    => __( 'Display Icon' ),
            'no-display'     => __( "Don't Display Icon" )
        )
    )));

    $weightless_customize->add_setting('tagline_display', array(
        'default'   => 'display',
        'type'      => 'theme_mod'
    ));

    $weightless_customize->add_control(new WP_Customize_Control( $weightless_customize,'tagline_display', array(
        'label'       => __('Display Tagline','weightless'),
        'section'     => 'title_tagline',
        'priority'    => 50,
        'type'        => 'radio',
        'choices'     => array(
            'display'    => __( 'Display Tagline' ),
            'no-display'     => __( "Don't Display Tagline" )
        )
    )));

}



add_action('customize_register', 'weightless_customize_register');

//Custominzer function
function weightless_customize_css()
{
    ?>
         <style type="text/css">

            /* Content Coloring Section */
            body, a, #site-title h1 a, #site-title h1 a:hover, .primary-menu > li > a, .form-submit > #submit:hover, textarea, #commentform input { 
                color: <?php echo get_theme_mod('content_color', '#000000'); ?>; 
            }

            .primary-menu > li > a > .menu-item-container, .primary-menu > li > a > .menu-item-container:hover, .primary-menu > li.current-menu-item > a > .menu-item-container, #site-title h1 a:hover, .sub-menu > li, .form-submit > #submit, .form-submit > #submit:hover, textarea, #commentform input { 
                border-color: <?php echo get_theme_mod('content_color', '#000000'); ?>; 
            }

            .form-submit > #submit { 
                background: <?php echo get_theme_mod('content_color', '#000000'); ?>; 
            }

            .social-footer-icons > svg {
                fill: <?php echo get_theme_mod('content_color', '#000000'); ?>;
            }

            @media only screen and (max-width: 600px) {
                .primary-menu {
                    border-color: <?php echo get_theme_mod('content_color', '#000000'); ?>; 
                }
            }

            /* Background Coloring Section */

            body, textarea, .sub-menu > li, #mobile-menu-toggle, .form-submit > #submit:hover, #commentform input{ 
                background: <?php echo get_theme_mod('bkg_color', '#FFFFFF'); ?>; 
            }

            @media only screen and (max-width: 600px) {
                .menu-main-nav-container{
                    background: <?php echo get_theme_mod('bkg_color', '#FFFFFF'); ?>; 
                }
            }

            .form-submit > #submit {
                color: <?php echo get_theme_mod('bkg_color', '#FFFFFF'); ?>; 
            }
            
            /* Text Options Section */

            body {
                font-family: <?php 
                    if (get_theme_mod('site_font', 'arial') == 'arial') {echo 'Arial, Helvetica, sans-serif';} 
                    else if (get_theme_mod('site_font', 'arial') == 'timesRoman') {echo "'Times New Roman', Times, serif";} 
                    else if (get_theme_mod('site_font', 'arial') == 'trebuchet') {echo "'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif";}?>;
            }

            main#content {
                line-height: <?php echo get_theme_mod('text_line_height', 1.5); ?>;
            }

            /* Logo Size */
            .custom-logo {
                width: <?php echo get_theme_mod('logo_size', 520); ?>px;
            }
            
            #site-description {
                <?php if (get_theme_mod('tagline_display', 'display') == 'no-display') {echo 'display: none;';}  ?>
            }

            /* Footer Styling */
            .footer-credits-icons-container{
                <?php if ((get_theme_mod('footer_text_content', '') != '') and ((get_theme_mod('linkedin_url', '') != '') or (get_theme_mod('github_url', '') != '') or (get_theme_mod('instagram_url', '') != '') or (get_theme_mod('facebook_url', '') != ''))) { ?> grid-template-columns: 1fr 35px 1fr; <?php } ?>
            }

            @media only screen and (max-width: 600px) {
                .footer-credits-icons-container {
                    grid-template-columns: 1fr;
                }
            }

         </style>

    <?php

    // Taking away the site header if it is not wanted. Controlled by "icon_display" setting
    if (get_theme_mod('icon_display', 'display') == 'no-display') {
        ?> <link rel="shortcut icon" type="image/jpg" href="#"/><?php
    }
    
}

add_action( 'wp_head', 'weightless_customize_css');