<?php

//Останавливаем "сердцебиение" wordpress
# add_action( 'init', 'stop_heartbeat', 1 );
# function stop_heartbeat() {
#	wp_deregister_script('heartbeat'); }
//---------END-----------


//Удаляем лишнее из head
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'feed_links');
remove_action('wp_head', 'feed_links_extra', 3);
//---------END-----------


// Регистрируем walker для подключения меню bootstrap
require_once('wp_bootstrap_navwalker.php');
//---------END-----------


//Регистрируем меню
register_nav_menus(array(
    'sitemenu' => 'Верхнее меню',    //Меню сайта
    'storemenu' => 'Меню магазина',  //Меню магазина
    'footermenu' => 'Меню футера'     //Меню в футере
));
//---------END-----------


//Подключения файла стилей для админки Wordpress
function my_stylesheet1(){
    wp_enqueue_style("style-admin",get_bloginfo('stylesheet_directory')."/css/style-admin.css");
    }
    add_action('admin_head', 'my_stylesheet1');
//---------END-----------    


// вывод галочки политики конфидециальности в форме регистрации
add_action('woocommerce_register_form', 'in_woocommerce_register_form');
function in_woocommerce_register_form()
{ ?>
    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox chek_confirmed">
        <input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox"
               name="terms" <?php checked(apply_filters('woocommerce_terms_is_checked_default', isset($_POST['terms'])), true); ?>
               id="terms"/> <span>Я прочитал и принимаю условия <a href="//printblog.ru/politika" class="woocommerce-terms-and-conditions-link">политики конфидециальности</a></span>
    </label>
    <input type="hidden" name="terms-field" value="1"/>
    <?php
}

// Проверка согласия с условиями
add_action('woocommerce_process_registration_errors', 'in_woocommerce_process_registration_errors', 10, 4);
function in_woocommerce_process_registration_errors($errors, $username, $password, $email)
{
    if (empty($_POST['terms'])) {
        throw new Exception('В соответствии с Федеральным законом РФ № 152-ФЗ "О персональных данных" Вы должны прочитать и принять соглашение об обработке Ваших персональных данных.');
    }
    return $errors;
}

//---------END-----------


//Регистрируем Woocommerce
add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support()
{
    add_theme_support('woocommerce');
}

//---------END-----------


//Подключение стилей Woocommerce к нашей теме
function woo_style()
{
    wp_register_style('my-woocommerce', get_template_directory_uri() . '/woocommerce/woocommerce.css', null, 1.0, 'screen');
    wp_register_style('my-woocommerce-layot', get_template_directory_uri() . '/woocommerce/woocommerce-layout.css', null, 1.0, 'screen');
    wp_enqueue_style('my-woocommerce-layot');
    add_action('wp_enqueue_scripts', 'woo_style');
    wp_enqueue_style('my-woocommerce');
}

add_action('wp_enqueue_scripts', 'woo_style');
//---------END-----------


//Ограничение кол-ва символов в названии товара (файл /woocommerce/content-product.php)
function trim_title_chars($count, $after)
{
    $title = get_the_title();
    if (mb_strlen($title) > $count) $title = mb_substr($title, 0, $count);
    else $after = '';
    echo $title . $after;
}

//---------END-----------


//Вывод кол-ва товаров в магазине
add_filter('loop_shop_per_page', function ($cols) {
    // $cols contains the current number of products per page based on the value stored on Options -> Reading
    // Return the number of products you wanna show per page.
    return 24;
}, 20);
//---------END-----------

//Изменяем название кнопки "Добавить в корзину" на "Купить"
add_filter('woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text');

function woo_archive_custom_cart_button_text()
{

    return __('Купить', 'woocommerce');
}

//---------END-----------


/* php в постах или страницах WordPress: [exec]код[/exec]
----------------------------------------------------------------- */
function exec_php($matches)
{
    eval('ob_start();' . $matches[1] . '$inline_execute_output = ob_get_contents();ob_end_clean();');
    return $inline_execute_output;
}

function inline_php($content)
{
    $content = preg_replace_callback('/\[exec\]((.|\n)*?)\[\/exec\]/', 'exec_php', $content);
    $content = preg_replace('/\[exec off\]((.|\n)*?)\[\/exec\]/', '$1', $content);
    return $content;
}

