<?php
function nexaflow_enqueue_assets() {
    $css_file = get_template_directory() . '/css/style.css';
	$version = file_exists($css_file) ? filemtime($css_file) : false;

    wp_enqueue_style('nexaflow-style', get_template_directory_uri() . '/css/style.css', [], $version, 'all');

	wp_enqueue_style('nexaflow-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap', [], null);
	wp_enqueue_style('nexaflow-symbols-fonts', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200', array(), null);
}

add_action('wp_enqueue_scripts', 'nexaflow_enqueue_assets');

function nexaflow_theme_setup() {
	add_theme_support('custom-logo', array(
		'width' => 32,
		'height' => 32,
		'flex-width' => true,
		'flex-height' => true
	));

	add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'nexaflow_theme_setup');

function nexaflow_register_cpt_benefits() {
    register_post_type('benefit', [
        'labels' => [
            'name' => 'Преимущества',
            'singular_name' => 'Преимущество',
        ],
        'public' => true,
        'has_archive' => false,
        'show_in_menu' => true,
        'supports' => ['title'],
        'menu_position' => 80,
    ]);
}
add_action('init', 'nexaflow_register_cpt_benefits');

function nexaflow_register_cpt_howitworks() {
    register_post_type('howitworks', [
        'labels' => [
            'name' => 'Как это работает',
            'singular_name' => 'Как это работает',
        ],
        'public' => true,
        'has_archive' => false,
        'show_in_menu' => true,
        'supports' => ['title', 'editor'],
        'menu_position' => 81,
    ]);
}
add_action('init', 'nexaflow_register_cpt_howitworks');

function nexaflow_register_cpt_location() {
    register_post_type('location', [
        'labels' => [
            'name' => 'Точки карты',
            'singular_name' => 'Точка карты',
        ],
        'public' => true,
        'has_archive' => false,
        'show_in_menu' => true,
		'menu_icon' => 'dashicons-location-alt',
        'supports' => ['title'],
		'show_in_rest' => true,
        'menu_position' => 82,
    ]);
}
add_action('init', 'nexaflow_register_cpt_location');

function nexaflow_register_cpt_faq() {
    register_post_type('faq', [
        'labels' => [
            'name' => 'Вопросы/ответы',
            'singular_name' => 'Вопрос/ответ',
        ],
        'public' => true,
        'has_archive' => false,
        'show_in_menu' => true,
		'menu_icon' => 'dashicons-editor-help',
        'supports' => ['title'],
		'show_in_rest' => true,
        'menu_position' => 83,
    ]);
}
add_action('init', 'nexaflow_register_cpt_faq');

function nexaflow_register_cpt_testimonials() {
    register_post_type('testimonials', [
        'labels' => [
            'name' => 'Рекомендации',
            'singular_name' => 'Рекомендация',
        ],
        'public' => true,
        'has_archive' => false,
        'show_in_menu' => true,
        'supports' => ['title', 'thumbnail'],
		'show_in_rest' => true,
        'menu_position' => 84,
    ]);
}
add_action('init', 'nexaflow_register_cpt_testimonials');

function nexaflow_register_cpt_eligibility() {
    register_post_type('eligibility', [
        'labels' => [
            'name' => 'Пригодность',
            'singular_name' => 'Пригодность',
        ],
        'public' => true,
        'has_archive' => false,
        'show_in_menu' => true,
        'supports' => ['title'],
		'show_in_rest' => true,
        'menu_position' => 85,
    ]);
}
add_action('init', 'nexaflow_register_cpt_eligibility');

add_filter('wpcf7_autop_or_not', '__return_false');

function nexaflow_register_cpt_footer_column() {
    register_post_type('footer_column', [
        'labels' => [
            'name' => 'Колонки футера',
            'singular_name' => 'Колонка футера',
        ],
        'public' => true,
        'show_in_menu' => true,
        'supports' => ['title', 'page-attributes'],
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-list-view',
        'menu_position' => 86,
    ]);
}
add_action('init', 'nexaflow_register_cpt_footer_column');

function nexaflow_register_cpt_footer_link() {
    register_post_type('footer_link', [
        'labels' => [
            'name' => 'Ссылки футера',
            'singular_name' => 'Ссылка футера',
        ],
        'public' => true,
        'show_in_menu' => 'edit.php?post_type=footer_column',
        'supports' => ['title', 'page-attributes'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'nexaflow_register_cpt_footer_link');