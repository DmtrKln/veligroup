<?php

/**
 * Подключение стилей и скриптов
 */
function theme_assets()
{
    wp_enqueue_style(
        'vendor',
        get_template_directory_uri() . '/assets/css/vendor.css',
        [],
        filemtime(get_template_directory() . '/assets/css/vendor.css')
    );

    wp_enqueue_style(
        'swiper',
        get_template_directory_uri() . '/assets/vendor/swiper-bundle.min.css',
        [],
        filemtime(get_template_directory() . '/assets/vendor/swiper-bundle.min.css')
    );

    wp_enqueue_style(
        'main',
        get_template_directory_uri() . '/assets/css/main.css',
        ['vendor', 'swiper'],
        filemtime(get_template_directory() . '/assets/css/main.css')
    );

    wp_enqueue_script(
        'swiper',
        get_template_directory_uri() . '/assets/vendor/swiper-bundle.min.js',
        [],
        filemtime(get_template_directory() . '/assets/vendor/swiper-bundle.min.js'),
        [
            'strategy'  => 'defer',
            'in_footer' => true,
        ]
    );

    wp_enqueue_script(
        'typed',
        get_template_directory_uri() . '/assets/vendor/typed.min.js',
        [],
        filemtime(get_template_directory() . '/assets/vendor/typed.min.js'),
        [
            'strategy'  => 'defer',
            'in_footer' => true,
        ]
    );

    wp_enqueue_script(
        'main',
        get_template_directory_uri() . '/assets/js/main.js',
        ['swiper', 'typed'],
        filemtime(get_template_directory() . '/assets/js/main.js'),
        [
            'strategy'  => 'defer',
            'in_footer' => true,
        ]
    );
}
add_action('wp_enqueue_scripts', 'theme_assets');


function my_theme_styles()
{
    wp_enqueue_style('main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'my_theme_styles');




add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('custom-logo');

add_filter('upload_mimes', 'svg_upload_allow');

function svg_upload_allow($mimes)
{
    $mimes['svg']  = 'image/svg+xml';

    return $mimes;
}

function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime)
{
    $ext = isset($data['ext']) ? $data['ext'] : '';
    $type = isset($data['type']) ? $data['type'] : '';

    if ($ext === 'svg') {
        $data['type'] = 'image/svg+xml';
        $data['ext']  = 'svg';
    }

    return $data;
}

add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5);


add_filter('acf/format_value/type=textarea', 'my_acf_format_value', 10, 3);
function my_acf_format_value($value, $post_id, $field)
{
    return $value;
}


function theme_register_menus()
{

    register_nav_menus(array(
        'header_menu' => 'Меню в шапке',
        'footer_menu' => 'Меню в подвале',
        'mobile_menu' => 'Мобильное меню',
    ));
}

add_action('after_setup_theme', 'theme_register_menus');

function veliy_menu_item_classes($classes, $item, $args)
{
    if (!in_array($args->theme_location, ['header_menu', 'mobile_menu', 'footer_menu'], true)) {
        return $classes;
    }

    // Один список меню используется в разных местах с разными классами.
    $classes = array_diff($classes, ['header__item', 'header__mobile-item']);

    if ($args->theme_location === 'header_menu') {
        $classes[] = 'header__item';
    } elseif ($args->theme_location === 'mobile_menu') {
        $classes[] = 'header__mobile-item';
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'veliy_menu_item_classes', 10, 3);

function veliy_menu_link_attributes($attributes, $item, $args)
{
    if ($args->theme_location === 'mobile_menu') {
        $attributes['class'] = trim(($attributes['class'] ?? '') . ' header__mobile-link');

        if (!empty($item->current)) {
            $attributes['class'] .= ' is-active';
        }
    } elseif ($args->theme_location === 'footer_menu') {
        $attributes['class'] = trim(($attributes['class'] ?? '') . ' footer__link');
    }

    return $attributes;
}
add_filter('nav_menu_link_attributes', 'veliy_menu_link_attributes', 10, 3);

add_filter('excerpt_more', '__return_empty_string');

// Адрес страницы с шаблоном Tariff: tariff-start, tariff-basic и т. д.
function veliy_sync_tariff_page_slug($post_id)
{
    static $updating = false;

    if ($updating || !is_numeric($post_id)) {
        return;
    }

    $post = get_post((int) $post_id);
    if (!$post || $post->post_type !== 'page'
        || in_array($post->post_status, ['auto-draft', 'trash', 'inherit'], true)
        || get_page_template_slug($post->ID) !== 'tariff.php') {
        return;
    }

    $name = trim((string) get_field('tariff_name', $post->ID));
    if ($name === '') {
        $name = trim($post->post_title);
    }
    $name = preg_replace('/^(?:тариф|план|tariff|plan)[\s-]+/iu', '', $name);
    if ($name === '') {
        return;
    }

    $slug = wp_unique_post_slug(
        sanitize_title('tariff-' . $name),
        $post->ID,
        $post->post_status,
        $post->post_type,
        $post->post_parent
    );
    if ($slug === $post->post_name) {
        return;
    }

    $old_path = $post->post_status === 'publish' ? get_page_uri($post) : '';
    $updating = true;
    $result = wp_update_post(['ID' => $post->ID, 'post_name' => $slug], true);
    $updating = false;

    if (!is_wp_error($result) && $old_path !== '') {
        $old_paths = get_post_meta($post->ID, '_veliy_tariff_old_path');
        if (!in_array($old_path, $old_paths, true)) {
            add_post_meta($post->ID, '_veliy_tariff_old_path', $old_path);
        }
    }
}
add_action('wp_after_insert_post', 'veliy_sync_tariff_page_slug');
add_action('acf/save_post', 'veliy_sync_tariff_page_slug', 20);
add_action('rest_after_insert_page', function ($post) {
    veliy_sync_tariff_page_slug($post->ID);
});

// Старые опубликованные адреса тарифов перенаправляются на актуальные.
function veliy_redirect_legacy_tariff_pages()
{
    if (!is_404()) {
        return;
    }

    global $wp;
    $pages = get_posts([
        'post_type' => 'page',
        'post_status' => 'publish',
        'posts_per_page' => 1,
        'meta_key' => '_veliy_tariff_old_path',
        'meta_value' => trim($wp->request, '/'),
    ]);

    if ($pages && get_page_template_slug($pages[0]->ID) === 'tariff.php') {
        wp_safe_redirect(get_permalink($pages[0]->ID), 301);
        exit;
    }
}
add_action('template_redirect', 'veliy_redirect_legacy_tariff_pages', 5);




//создание отдельной вкладки 


add_action('acf/init', function () {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Опции',
            'menu_title' => 'Опции',
            'menu_slug'  => 'site-options',
            'redirect'   => false,
        ]);
    }
});

