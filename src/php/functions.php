<?php 
/**
 * Parovoz Theme functions and definitions
 *
 */
function Parovoz_theme_support()
{
    wp_enqueue_style("style.min.css", 'all');
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1200, 9999);
    add_image_size('twentytwenty-fullscreen', 1980, 9999);
    add_theme_support('title-tag');
}

add_action("after_setup_theme", "Parovoz_theme_support");

// Настройки WooCommerce

add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_single_add_to_cart_text' );  // 2.1 +
  
function woo_custom_single_add_to_cart_text() {
  
    return __( 'Забронировать', 'woocommerce' );
  
}



// Настройка для админки

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Основные настройки',
        'menu_title' => 'Настройки сайта',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false,
    ));
}

// Register Styles and Scripts

function Parovoz_register_styles()
{

    wp_enqueue_style('main-style-css', get_stylesheet_uri() . "/main.min.css");
}

add_action('wp_enqueue_scripts', 'Parovoz_register_styles');

function Parovoz_register_scripts()
{
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.min.js');
}

add_action('wp_enqueue_scripts', 'Parovoz_register_scripts');

// AJAX и отправка писем

function ajax_form_scripts()
{
    $translation_array = array(
        'ajax_url' => admin_url('admin-ajax.php'),
    );
    wp_localize_script('main', 'cpm_object', $translation_array);
}

add_action('wp_enqueue_scripts', 'ajax_form_scripts');
function ajax_form()
{
    $name = $_REQUEST['name'];
    $phone = $_REQUEST['phone'];
    $mail = $_REQUEST['mail'];
    $order = $_REQUEST['order'];
    $response = '';
    $thm = 'Бронирование с сайта';
    $thm = "=?utf-8?b?" . base64_encode($thm) . "?=";
    $msg = "Имя: " . $name . "<br />
    Телефон: " . $phone . "<br />
    Почта: " . $mail . "<br />
    Заказ: " . $order . "<br />";
    $mail_to = get_field("mail", 'option');

    $headers = "Content-Type: text/html; charset=utf-8\n";
    $headers .= 'От: Паровоз.сайт' . "\r\n";

// Отправляем почтовое сообщение

    if (mail($mail_to, $thm, $msg, $headers)) {
        $response = 'Подтвердили!';
    } else {
        $response = 'Ошибка при отправке';
    }

// Сообщение о результате отправки почты

    if (defined('DOING_AJAX') && DOING_AJAX) {
        echo $response;
        wp_die();
    }
}

add_action('wp_ajax_nopriv_ajax_form', 'ajax_form');
add_action('wp_ajax_ajax_form', 'ajax_form');