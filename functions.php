<?php

add_action( 'after_setup_theme', 'weightless_setup' );

function weightless_setup() {
    
    load_theme_textdomain( 'weightless', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    
    global $content_width;
    if ( ! isset( $content_width ) ) { 
        $content_width = 1920; 
    }
    
    register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'weightless' ) ) );
    register_nav_menus( array( 'footer-menu' => esc_html__( 'Footer Menu', 'weightless' ) ) );
}

//Customizer File
require get_template_directory(). '/customizer.php';

add_action( 'wp_enqueue_scripts', 'weightless_load_scripts' );

function weightless_load_scripts() {

    wp_enqueue_style( 'weightless-style', get_stylesheet_uri() );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/fontawesome/css/all.min.css' );

}

add_action( 'wp_footer', 'weightless_footer_scripts' );

function weightless_footer_scripts() {

    ?>
    <script>

        jQuery(document).ready(function ($) {
        var deviceAgent = navigator.userAgent.toLowerCase();
            if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
                $("html").addClass("ios");
                $("html").addClass("mobile");
            }
            if (navigator.userAgent.search("MSIE") >= 0) {
                $("html").addClass("ie");
            }
            else if (navigator.userAgent.search("Chrome") >= 0) {
                $("html").addClass("chrome");
            }
            else if (navigator.userAgent.search("Firefox") >= 0) {
                $("html").addClass("firefox");
            }
            else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
                $("html").addClass("safari");
            }
            else if (navigator.userAgent.search("Opera") >= 0) {
                $("html").addClass("opera");
            }
        });

    </script>
    <?php
    wp_enqueue_script( 'mobile-menu-toggle', get_template_directory_uri() . '/mobile-menu-toggle.js');
}

add_filter( 'document_title_separator', 'weightless_document_title_separator' );

function weightless_document_title_separator( $sep ) {
    $sep = '|';
    return $sep;
}

add_filter( 'the_title', 'weightless_title' );

function weightless_title( $title ) {

    if ( $title == '' ) {
        return '...';
    } else {
        return $title;
    }
}

add_filter( 'the_content_more_link', 'weightless_read_more_link' );

function weightless_read_more_link() {
    if ( ! is_admin() ) {
    return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">...</a>';
    }
}

add_filter( 'excerpt_more', 'weightless_excerpt_read_more_link' );

function weightless_excerpt_read_more_link( $more ) {
    if ( ! is_admin() ) {
        global $post;
        return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">...</a>';
    }
}

add_filter( 'intermediate_image_sizes_advanced', 'weightless_image_insert_override' );

function weightless_image_insert_override( $sizes ) {
    unset( $sizes['medium_large'] );
    return $sizes;
}

add_action( 'widgets_init', 'weightless_widgets_init' );

function weightless_widgets_init() {

}

add_action( 'wp_head', 'weightless_pingback_header' );

function weightless_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}

add_action( 'comment_form_before', 'weightless_enqueue_comment_reply_script' );

function weightless_enqueue_comment_reply_script() {
    if ( get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function weightless_custom_pings( $comment ) {
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
    <?php
}

add_filter( 'get_comments_number', 'weightless_comment_count', 0 );

function weightless_comment_count( $count ) {
    if ( ! is_admin() ) {
        global $id;
        $get_comments = get_comments( 'status=approve&post_id=' . $id );
        $comments_by_type = separate_comments( $get_comments );
        return count( $comments_by_type['comment'] );
    } else {
        return $count;
    }
}


// Making the walker class for the Navigation Menu
// Following code from https://www.ibenic.com/how-to-create-wordpress-custom-menu-walker-nav-menu-class/
class Weightless_Walker extends Walker_Nav_Menu {
    
	// Displays start of an element. E.g '<li> Item Name'
    // @see Walker::start_el()
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
        $object = $item->object;
    	$type = $item->type;
    	$title = $item->title;
    	$description = $item->description;
        $permalink = $item->url;



        $output .= "<li class='" .  implode(" ", $item->classes) . "'>";
        
        //Add SPAN if no Permalink
        if( $permalink && $permalink != '#' ) {
            $output .= '<a href="' . $permalink . '"><div class="menu-item-container">';
        } else {
            $output .= '<span><div class="menu-item-containter">';
        }
        
        $output .= $title;

        if( $description != '' && $depth == 0 ) {
            $output .= '<small class="description">' . $description . '</small>';
        }

        if( $permalink && $permalink != '#' ) {
            $output .= '</div></a>';
        } else {
            $output .= '</div></span>';
        }
        
    }
    
}