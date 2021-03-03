<?php

/**
 * chef-abul-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package chef-abul-theme
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('chef_abul_theme_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function chef_abul_theme_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on chef-abul-theme, use a find and replace
		 * to change 'chef-abul-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('chef-abul-theme', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		// register_nav_menus(
		// 	array(
		// 		'menu-1' => esc_html__( 'Primary', 'chef-abul-theme' ),
		// 	)
		// );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'chef_abul_theme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action('after_setup_theme', 'chef_abul_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function chef_abul_theme_content_width()
{
	$GLOBALS['content_width'] = apply_filters('chef_abul_theme_content_width', 640);
}
add_action('after_setup_theme', 'chef_abul_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function chef_abul_theme_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'chef-abul-theme'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'chef-abul-theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'chef_abul_theme_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function chef_abul_theme_scripts()
{
	wp_enqueue_style('chef-abul-theme-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('chef-abul-theme-style', 'rtl', 'replace');

	wp_enqueue_script('chef-abul-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'chef_abul_theme_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}



/**
 * подключение стилей и скриптов
 */

add_action('wp_enqueue_scripts', 'style_theme');
add_action('wp_footer', 'scripts_theme');
function style_theme()
{
	wp_enqueue_style('new_style', get_template_directory_uri() . '/css/style.css');
}
function scripts_theme()
{

	wp_enqueue_script('new_script', get_template_directory_uri() . '/js/main.js');
}
wp_enqueue_script("jquery");


/**
 * регистрация меню
 */


register_nav_menus(array(
	'primary'   => esc_html__('primary menu', 'art-starter-theme'),
	'mobile'   => esc_html__('mobile menu', 'art-starter-theme'),
));


if (!function_exists('ast_primary_menu')) {
	function primary_menu()
	{
		wp_nav_menu(array(
			'container'      => '',
			'theme_location' => 'primary',
			'fallback_cb'     => '__return_empty_string'
		));
	}
}
if (!function_exists('ast_secondary_menu')) {
	function mobile_menu()
	{
		wp_nav_menu(array(
			'container'      => '',
			'menu_class'     => 'nav-list',
			'theme_location' => 'mobile',
			'fallback_cb'     => '__return_empty_string',
			'menu_class'     => 'nav-list '
		));
	}
}
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}


/*
* Кнопка перейти в корзину в шапке
*/

if (!function_exists('estore_woocommerce_cart_link_fragment')) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	add_filter('woocommerce_add_to_cart_fragments', 'estore_woocommerce_cart_link_fragment');
	function estore_woocommerce_cart_link_fragment($fragments)
	{
		ob_start();
		estore_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
function abdul_woocommerce_cart_link()
{
?>
	<a class="cart-contents header-card" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'chef-abul-theme'); ?>">
		<img src="<?php $page_id = 11;
					the_field('cart_icon', $page_id); ?>" alt="">
		<?php
		$item_count_text = sprintf(
			/* translators: number of items in the mini cart. */
			_n('%d item', '%d items', WC()->cart->get_cart_contents_count(), 'chef-abul-theme'),
			WC()->cart->get_cart_contents_count()
		);
		?>
		<p>Subtotal:<br>
			<span class="amount price"><?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?></span>
		</p>
	</a>
<?php
}

/*
* Изменения текста
*/

add_filter('gettext', 'translate_text');
add_filter('ngettext', 'translate_text');

function translate_text($translated)
{
	$translated = str_ireplace('Add to basket', 'Add to cart', $translated);
	$translated = str_ireplace('Description', 'Alergen advice', $translated);
	$translated = str_ireplace('Related products', 'You might also like', $translated);
	$translated = str_ireplace('You may be interested in', 'Bestselers', $translated);

	return $translated;
}

/***
 * *
 * Описание товара в каталоге
 */

add_action('woocommerce_after_shop_loop_item_title', 'add_short_description', 9);
function add_short_description()
{
	echo  the_excerpt();
}



/**
 * Изменить разделитель в хлебных крошках
 **/

add_filter('woocommerce_breadcrumb_defaults', 'true_woo_breadcrumbs_delimiter');

function true_woo_breadcrumbs_delimiter($defaults)
{

	$defaults['delimiter'] = '&nbsp;>&nbsp;';
	// меняем на неразрывные пробелы со стрелкой

	return $defaults;
}

/**
 * Удалить "выбрать опции"
 **/

// add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'filter_dropdown_option_html', 12, 2 );
// function filter_dropdown_option_html( $html, $args ) {
//     $show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __( 'Choose an option', 'woocommerce' );
//     $show_option_none_html = '<option value="">' . esc_html( $show_option_none_text ) . '</option>';

