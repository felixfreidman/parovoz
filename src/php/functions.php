<?php
/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$storefront = (object) array(
	'version'    => $storefront_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';
require 'inc/wordpress-shims.php';

if ( class_exists( 'Jetpack' ) ) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if ( storefront_is_woocommerce_activated() ) {
	$storefront->woocommerce            = require 'inc/woocommerce/class-storefront-woocommerce.php';
	$storefront->woocommerce_customizer = require 'inc/woocommerce/class-storefront-woocommerce-customizer.php';

	require 'inc/woocommerce/class-storefront-woocommerce-adjacent-products.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
	require 'inc/woocommerce/storefront-woocommerce-functions.php';
}

if ( is_admin() ) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';

	require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-storefront-nux-admin.php';
	require 'inc/nux/class-storefront-nux-guided-tour.php';
	require 'inc/nux/class-storefront-nux-starter-content.php';
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Основные настройки',
        'menu_title' => 'Настройки сайта',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false,
    ));
}

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
    $thm = 'Бронирование бани и услуг';
    $thm = "=?utf-8?b?" . base64_encode($thm) . "?=";
    $msg = "Имя: " . $name . "<br />
    Телефон: " . $phone . "<br />
    Почта: " . $mail . "<br />
    Заказ: " . $order . "<br />";
    $mail_to = get_field("mail", 'option');

    $headers = "Content-Type: text/html; charset=utf-8\n";
    $headers .= 'От: Parovoz.Сайт' . "\r\n";

// Отправляем почтовое сообщение

    if (mail($mail_to, $thm, $msg, $headers)) {
        $response = 'Отправили!';
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


function review_form()
{
    $name = $_REQUEST['name'];
    $description = $_REQUEST['description'];
    $rating = $_REQUEST['rating'];
    $bathType = $_REQUEST['bathType'];
    $content = $description . $rating . 'star' . $bathType . 'bath';

    
        // Add the content of the form to $post as an array
        $new_post = array(
            'post_title'    => $name,
            'post_content'  => $content,
            'post_status'   => 'publish', 
            'post_type' => 'reviews' 
        );
        //save the new post
        $pid = wp_insert_post($new_post); 
        //insert taxonomies

        if ($pid) {
            $response = '<div class="applied-screen" id="appliedForm">
    <div class="form-close" id="closeAppliedForm"><span class="cross-one"> </span><span class="cross-two"></span>
    </div><img class="applied-icon"
        src="https://tadam.yurin.biz/wp-content/themes/tadam/assets/images/content/main__applied.svg"
    alt="Form Applied">
    <div class="applied-header">Отзыв отправлен!</div>
    <div class="applied-subheader">Спасибо за оценку!</div>
    </div>';
        } else {
            $response = 'Ошибка при отправке';
        }
        
        if (defined('DOING_AJAX') && DOING_AJAX) {
            echo $response;
            wp_die();
        }
    
}

add_action('wp_ajax_nopriv_review_form', 'review_form');
add_action('wp_ajax_review_form', 'review_form');
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

add_filter( 'woocommerce_get_item_data', 'wc_checkout_description_so_15127954', 10, 2 );
function wc_checkout_description_so_15127954( $other_data, $cart_item )
{
    $post_data  = get_post( $cart_item['product_id'] );
    $other_data[] = array( 'name' =>  $post_data->post_excerpt );
    return $other_data;
}

add_action( 'woocommerce_after_shop_loop_item', 'woo_show_excerpt_shop_page', 5 );
function woo_show_excerpt_shop_page() {
	global $product;

	echo $product->post->post_excerpt;
}

wp_link_pages( array(
	'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
	'after'       => '</div>',
	'link_before' => '<span>',
	'link_after'  => '</span>',
	'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
	'separator'   => '<span class="screen-reader-text">, </span>',
) );