// Услуги: лендинг, сайт-визитка и другие решения.
function register_services_cpt()
{
    $labels = [
        'name'               => 'Услуги',
        'singular_name'      => 'Услуга',
        'menu_name'          => 'Услуги',
        'add_new'            => 'Добавить услугу',
        'add_new_item'       => 'Добавить услугу',
        'edit_item'          => 'Редактировать услугу',
        'new_item'           => 'Новая услуга',
        'view_item'          => 'Просмотреть услугу',
        'all_items'          => 'Все услуги',
        'search_items'       => 'Поиск услуг',
        'not_found'          => 'Услуги не найдены',
        'not_found_in_trash' => 'В корзине услуг нет',
    ];

    register_post_type('services', [
        'labels'       => $labels,
        'public'       => true,
        'show_in_rest' => true,
        'menu_icon'    => 'dashicons-hammer',
        'has_archive'  => false,
        'rewrite'      => [
            'slug'       => 'services',
            'with_front' => false,
        ],
        'supports' => [
            'title',
            'thumbnail',
            'page-attributes',
        ],
    ]);
}
add_action('init', 'register_services_cpt');

// Публичные ссылки услуг без префикса /services/.
function veliy_service_permalink($url, $post, $leavename)
{
    if ($post->post_type === 'services') {
        $slug = $leavename ? '%services%' : $post->post_name;
        if ($slug !== '') {
            return home_url(user_trailingslashit('/' . $slug));
        }
    }

    return $url;
}
add_filter('post_type_link', 'veliy_service_permalink', 10, 3);

// Находим услугу по её ярлыку, не перехватывая обычные страницы.
function veliy_resolve_root_service($query_vars)
{
    if (is_admin() || isset($query_vars['p']) || isset($query_vars['post_type'])
        || isset($query_vars['page_id']) || isset($query_vars['attachment_id'])) {
        return $query_vars;
    }

    global $wp;
    $slug = trim($wp->request, '/');
    if ($slug === '' || str_contains($slug, '/')
        || get_page_by_path($slug, OBJECT, 'page')) {
        return $query_vars;
    }

    $service = get_page_by_path($slug, OBJECT, 'services');
    if ($service && $service->post_status === 'publish') {
        unset($query_vars['pagename'], $query_vars['error']);
        $query_vars['post_type'] = 'services';
        $query_vars['name'] = $service->post_name;
    }

    return $query_vars;
}
add_filter('request', 'veliy_resolve_root_service');

// Старые ссылки услуг и страницы дополнительных услуг остаются рабочими.
function veliy_redirect_legacy_service_urls()
{
    global $wp;

    if (is_singular('services') && str_starts_with($wp->request, 'services/')) {
        wp_safe_redirect(get_permalink(), 301);
        exit;
    }

    if (is_404() && trim($wp->request, '/') === 'services') {
        $page = get_page_by_path('additional-services');
        if ($page && $page->post_status === 'publish') {
            wp_safe_redirect(get_permalink($page), 301);
            exit;
        }
    }
}
add_action('template_redirect', 'veliy_redirect_legacy_service_urls', 5);