add_filter('the_content', 'inline_php', 0);
//---------END-----------


//Регистрируем виджеты
if (function_exists('register_sidebar'))
    register_sidebar(array(
        'name' => 'Сайдбар контента',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
        'id' => "sidebar-1",
    ));


if (function_exists('register_sidebar'))
    register_sidebar(array(
        'name' => 'Главная 1',
        'before_widget' => '<div id="%1$s" class="widgetgl %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
        'id' => "sidebar-2",
    ));

if (function_exists('register_sidebar'))
    register_sidebar(array(
        'name' => 'Главная 2',
        'before_widget' => '<div id="%1$s" class="widgetgl %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
        'id' => "sidebar-3",
    ));

if (function_exists('register_sidebar'))
    register_sidebar(array(
        'name' => 'Главная 3',
        'before_widget' => '<div id="%1$s" class="widgetgl %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
        'id' => "sidebar-4",
    ));

if (function_exists('register_sidebar'))
    register_sidebar(array(
        'name' => 'Главная видео',
        'before_widget' => '<div id="%1$s" class="widgetgl %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
        'id' => "sidebar-5",
    ));

if (function_exists('register_sidebar'))
    register_sidebar(array(
        'name' => 'Главная товары',
        'before_widget' => '<div id="%1$s" class="widgetgl %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
        'id' => "sidebar-6",
    ));

if (function_exists('register_sidebar'))
    register_sidebar(array(
        'name' => 'Сайдбар магазина',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
        'id' => "sidebar-7",
    ));

if (function_exists('register_sidebar'))
    register_sidebar(array(
        'name' => 'Сайдбар генератора',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
        'id' => "sidebar-8",
    ));

//---------END-----------


//Добавление постраничной навигации
function wp_corenavi()
{
    global $wp_query;
    $pages = '';
    $max = $wp_query->max_num_pages;
    if (!$current = get_query_var('paged')) $current = 1;
    $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
    $a['total'] = $max;
    $a['current'] = $current;

    $total = 1; //1 - выводить текст "Страница N из N", 0 - не выводить
    $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
    $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
    $a['prev_text'] = '«'; //текст ссылки "Предыдущая страница"
    $a['next_text'] = '»'; //текст ссылки "Следующая страница"

    if ($max > 1) echo '<div class="navigation">';
    if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>' . "\r\n";
    echo $pages . paginate_links($a);
    if ($max > 1) echo '</div>';
}

//---------END-----------


