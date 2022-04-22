<?php
/**
 * Richbee functions and definitions
 *
 * Storefront automatically loads the core CSS even if using a child theme as it is more efficient
 * than @importing it in the child theme style.css file.
 *
 * Uncomment the line below if you'd like to disable the Storefront Core CSS.
 *
 * If you don't plan to dequeue the Storefront Core CSS you can remove the subsequent line and as well
 * as the sf_child_theme_dequeue_style() function declaration.
 */
//add_action( 'wp_enqueue_scripts', 'sf_child_theme_dequeue_style', 999 );
/**
 * Dequeue the Storefront Parent theme core CSS
 */
function sf_child_theme_dequeue_style()
{
    wp_dequeue_style('storefront-style');
    wp_dequeue_style('storefront-woocommerce-style');
} 

/**
 * Note: DO NOT! alter or remove the code above this text and only add your custom PHP functions below this text.
 */
function enqueue_child_theme_styles()
{
// load bootstrap css
    wp_enqueue_style('bootstrap-css', get_stylesheet_directory_uri() . '/inc/assets/css/bootstrap.min.css', false, NULL, 'all');
// fontawesome cdn
    wp_enqueue_style('wp-bootstrap-pro-fontawesome-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css');
     wp_enqueue_style('wp-animate-css-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');
// load bootstrap css
// load AItheme styles
// load WP Bootstrap Starter styles
    wp_enqueue_style('wp-bootstrap-starter-style', get_stylesheet_uri(), array('theme'));
    if (get_theme_mod('theme_option_setting') && get_theme_mod('theme_option_setting') !== 'default') {
        wp_enqueue_style('wp-bootstrap-starter-' . get_theme_mod('theme_option_setting'), get_template_directory_uri() . '/inc/assets/css/presets/theme-option/' . get_theme_mod('theme_option_setting') . '.css', false, '');
    }
    wp_enqueue_style('wp-bootstrap-starter-robotoslab-roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap');

    wp_enqueue_script('jquery');
    // Internet Explorer HTML5 support
    wp_enqueue_script('html5hiv', get_template_directory_uri() . '/inc/assets/js/html5.js', array(), '3.7.0', false);
    wp_script_add_data('html5hiv', 'conditional', 'lt IE 9');

    // wp_enqueue_script('yurinChat-js', get_template_directory_uri() . '/assets/js/yurinChat2.js', false, false );
    wp_enqueue_style('yurinChat-css', get_stylesheet_directory_uri() . '/inc/assets/css/yurinChat.css');

// load swiper js and css
    wp_enqueue_script('wp-swiper-js', get_stylesheet_directory_uri() . '/inc/assets/js/swiper.min.js', array(), '');
    wp_enqueue_style('wp-swiper-css', get_stylesheet_directory_uri() . '/inc/assets/css/swiper.min.css', array(), '');
    // load lightbox js and css
    wp_enqueue_script('wp-lightbox-js', get_stylesheet_directory_uri() . '/inc/assets/js/lightbox.min.js', array(), '');
    wp_enqueue_style('wp-lightbox-css', get_stylesheet_directory_uri() . '/inc/assets/css/lightbox.min.css', array(), '');

// load bootstrap js
    wp_enqueue_script('wp-bootstrap-starter-popper', get_stylesheet_directory_uri() . '/inc/assets/js/popper.min.js', array(), '', true);
    wp_enqueue_script('wp-bootstrap-starter-bootstrapjs', get_stylesheet_directory_uri() . '/inc/assets/js/bootstrap.min.js', array(), '', true);
    wp_enqueue_script('wp-bootstrap-starter-themejs', get_stylesheet_directory_uri() . '/inc/assets/js/theme-script.min.js', array(), '', true);
    wp_enqueue_script('wp-bootstrap-starter-skip-link-focus-fix', get_stylesheet_directory_uri() . '/inc/assets/js/skip-link-focus-fix.min.js', array(), '', true);

    wp_enqueue_script('quiz-js', get_stylesheet_directory_uri() . '/inc/assets/js/quiz.js');

    wp_enqueue_style( 'quiz-css', get_stylesheet_directory_uri() . '/inc/assets/css/quiz.css'  );

    wp_enqueue_style('ion-rangeslider-css', 'https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css');

    wp_enqueue_script('ion-rangeslider-js', 'https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js');

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
//enqueue my child theme stylesheet
    wp_enqueue_style('child-style', get_stylesheet_uri(), array('theme'));
}