// регистр порфолио 

function register_projects_cpt()
{
    $labels = [
        'name'               => 'Проекты',
        'singular_name'      => 'Проект',
        'menu_name'          => 'Проекты',
        'add_new'            => 'Добавить проект',
        'add_new_item'       => 'Добавить проект',
        'edit_item'          => 'Редактировать проект',
        'new_item'           => 'Новый проект',
        'view_item'          => 'Просмотреть проект',
        'search_items'       => 'Поиск проектов',
        'not_found'          => 'Проекты не найдены',
        'not_found_in_trash' => 'В корзине проектов нет',
    ];

    register_post_type('projects', [
        'labels' => $labels,
        'public' => true,
        'menu_icon' => 'dashicons-portfolio',
        'has_archive' => false,
        'rewrite' => [
            'slug' => 'portfolio',
            'with_front' => false,
        ],
        'supports' => [
            'title',
            'editor',
            'thumbnail',
            'excerpt'
        ],
        'show_in_rest' => true,
    ]);

    add_rewrite_rule(
        '^projects/([^/]+)/?$',
        'index.php?post_type=projects&name=$matches[1]',
        'top'
    );
}
add_action('init', 'register_projects_cpt');

function veliy_redirect_legacy_projects()
{
    global $wp;

    if (is_singular('projects') && $wp->matched_rule === '^projects/([^/]+)/?$') {
        wp_safe_redirect(get_permalink(), 301);
        exit;
    }
}
add_action('template_redirect', 'veliy_redirect_legacy_projects');

function veliy_redirect_legacy_blog_posts()
{
    if (!is_404()) {
        return;
    }

    global $wp;
    $slug = trim($wp->request, '/');

    if ($slug === '' || str_contains($slug, '/')) {
        return;
    }

    $post = get_page_by_path($slug, OBJECT, 'post');

    if ($post && $post->post_status === 'publish') {
        wp_safe_redirect(get_permalink($post), 301);
        exit;
    }
}
add_action('template_redirect', 'veliy_redirect_legacy_blog_posts');

function register_project_taxonomies()
{
    register_taxonomy('project_category', ['projects'], [
        'label'             => 'Типы сайтов',
        'hierarchical'      => true,
        'public'            => false,
        'publicly_queryable' => false,
        'show_ui'           => true,
        'show_in_nav_menus'  => false,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => false,
        'rewrite'           => false,
    ]);
}

add_action('init', 'register_project_taxonomies');


function veliy_render_projects($taxonomy = '', $term_id = 0)
{
    $args = [
        'post_type'      => 'projects',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    ];

    if ($taxonomy && $term_id) {
        $args['tax_query'] = [
            [
                'taxonomy' => $taxonomy,
                'field'    => 'term_id',
                'terms'    => $term_id,
            ],
        ];
    }

    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()):
        while ($query->have_posts()):
            $query->the_post();
?>
            <li class="portfolio__card">
                <a
                    class="portfolio__link"
                    href="<?php the_permalink(); ?>">

                    <?php
                    the_post_thumbnail('large', [
                        'class'   => 'portfolio__img',
                        'loading' => 'lazy',
                    ]);
                    ?>

                    <div class="portfolio__body">
                        <h2 class="portfolio__card-title">
                            <?php the_title(); ?>
                        </h2>

                        <p class="portfolio__card-text">
                            <?= get_the_excerpt(); ?>
                        </p>
                    </div>
                </a>
            </li>
        <?php
        endwhile;
    else:
        ?>
        <li>Проекты пока не добавлены.</li>
<?php
    endif;

    wp_reset_postdata();

    return ob_get_clean();
}


function veliy_ajax_projects()
{
    check_ajax_referer('veliy_projects_nonce', 'nonce');

    $term_id = absint($_POST['term'] ?? 0);

    $html = veliy_render_projects(
        'project_category',
        $term_id
    );

    wp_send_json_success([
        'html' => $html,
    ]);
}

add_action(
    'wp_ajax_veliy_projects_filter',
    'veliy_ajax_projects'
);

add_action(
    'wp_ajax_nopriv_veliy_projects_filter',
    'veliy_ajax_projects'
);


function veliy_projects_assets()
{
    if (!is_page_template('portfolio.php')) {
        return;
    }

    wp_enqueue_script(
        'veliy-projects',
        get_template_directory_uri() . '/assets/js/projects.js',
        [],
        filemtime(
            get_template_directory() . '/assets/js/projects.js'
        ),
        true
    );

    wp_localize_script('veliy-projects', 'VeliyProjects', [
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('veliy_projects_nonce'),
    ]);
}

add_action(
    'wp_enqueue_scripts',
    'veliy_projects_assets'
);