//Добавление хлебных крошек от Dimox
function dimox_breadcrumbs()
{

    /* === ОПЦИИ === */
    $text['home'] = 'Главная'; // текст ссылки "Главная"
    $text['category'] = 'Архив рубрики "%s"'; // текст для страницы рубрики
    $text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
    $text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
    $text['author'] = 'Статьи автора %s'; // текст для страницы автора
    $text['404'] = 'Ошибка 404'; // текст для страницы 404
    $text['page'] = 'Страница %s'; // текст 'Страница N'
    $text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'

    $wrap_before = '<div class="breadcrumb">'; // открывающий тег обертки
    $wrap_after = '</div><!-- .breadcrumb -->'; // закрывающий тег обертки
    $sep = '&nbsp;/&nbsp;'; // разделитель между "крошками"
    $sep_before = '<span class="sep" style="color:#ccc;">'; // тег перед разделителем
    $sep_after = '</span>'; // тег после разделителя
    $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
    $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
    $show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
    $before = '<span class="current">'; // тег перед текущей "крошкой"
    $after = '</span>'; // тег после текущей "крошки"
    /* === КОНЕЦ ОПЦИЙ === */

    global $post;
    $home_link = home_url('/');
    $link_before = '<span itemscope itemtype="//data-vocabulary.org/Breadcrumb">';
    $link_after = '</span>';
    $link_attr = ' itemprop="url"';
    $link_in_before = '<span itemprop="title">';
    $link_in_after = '</span>';
    $link = $link_before . '<a href=""' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
    $frontpage_id = get_option('page_on_front');
    $parent_id = $post->post_parent;
    $sep = ' ' . $sep_before . $sep . $sep_after . ' ';

    if (is_home() || is_front_page()) {

        if ($show_on_home) echo $wrap_before . '<a href="' . $home_link . '">' . $text['home'] . '</a>' . $wrap_after;

    } else {

        echo $wrap_before;
        if ($show_home_link) echo sprintf($link, $home_link, $text['home']);

        if (is_category()) {
            $cat = get_category(get_query_var('cat'), false);
            if ($cat->parent != 0) {
                $cats = get_category_parents($cat->parent, TRUE, $sep);
                $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a>' . $link_after, $cats);
                if ($show_home_link) echo $sep;
                echo $cats;
            }
            if (get_query_var('paged')) {
                $cat = $cat->cat_ID;
                echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
            }

        } elseif (is_search()) {
            if (have_posts()) {
                if ($show_home_link && $show_current) echo $sep;
                if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
            } else {
                if ($show_home_link) echo $sep;
                echo $before . sprintf($text['search'], get_search_query()) . $after;
            }

        } elseif (is_day()) {
            if ($show_home_link) echo $sep;
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
            echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
            if ($show_current) echo $sep . $before . get_the_time('d') . $after;

        } elseif (is_month()) {
            if ($show_home_link) echo $sep;
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
            if ($show_current) echo $sep . $before . get_the_time('F') . $after;

        } elseif (is_year()) {
            if ($show_home_link && $show_current) echo $sep;
            if ($show_current) echo $before . get_the_time('Y') . $after;

        } elseif (is_single() && !is_attachment()) {
            if ($show_home_link) echo $sep;
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($show_current) echo $sep . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $sep);
                if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a>' . $link_after, $cats);
                echo $cats;
                if (get_query_var('cpage')) {
                    echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
                } else {
                    if ($show_current) echo $before . get_the_title() . $after;
                }
            }

            // custom post type
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            if (get_query_var('paged')) {
                echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_current) echo $sep . $before . $post_type->label . $after;
            }

        } elseif (is_attachment()) {
            if ($show_home_link) echo $sep;
            $parent = get_post($parent_id);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            if ($cat) {
                $cats = get_category_parents($cat, TRUE, $sep);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr . '>' . $link_in_before . '$2' . $link_in_after . '</a>' . $link_after, $cats);
                echo $cats;
            }
            printf($link, get_permalink($parent), $parent->post_title);
            if ($show_current) echo $sep . $before . get_the_title() . $after;

        } elseif (is_page() && !$parent_id) {
            if ($show_current) echo $sep . $before . get_the_title() . $after;

        } elseif (is_page() && $parent_id) {
            if ($show_home_link) echo $sep;
            if ($parent_id != $frontpage_id) {
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    if ($parent_id != $frontpage_id) {
                        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                    }
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo $breadcrumbs[$i];
                    if ($i != count($breadcrumbs) - 1) echo $sep;
                }
            }
            if ($show_current) echo $sep . $before . get_the_title() . $after;

        } elseif (is_tag()) {
            if (get_query_var('paged')) {
                $tag_id = get_queried_object_id();
                $tag = get_tag($tag_id);
                echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
            }

        } elseif (is_author()) {
            global $author;
            $author = get_userdata($author);
            if (get_query_var('paged')) {
                if ($show_home_link) echo $sep;
                echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_home_link && $show_current) echo $sep;
                if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
            }

        } elseif (is_404()) {
            if ($show_home_link && $show_current) echo $sep;
            if ($show_current) echo $before . $text['404'] . $after;

        } elseif (has_post_format() && !is_singular()) {
            if ($show_home_link) echo $sep;
            echo get_post_format_string(get_post_format());
        }

        echo $wrap_after;

    }
} // end of dimox_breadcrumbs()
//---------END-----------


//Корректировка хлебных крошек SEO для Q&A
add_filter('wpseo_breadcrumb_links', 'myYoastAnsPressBreadCrumb');
function myYoastAnsPressBreadCrumb($breadcrumb)
{

    global $wp_query;

    $workBreadcrumb = $breadcrumb;

    $questionId = $wp_query->get('question_id');

    if (!empty($questionId)) {
        // We are showing a question
        // Test to see if the current page in the breadcrumb is the AnsPress base page
        if (function_exists('ap_opt')) {
            $lastCrumb = array_pop($workBreadcrumb);

            if (is_array($lastCrumb)) {
                if (array_key_exists('id', $lastCrumb)) {
                    if (ap_opt('base_page') == $lastCrumb['id']) {

                        // Change the last crump id to point to the question
                        $parentId = $lastCrumb['id'];
                        $lastCrumb['id'] = $questionId;

                        // Create a listing for the base_page
                        $workBreadcrumb[] = array(
                            'text' => strip_tags(get_the_title($parentId)),
                            'url' => get_permalink($parentId),
                            'allow_html' => true);

                        // Add the question as the last crumb
                        $workBreadcrumb[] = $lastCrumb;

                        return $workBreadcrumb;
                    }
                }
            }
        }
    }

    return $breadcrumb;
}