add_action('wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);

remove_action('wp_head', 'feed_links_extra', 3); // убирает ссылки на rss категорий
remove_action('wp_head', 'feed_links', 2); // минус ссылки на основной rss и комментарии
remove_action('wp_head', 'rsd_link');  // сервис Really Simple Discovery
remove_action('wp_head', 'wlwmanifest_link'); // Windows Live Writer
remove_action('wp_head', 'wp_generator');  // скрыть версию wordpress



remove_action('wp_head', 'wp_generator');
define('FORCE_SSL_ADMIN', true);

// Отключаем сам REST API
add_filter('rest_enabled', '__return_false');
 
// Отключаем фильтры REST API
remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 );
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
remove_action( 'auth_cookie_malformed', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_expired', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_username', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_hash', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_valid', 'rest_cookie_collect_status' );
remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );
 
// Отключаем события REST API
remove_action( 'init', 'rest_api_init' );
remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
remove_action( 'parse_request', 'rest_api_loaded' );
 
// Отключаем Embeds связанные с REST API
remove_action( 'rest_api_init', 'wp_oembed_register_route');
remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );
 
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

/**
 * Удаление json-api ссылок
 */
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('template_redirect', 'rest_output_link_header', 11);

/**
 * Cкрываем разные линки при отображении постов блога (следующий, предыдущий, короткий url)
 */
remove_action('wp_head', 'start_post_rel_link', 10);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
remove_action('wp_head', 'wp_shortlink_wp_head', 10);

/**
 * `Disable Emojis` Plugin Version: 1.7.2
 */
if ('Отключаем Emojis в WordPress') {

    /**
     * Disable the emoji's
     */
    function disable_emojis()
    {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
        add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
        add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
    }

    add_action('init', 'disable_emojis');

    /**
     * Filter function used to remove the tinymce emoji plugin.
     *
     * @param array $plugins
     * @return   array             Difference betwen the two arrays
     */
    function disable_emojis_tinymce($plugins)
    {
        if (is_array($plugins)) {
            return array_diff($plugins, array('wpemoji'));
        }

        return array();
    }

    /**
     * Remove emoji CDN hostname from DNS prefetching hints.
     *
     * @param array $urls URLs to print for resource hints.
     * @param string $relation_type The relation type the URLs are printed for.
     * @return array                 Difference betwen the two arrays.
     */
    function disable_emojis_remove_dns_prefetch($urls, $relation_type)
    {

        if ('dns-prefetch' == $relation_type) {

            // Strip out any URLs referencing the WordPress.org emoji location
            $emoji_svg_url_bit = 'https://s.w.org/images/core/emoji/';
            foreach ($urls as $key => $url) {
                if (strpos($url, $emoji_svg_url_bit) !== false) {
                    unset($urls[$key]);
                }
            }

        }

        return $urls;
    }

}

/**
 * Удаляем стили для recentcomments из header'а
 */ 
function remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}

add_action('widgets_init', 'remove_recent_comments_style');

/**
 * Удаляем ссылку на xmlrpc.php из header'а
 */
remove_action('wp_head', 'wp_bootstrap_starter_pingback_header');

/**
 * Удаляем стили для #page-sub-header из  header'а
 */
remove_action('wp_head', 'wp_bootstrap_starter_customizer_css');

/*
*Обновление количества товара
*/
add_filter('woocommerce_add_to_cart_fragments', 'header_add_to_cart_fragment');

function header_add_to_cart_fragment($fragments)
{
    global $woocommerce;
    ob_start();
    ?>
<span class="basket-btn__counter"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></span>
<?php
    $fragments['.basket-btn__counter'] = ob_get_clean();
    return $fragments;
}

/**
 * Замена надписи на кнопке Добавить в корзину
 */
add_filter('woocommerce_product_single_add_to_cart_text', 'woocust_change_label_button_add_to_cart_single');
function woocust_change_label_button_add_to_cart_single($label)
{

    $label = 'Добавить в корзину';

    return $label;
}

/**
 * Удаляем поля адрес и телефон, если нет доставки
 */

add_filter('woocommerce_checkout_fields', 'new_woocommerce_checkout_fields', 10, 1);