//     $html = str_replace($show_option_none_html, '', $html);

//     return $html;
// }


/**
 * Минимальная цена в каталоге
 **/
// function bbloomer_variation_price_format( $price, $product ) {

//  if (is_product()) {
//     return $product->get_price();
//  } else {
//         // Main Price
//         $prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
//         $price = $prices[0] !== $prices[1] ? sprintf( __( '%1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );

//         // Sale Price
//         $prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
//         sort( $prices );
//         $saleprice = $prices[0] !== $prices[1] ? sprintf( __( '%1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );

//         if ( $price !== $saleprice ) {
//         $price = '<del>' . $saleprice . '</del> <ins>' . $price . '</ins>';
//         }
//         return $price ;
//          }

// }
// if ( ! is_admin() ) {
//     add_filter( 'woocommerce_variable_sale_price_html', 'bbloomer_variation_price_format', 10, 2 );
//     add_filter( 'woocommerce_variable_price_html', 'bbloomer_variation_price_format', 10, 2 );
// }


// add_action( 'woocommerce_after_shop_loop_item_title', 'show_attributes', 20 );

// function show_attributes() {
//   global $product;
//   $product->list_attributes();
// }

/**
 * Краткое описание товара в корзине
 **/
add_filter('woocommerce_cart_item_name', 'add_excerpt_in_cart_item_name', 10, 3);
function add_excerpt_in_cart_item_name($item_name,  $cart_item,  $cart_item_key)
{
	$excerpt = wp_strip_all_tags(get_the_excerpt($cart_item['product_id']), true);
	$style = ' style="font-size:14px; line-height:normal;"';
	$excerpt_html = '<br>
        <p name="short-description"' . $style . '>' . $excerpt . '</p>';

	return $item_name . $excerpt_html;
}


/**
 * Фома логина
 **/
function my_account_loginout_link()
{

	if (is_user_logged_in()) {
		global $wp;
		$current_user = get_user_by('id', get_current_user_id());
		echo '<a class="nav-link" href="' . wp_logout_url(get_permalink(wc_get_page_id('shop'))) . '">logout? </a> ';
		echo '<strong><a class="nav-link" href="' . get_permalink(wc_get_page_id('myaccount')) . '">' . $current_user->display_name . '</a></strong>';
	} elseif (!is_user_logged_in()) {
		echo '<a class="nav-link" href="' . get_permalink(wc_get_page_id('myaccount')) . '">Login</a>';
	}
}


//WooCommerce 3.4.5<br>//Уведомление о добавлении товара в корзину
add_filter( 'wc_add_to_cart_message', 'custom_add_to_cart_message' );
function custom_add_to_cart_message( $message ) {
    $message = 'ппппппппппппппппп'; //здесь можно задать свой текст при добавлении товара в корзину, если оставите пустым то уведомление не будет выводиться
    return $message;
}





/**
 * Replace add to cart button in the loop.
 */
function iconic_change_loop_add_to_cart()
{
	remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
	add_action('woocommerce_after_shop_loop_item', 'iconic_template_loop_add_to_cart', 10);
}

add_action('init', 'iconic_change_loop_add_to_cart', 10);

/**
 * Use single add to cart button for variable products.
 */
function iconic_template_loop_add_to_cart()
{
	global $product;

	if (!$product->is_type('variable')) {
		woocommerce_template_loop_add_to_cart();
		return;
	}

	remove_action('woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20);
	add_action('woocommerce_single_variation', 'iconic_loop_variation_add_to_cart_button', 20);

	woocommerce_template_single_add_to_cart();
}

/**
 * Customise variable add to cart button for loop.
 *
 * Remove qty selector and simplify.
 */
function iconic_loop_variation_add_to_cart_button()
{
	global $product;

?>
	<div class="woocommerce-variation-add-to-cart variations_button">
		<button type="submit" class="single_add_to_cart_button button"><?php echo esc_html($product->single_add_to_cart_text()); ?></button>
		<input type="hidden" name="add-to-cart" value="<?php echo absint($product->get_id()); ?>" />
		<input type="hidden" name="product_id" value="<?php echo absint($product->get_id()); ?>" />
		<input type="hidden" name="variation_id" class="variation_id" value="0" />
	</div>
	<?php
}





// размер изображения карточке товара
add_filter('woocommerce_get_image_size_thumbnail', 'add_thumbnail_size', 1, 10);
function add_thumbnail_size($size)
{

	$size['width'] = 263;
	$size['height'] = 214;
	$size['crop']   = 1; //0 - не обрезаем, 1 - обрезка
	return $size;
}