//---------END-----------


//Генерация прошивки из заказа
function isProductAFirmware($product) {
    $terms = wp_get_post_terms($product['product_id'], 'product_cat', array('fields' => 'ids'));

    return is_array($terms) && in_array(2217, $terms);
}

function wc_change_status_handler($order_id, $checkout = null)
{
    global $woocommerce;
    $order = new WC_Order($order_id);
    if ($order->status === 'processing') {
        $order_items = $order->get_items();
        $address = $order->get_address();
        $data_array = array();
        foreach ($order_items as $key => $item) {

            if (!isProductAFirmware($item)) //функция будет обрабатывать только товары из рубрики "Прошивка"
            {
                continue;
            }

            $sku = '';
            if (!empty($item['variation_id'])) {
                //$variation = new WC_Product($item['variation_id']);
                $variation = wc_get_product($item['variation_id']);
                $sku = $variation->get_sku();
            }

            $admin_email = get_option('admin_email');

            $data_array = array(
                'SN' => !empty($item['Serial number']) ? $item['Serial number'] : '',
                'CRM' => !empty($item['CRUM']) ? $item['CRUM'] : '',
                'MDL' => $sku,
                'MDLNAME' => $item['name'],
                'MAIL' => $admin_email . (!empty($address['email']) ? ',' . $address['email'] : ''),
                'RES' => true
            );
        }

        if (!empty($data_array)) {
            $data_array['SN'] = strtoupper($data_array['SN']); //переводим в верхний регистр серийный номер


            $_SLN = strlen($data_array['SN']);
            if (strpos($data_array['MDLNAME'], "3550") == false && strpos($data_array['MDLNAME'], "4620") == false && strpos ($data_array['MDLNAME'], "Pantum") === false) //если название прошивки содержит эти цифтры
                if ($_SLN < 11) for ($_SLN = 15 - $_SLN; $_SLN > 0; $_SLN--) $data_array['SN'] .= "."; //тогда не добавляем 5 точек
            
            $data_array['CRM'] = strtoupper($data_array['CRM']); //переводим в верхний регистр CRUM
            $data_array['ORDER_ID'] = $order_id;

            do_action_ref_array('wp_gffz_SendRequest_Action', array(&$data_array));

        }

    }
}

add_action("woocommerce_order_status_changed", "wc_change_status_handler");
//---------END-----------

//Загрузка моделей по бренду. Используется в include/search-fix.php
function _getPrinterModels($parent)
{
    $terms = get_terms(array(
        'taxonomy' => 'filter',
        'hide_empty' => false,
        'orderby' => 'name',
        'parent' => $parent
    ));
    ?>
    <select name="printer-model" class="form-control">
        <option value="">Выбрать</option>
        <?php
        foreach ($terms as $term) { ?>
            <option <?php if (isset($_GET['printer-model']) && $_GET['printer-model'] == $term->term_id) {
                echo 'selected="selected"';
            } ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
        <?php } ?>
    </select>
    <?php
}

add_action('wp_enqueue_scripts', 'models_ajax_data', 99);
function models_ajax_data()
{

    wp_localize_script('jquery', 'models_ajax',
        array(
            'url' => admin_url('admin-ajax.php')
        )
    );

}

add_action('wp_ajax_load_printer_models', 'printer_select_callback');
add_action('wp_ajax_nopriv_load_printer_models', 'printer_select_callback');

function printer_select_callback()
{
    _getPrinterModels($_POST['brand']);
    wp_die();
}

//---------END-----------


//===== отключить уведомление об обновлении плагинов и вордпресс=====//
/*Отключение обновления Wordpress
add_filter('pre_site_transient_update_core',create_function('$a', "return null;"));
wp_clear_scheduled_hook('wp_version_check');*/