function new_woocommerce_checkout_fields($fields)
{
    if (!WC()->cart->needs_shipping()) {
        unset($fields['billing']['billing_address_1']); //удаляем Населённый пункт
        unset($fields['billing']['billing_address_2']); //удаляем Населённый пункт
        unset($fields['billing']['billing_city']); //удаляем Населённый пункт
        unset($fields['billing']['billing_postcode']); //удаляем Населённый пункт
        unset($fields['billing']['billing_country']); //удаляем Населённый пункт
        unset($fields['billing']['billing_state']); //удаляем Населённый пункт
        unset($fields['billing']['billing_company']); //удаляем Населённый пункт
        unset($fields['billing']['phone']); //удаляем Населённый пункт

    }
    return $fields;
}

remove_action('storefront_footer', 'storefront_credit', 20);

/**
 * Remove product data tabs
 */
add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);

function woo_remove_product_tabs($tabs)
{

    unset($tabs['description']);        // Remove the description tab
    unset($tabs['reviews']);            // Remove the reviews tab
    unset($tabs['additional_information']);    // Remove the additional information tab

    return $tabs;
}

//Количество товаров для вывода на странице магазина
add_filter('loop_shop_per_page', 'wg_view_all_products');

function wg_view_all_products()
{
    return '9999';
}

//Удаление сортировки
add_action('init', 'bbloomer_delay_remove');

function bbloomer_delay_remove()
{
    remove_action('woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10);
    remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10);
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
    remove_action('woocommerce_after_shop_loop', 'woocommerce_result_count', 20);

}

/*
*Изменение количетсва товара на строку на страницах woo
*/
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
    function loop_columns()
    {
        return 3; // 3 products per row
    }
}


//Удаление сторфронт-кредит
add_action('init', 'custom_remove_footer_credit', 10);

function custom_remove_footer_credit()
{
    remove_action('storefront_footer', 'storefront_credit', 20);
}


//Добавление favicon
function favicon_link()
{
    echo '<link rel="shortcut icon" type="image/x-icon" href="/favicon.png" />' . "\n";
}

add_action('wp_head', 'favicon_link');

//Изменение entry-content
function storefront_page_content()
{
    ?>
<div class="row">
    <?php the_content(); ?>
    <?php
        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . __('Pages:', 'storefront'),
                'after' => '</div>',
            )
        );
        ?>
</div>
<?php
}

add_filter('woocommerce_sale_flash', 'my_custom_sale_flash', 10, 3);
function my_custom_sale_flash($text, $post, $_product)
{
    return '<span class="onsale">SALE!</span>';
}

// Колонки related
add_filter('woocommerce_output_related_products_args', 'jk_related_products_args');
function jk_related_products_args($args)
{
    $args['posts_per_page'] = 6; // количество "Похожих товаров"
    $args['columns'] = 4; // количество колонок
    return $args;
}

add_action('init', 'storefront_remove_storefront_breadcrumbs');

function storefront_remove_storefront_breadcrumbs()
{
    remove_action('storefront_before_content', 'woocommerce_breadcrumb', 10);
}


function get_product_titles_by_category($slug)
{
    $args = array(
        'category' => array($slug),
    );
    $products = wc_get_products($args);
    $titles = [];
    foreach (array_reverse($products) as $productKey => $product) {
        if ($productKey === array_key_last($products)) {
            $comma = '';
        } else {
            $comma = ', ';
        }
        $titles[] = $product->name . $comma;
    }
    return implode($titles);
}

function get_post_gallery_images_with_info($postvar = NULL, $pos = 0)
{
    if (!isset($postvar)) {
        global $post;
        $postvar = $post;
    }
    $post_content = $postvar->post_content;
    if ($pos) {
        $post_content = preg_split('~\(:\)~', $post_content)[1];
    }
    preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
    $images_id = explode(",", $ids[1]);
    $image_gallery_with_info = array();
    foreach ($images_id as $image_id) {
        $attachment = get_post($image_id);
        array_push($image_gallery_with_info, array(
                'alt' => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true),
                'caption' => $attachment->post_excerpt,
                'description' => $attachment->post_content,
                'href' => get_permalink($attachment->ID),
                'src' => $attachment->guid,
                'title' => $attachment->post_title
            )
        );
    }
    return $image_gallery_with_info;
}