/*Отключение обновления плагинов
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );*/
//---------END-----------



/* Выводим кол-во товара "В наличии..." в каталоге */
add_action('woocommerce_before_shop_loop_item_title', 'my_sold_out_loop');
function my_sold_out_loop()
{
    global $product;

    if ($product->is_in_stock() && $product->get_stock_quantity() == 0) {
        echo '<div class="cat-in-stock" >В наличии</div>';
    } elseif ($product->is_in_stock()) {
        echo '<div class="cat-in-stock" >' . $product->get_stock_quantity() . ' в наличии</div>';
    } else {
        echo '<div class="cat-out-of-stock" >Под заказ</div>';
    }
}

/* END Вывод кол-ва товара в каталоге */


/* Выводим код товара в каталоге */
add_action( 'woocommerce_before_shop_loop_item_title', 'shop_sku' );
function shop_sku(){
global $product;
echo '<span class="price-sku">Код: ' . $product->sku . '</span>';

}
/* END Выводим код товара в каталоге */





/* Вместо символа рубля, просто "руб." и "грн." в письмах с заказами */
add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);
function change_existing_currency_symbol($currency_symbol, $currency)
{
    switch ($currency) {
        case 'RUB':
            $currency_symbol = ' руб.';
            break;
        case 'UAH':
            $currency_symbol = ' грн.';
            break;
    }
    return $currency_symbol;
}

/* END Вместо символа рубля, просто "руб." */


/*Миникорзина в шапке сайта*/
//Вывод кратких данных из корзины
if (!function_exists('cart_link')) {
    function cart_link()
    {
        ?>
        <a class="cart-contents" title="<?php _e('Перейти в корзину'); ?>">
            <i class="fa fa-shopping-cart"></i>
            <?php echo sprintf(_n('%d товар(ов)', '%d товар(ов)', WC()->cart->cart_contents_count), WC()->cart->cart_contents_count); ?>
        </a>
        <?php
    }
}


//Ajax Обновление кратких данных из корзины
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment($fragments)
{
    ob_start();
    ?>
    <a class="cart-contents" title="<?php _e('Перейти в корзину'); ?>">
        <i class="fa fa-shopping-cart"></i>
        <?php echo sprintf(_n('%d товар(ов)', '%d товар(ов)', WC()->cart->cart_contents_count), WC()->cart->cart_contents_count); ?>
    </a>
    <?php
    $fragments['a.cart-contents'] = ob_get_clean();
    return $fragments;
}

/*END Миникорзина в шапке сайта*/


//Изменяем слово Подытог на Сумма
add_filter('gettext', 'translate_text');
add_filter('ngettext', 'translate_text');

function translate_text($translated)
{
    $translated = str_ireplace('Подытог', 'Сумма заказа', $translated);
    return $translated;
}

//END Изменяем слово Подытог на Сумма


//Выводим код у товаров в корзине
add_filter('woocommerce_cart_item_name', 'add_sku_in_cart', 20, 3);

function add_sku_in_cart($title, $values, $cart_item_key)
{
    $sku = $values['data']->get_sku();
    return $sku ? $title . sprintf(" </br><span>Код товара: %s</span>", $sku) : $title;
}

//END Выводим код у товаров в корзине


//Убрать кнопку "В корзину" у товаров, которых нет в наличии
/*
if (!function_exists('woocommerce_template_loop_add_to_cart')) {
  function woocommerce_template_loop_add_to_cart() {
     global $product;
     if ( ! $product->is_in_stock() || ! $product->is_purchasable() ) return;
     woocommerce_get_template('loop/add-to-cart.php');
   }
 }
 */
//END Убрать кнопку "В корзину" у товаров, которых нет в наличии


/* Вывод последних событий на сайте */

function get_posts_by_meta($postOptions, $meta)
{
    $postOptions = $postOptions ? $postOptions : [];
    $args = array_merge($postOptions, [
        'meta_query' => [
            [
                'key' => $meta['key'],
                'value' => $meta['value']
            ],
        ],
    ]);

    $posts = get_posts($args);

    if (!$posts || is_wp_error($posts)) return false;

    return $posts;
}

require_once __DIR__ . '/app/autoload.php';

use App\Helpers\YoutubeChannel;