//Регистрируем кастомные записи Статьи и Каталоги
function register_post_types(){
    register_post_type('article', array(
        'label'  => null,
        'labels' => array(
            'name'               => 'Статьи', // основное название для типа записи
            'singular_name'      => 'Статью', // название для одной записи этого типа
            'add_new'            => 'Добавить статью', // для добавления новой записи
            'add_new_item'       => 'Добавление статьи', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать статью', // для редактирования типа записи
            'new_item'           => 'Новая статья', // текст новой записи
            'view_item'          => 'Смотреть статью', // для просмотра записи этого типа.
            'search_items'       => 'Искать статью', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Статьи', // название меню
        ),
        'menu_icon'           => 'dashicons-format-aside',
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
        // 'show_in_nav_menus'   => null, // зависит от public
        'show_in_menu'        => null, // показывать ли в меню адмики
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => null,
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ) );
}

add_action( 'init', 'register_post_types' );


function create_taxonomy(){
    register_taxonomy('type', array('article'), array(
            'label'                 => '', // определяется параметром $labels->name
            'labels'                => array(
                'name'              => 'Ключевые слова',
                'singular_name'     => 'Ключевые слова',
                'search_items'      => 'Искать ключевое слово',
                'all_items'         => 'Все ключевые слова',
                'view_item '        => 'Смотреть ключевое слово',
                'parent_item'       => 'Родительское ключевые слово',
                'parent_item_colon' => 'Родительские ключевые слова:',
                'edit_item'         => 'Редактировать ключевые слово',
                'update_item'       => 'Обновить ключевые слово',
                'add_new_item'      => 'Добавить новое ключевое слово',
                'new_item_name'     => 'Добавить новое ключевые слово',
                'menu_name'         => 'Ключевые слова',
            ),
            'description'           => 'Ключевые слова для статей', // описание таксономии
            'public'                => true,
            'hierarchical'          => true,
            //'update_count_callback' => '_update_post_term_count',
            'rewrite'               => true,
            //'query_var'             => $taxonomy, // название параметра запроса
            'capabilities'          => array(),
            'meta_box_cb'           => 'post_categories_meta_box', // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
            'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
            '_builtin'              => false,
            'show_in_quick_edit'    => null, // по умолчанию значение show_ui
            'exclude_from_search' => false,
            'show_in_rest' => true,
            'show_in_quick_edit' => true,
            'has_archive' => true,

        ) );
}

add_action( 'init', 'create_taxonomy' );

add_filter( 'woocommerce_get_item_data', 'wc_checkout_description_so_15127954', 10, 2 );
function wc_checkout_description_so_15127954( $other_data, $cart_item )
{
    $post_data = get_post( $cart_item['product_id'] );
    $other_data[] = array( 'name' =>  $post_data->post_excerpt );
    return $other_data;
}

// Удаление инлайн-скриптов из хедера
add_filter('storefront_customizer_css', '__return_false');
add_filter('storefront_customizer_woocommerce_css', '__return_false');
add_filter('storefront_gutenberg_block_editor_customizer_css', '__return_false');

add_action('wp_print_styles', function () {
    wp_styles()->add_data('woocommerce-inline', 'after', '');
});

add_action('init', function () {
    remove_action('wp_head', 'wc_gallery_noscript');
});
add_action('init', function () {
    remove_action('wp_head', 'wc_gallery_noscript');
});
// Конец удаления инлайн-скриптов из хедера



if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "new_post") {

    // Do some minor form validation to make sure there is content
    if (isset ($_POST['title'])) {
        $title =  $_POST['title'];
    } else {
        echo 'Please enter a  title';
    }
    if (isset ($_POST['description'])) {
        $description = $_POST['description'];
    } else {
        echo 'Please enter the content';
    }
    $tags = $_POST['post_tags'];

    // Add the content of the form to $post as an array
    $new_post = array(
        'post_title'    => $title,
        'post_content'  => $description,
        'post_category' => array($_POST['cat']),  // Usable for custom taxonomies too
        'tags_input'    => array($tags),
        'post_status'   => 'publish',           // Choose: publish, preview, future, draft, etc.
        'post_type' => 'post_type_name'  //'post',page' or use a custom post type if you want to
    );
    //save the new post
    $pid = wp_insert_post($new_post); 
    //insert taxonomies
}


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

add_action('wp_ajax_nopriv_ajax_form', 'review_form');
add_action('wp_ajax_ajax_form', 'review_form');

function review_form()
{
    $name = $_REQUEST['name'];
    $description = $_REQUEST['description'];

    
        // Add the content of the form to $post as an array
        $new_post = array(
            'post_title'    => $name,
            'post_content'  => $description,
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

add_action('wp_ajax_nopriv_ajax_form', 'ajax_form');
add_action('wp_ajax_ajax_form', 'ajax_form');
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');