define('LAST_YOUTUBE_VIDEO_DATE', 'LAST_YOUTUBE_VIDEO_DATE');

add_action('init', 'register_event_post_type');
function register_event_post_type()
{
    register_post_type('event', array(
        'label' => null,
        'labels' => array(
            'name' => 'События', // основное название для типа записи
            'singular_name' => 'Событие', // название для одной записи этого типа
            'add_new' => 'Добавить событие', // для добавления новой записи
            'add_new_item' => 'Добавление события', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item' => 'Редактирование события', // для редактирования типа записи
            'new_item' => 'Новое событие', // текст новой записи
            'view_item' => 'Смотреть событие', // для просмотра записи этого типа.
            'search_items' => 'Искать событие', // для поиска по этим типам записи
            'not_found' => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon' => '', // для родителей (у древовидных типов)
            'menu_name' => 'События', // название меню
        ),
        'description' => '',
        'public' => true,
        'show_in_menu' => null, // показывать ли в меню адмнки
        'show_in_rest' => null, // добавить в REST API. C WP 4.7
        'rest_base' => null, // $post_type. C WP 4.7
        'menu_position' => null,
        'menu_icon' => 'dashicons-megaphone',
        'hierarchical' => false,
        'supports' => ['title', 'editor'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies' => [],
        'has_archive' => true,
        'rewrite' => false,
        'query_var' => true,
    ));
}

if (defined('DOING_CRON') && DOING_CRON) {
    add_action('check_new_youtube_videos', 'add_new_videos');
    function add_new_videos()
    {
        $youtubeChannelInstance = YoutubeChannel::getInstance();
        $newVideos = $youtubeChannelInstance->getNewVideosAfterLastCheck();

        if ($newVideos) {
            foreach ($newVideos as $video) {
                add_new_event('video', null, $video->snippet->title, $youtubeChannelInstance->getVideoUrl($video->id->videoId));
            }

            error_log('YOUTUBE VIDEOS CRONE TASK: New Video Has Been Added' . serialize($newVideos));
        }

        error_log('YOUTUBE VIDEOS CRONE TASK: No one new video' . serialize($newVideos));
    }
}

function add_new_event($postType, $post = null, $postName = '', $postUrl = '')
{
    $postContent = 'Добавлена новая запись';

    if ($postType === 'product') {
        $postContent = 'Добавлен новый товар';
    }

    if ($postType === 'video') {
        $postContent = 'Добавлено новое видео';
    }

    $eventId = wp_insert_post([
        'post_title' => $postContent . " " . ($post ? '"' . $post->post_title . '"' : $postName),
        'post_content' => $postContent,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_type' => 'event',
    ]);

    if ($post) {
        update_post_meta($eventId, 'post', $post->ID);
    } else {
        update_post_meta($eventId, 'post_url', $postUrl);
        update_post_meta($eventId, 'post_name', $postName);
    }
}

function add_new_event_by_hook($postId, $post, $update)
{
    $isEventAlreadyBeAdded = (bool)get_posts_by_meta([
        'post_type' => 'event',
        'numberposts' => 1
    ], ['key' => 'post', 'value' => $postId]);

    if (!$isEventAlreadyBeAdded && !wp_is_post_revision($postId) && $post->post_status === 'publish') {
        $postTime = strtotime($post->post_date);
        $current = strtotime('now');

        if ($current < ($postTime + 60 * 60 * 24)) {
            add_new_event($post->post_type, $post);
        }
    }
}

add_action('save_post_product', 'add_new_event_by_hook', 10, 3);
add_action('save_post_post', 'add_new_event_by_hook', 11, 3);

/* END: Вывод последних событий на сайте */


// START: отправка письма об отмене заказа покупателю

function sendCancelledOrderNotificationEmail($order_id, $email = null)
{
    $wc_emails = WC()->mailer()->get_emails();

    if ($email) {
        $wc_emails['WC_Email_Cancelled_Order']->recipient = $email;
    }

    $wc_emails['WC_Email_Cancelled_Order']->trigger($order_id);
}

add_action('woocommerce_order_status_changed', 'send_custom_email_notifications', 10, 4);
function send_custom_email_notifications($order_id, $old_status, $new_status, $order)
{
    if ($new_status == 'cancelled') {
        $customer_email = $order->get_billing_email();
        sendCancelledOrderNotificationEmail($order->get_order_number(), $customer_email);
    }
}

// END: отправка письма об отмене заказа покупателю


// START: отмена заказов из статуса на удержание

define('SECRET_KEY_FOR_HTTP_REQUESTS', '7lAdzC4IwErJvCnr');
define('SET_ORDER_STATUS_TO_CANCELLED_HOOK_NAME', 'set_order_status_to_cancelled');
add_action('woocommerce_order_status_changed', 'check_woocommerce_status_after_change', 10, 4);
function check_woocommerce_status_after_change($order_id, $old_status, $new_status)
{
    $hookArgs = ['order_id' => $order_id];

    if ($new_status === 'on-hold') {
        $setCancelledStatusEventTimestamp = time() + 259200; //259200 секунд = 3 суток
        wp_schedule_single_event($setCancelledStatusEventTimestamp, SET_ORDER_STATUS_TO_CANCELLED_HOOK_NAME, $hookArgs);
    } else {
        wp_clear_scheduled_hook(SET_ORDER_STATUS_TO_CANCELLED_HOOK_NAME, $hookArgs);
    }
}

add_action(SET_ORDER_STATUS_TO_CANCELLED_HOOK_NAME, 'set_order_status_to_cancelled');
function set_order_status_to_cancelled($order_id)
{
    $cancelNotificationScriptUrl = get_theme_file_uri("http/send_cancelled_notification.php?id=$order_id&key=" . SECRET_KEY_FOR_HTTP_REQUESTS);
    file_get_contents($cancelNotificationScriptUrl);
    $order = new WC_Order($order_id);

    if ($order->get_status() === 'on-hold') {
        $order->update_status('cancelled');
    }
}

// END: отмена заказов из статуса на удержание

// START: LOG REQUEST FROM QIWI WITH SUCCESS PAYMENT

define('ORDER_COMPLETED_ANCHOR_KEY', 'order_is_completed_anchor');

function getStatusForOrderAfterPayment($order) {
    $items = $order->get_items();

    foreach ($items as $item) {
        $product = $item->get_product();

        if (!$product->is_virtual() || isProductAFirmware($item)) {
            return 'processing';
        }
    }

    return 'completed';
}

add_action('init', 'processQiwiPaymentRequest');

function processQiwiPaymentRequest()
{
    if ($_SERVER['REQUEST_URI'] === '/?wc-api=qiwi') {
        $logger = wc_get_logger();
        $context = ['source' => 'Orders payment processing'];
        $body = file_get_contents('php://input');

        $logger->debug('request - ' . wc_print_r($_REQUEST, true) . ', body - ' . wc_print_r($body, true), $context);
        try {
            $json = json_decode($body, true);
            $transactionId = $json['bill']['billId'];

            global $wpdb;
            $query = $wpdb->prepare("
                SELECT post_id FROM $wpdb->postmeta WHERE
                meta_key = '_transaction_id'
                AND meta_value = %s
                LIMIT 1
            ", $transactionId);
            $postId = $wpdb->get_col($query)[0];

            $isOrderAlreadyCompleted = !empty(get_post_meta($postId, ORDER_COMPLETED_ANCHOR_KEY, true));
            update_post_meta($postId, ORDER_COMPLETED_ANCHOR_KEY, true);

            if (!$isOrderAlreadyCompleted) {
                $order = new WC_Order($postId);
                $status = getStatusForOrderAfterPayment($order);
                $order->update_status($status);

                $logger->notice("Order #$postId paid and set status to $status ", $context);
            }
        } catch (Exception $e) {
            $logger->error('Error when try to process payment - ' . $e->getMessage(), $context);
        }

    }
}

// END: LOG REQUEST FROM QIWI WITH SUCCESS PAYMENT

//Меняем название накопительной скидки на странице оформления заказа и в корзине
add_filter( 'woocommerce_cart_totals_coupon_label', 'truemisha_hide_coupon_code', 20, 2 );
 
function truemisha_hide_coupon_code( $label, $coupon ) {
 
	if( 'discount1' == $coupon->code ) {
		$label = 'Ваша накопительная скидка ';
	}
 
	return $label;
 
}
//Меняем название накопительной скидки на странице оформления заказа и в корзине END




// Добавляем +10% к стоимости товара если выбран способ оплаты по безналу
add_action( 'woocommerce_before_calculate_totals', 'add_custom_price', 1, 1);
function add_custom_price( $cart_obj ) {
    // This is necessary for WC 3.0+
    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
        return;
    // Avoiding hook repetition (when using price calculations for example)
    if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 )
        return;
    // Loop through cart items
	
	
    if(  WC()->session->get('is_company') == '1'  ){

        foreach ( $cart_obj->get_cart() as $cart_item ) {
			$special_by_photo = get_post_meta( $cart_item['product_id'], 'special_by_photo', true );
			$product_session_image = getSessionProductAdvPhoto($cart_item['product_id']);
		
            // Делаем текущую цену +10%
            $newprice = $cart_item['data']->get_regular_price() * 1.1;
			
			if ($special_by_photo == 'yes' && $product_session_image !== false) {
			
				$percent = get_post_meta( $cart_item['product_id'], 'special_by_photo_percent', true );
				$percent = str_replace(',', '.', $percent );
				
				$newprice = $newprice - ($newprice * ((float) $percent / 100));
			}
			  
			  
            // Меняем цену
            $cart_item['data']->set_price( $newprice );
            
        }
	}else{
		foreach ( $cart_obj->get_cart() as $cart_item ) {
			$special_by_photo = get_post_meta( $cart_item['product_id'], 'special_by_photo', true );
			$product_session_image = getSessionProductAdvPhoto($cart_item['product_id']);
			
			if ($special_by_photo == 'yes' && $product_session_image !== false) {
				$percent = get_post_meta( $cart_item['product_id'], 'special_by_photo_percent', true );
				$percent = str_replace(',', '.', $percent );
			
		
				$newprice = $cart_item['data']->get_regular_price() - ($cart_item['data']->get_regular_price() * ((float) $percent / 100));
				
				$cart_item['data']->set_price( $newprice );
			}
            
        }
	}
}
add_filter( 'woocommerce_cart_totals_order_total_html', 'filter_function_name_7099' );
function filter_function_name_7099( $value ){

	return $value;
} 
//END Добавляем +10% к стоимости товара если выбран способ оплаты по безналу


add_filter( 'woocommerce_shipping_chosen_method', '__return_false', 99);

// Подключение функции вывода способа выбора оформления заказа (Физ лицо или Юрлицо)
require_once 'woocommerce-cutom-functions.php';  

//Отключение радиокнопки выбора способа доставки, по умолчанию ничего не выбрано
add_filter( 'woocommerce_shipping_chosen_method', '__return_false', 99);


//Порядок вывода строк на странице оформления заказа
function sort_fields_billing($fields) {

	$fields["billing"]["billing_first_name"]["priority"] = 1;
	$fields["billing"]["billing_last_name"]["priority"] = 2;
	$fields["billing"]["billing_address_1"]["priority"] = 6;
	$fields["billing"]["billing_city"]["priority"] = 8;
	$fields["billing"]["billing_postcode"]["priority"] = 9;
	$fields["billing"]["billing_country"]["priority"] = 5;
	$fields["billing"]["billing_state"]["priority"] = 10;
	$fields["billing"]["billing_email"]["priority"] = 4;
	$fields["billing"]["billing_phone"]["priority"] = 3;
	
	return $fields;
	
}

add_filter("woocommerce_checkout_fields", "sort_fields_billing");
//END Порядок вывода строк на странице оформления заказа




// Изображения товаров на странице оформления заказа
add_filter( 'woocommerce_cart_item_name', 'true_checkout_product_images', 25, 2 );
 
function true_checkout_product_images( $name, $cart_item ) {
 
	// ничего не делаем, если находимся не на странице оформления заказа
	if ( ! is_checkout() ) {
		return $name;
	}
 
	$product = $cart_item[ 'data' ];
	$image = $product->get_image( array( 50, 50 ), array( 'class' => 'alignleft' ) );
 
	// объединяем изображение с названием товара
	return $image . $name;
 
}
//END Изображения товаров на странице оформления заказа


// Добавляем стили для админки
function my_admin_style() {
  wp_enqueue_style('admin-styles', get_stylesheet_directory_uri().'/css/myadmin.css');
}
add_action('admin_enqueue_scripts', 'my_admin_style');
// END Добавляем стили для админки