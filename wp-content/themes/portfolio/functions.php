<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


// Désactiver l'éditeur de texte Gutenberg de Wordpress :
add_filter('use_block_editor_for_post', '__return_false');
add_filter( 'use_widgets_block_editor', '__return_false' );


//Enregistrer mes menus de navigation
register_nav_menu('header_menu', 'Navigation principale, le header');
register_nav_menu('usefull_links_menu', 'Menu pour accéder à des liens utiles');
register_nav_menu('social_media_menu', 'Menu pour accéder à mes réseaux sociaux');

//Charger un fichier : chemin + nom du fichier
function pf_asset ($file) : string
{
    return get_template_directory_uri().'/assets/'.$file;
}

function pf_get_navigation_links(string $location): array
{
    // Pour $location, retrouver le menu.
    $locations = get_nav_menu_locations();
    $menuId = $locations[$location] ?? null;

    // Au cas où il n'y a pas de menu assignés à $location, renvoyer un tableau de liens vide.
    if (is_null($menuId)) {
        return [];
    }

    // Pour ce menu, récupérer les liens
    $items = wp_get_nav_menu_items($menuId);

    // Formater les liens en objets pour ne garder que "URL" et "label" comme propriétés
    foreach ($items as $key => $item) {
        $items[$key] = new stdClass();
        $items[$key]->url = $item->url;
        $items[$key]->label = $item->title;
    }

    // Retourner le tableau de liens formatés
    return $items;
}
//Autoriser l'import des svg pour ACF
function allow_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');

add_theme_support('post-thumbnails', ['projects']);

//Création du post customisé pour mes projets
register_post_type('projects', [
    'label' => 'Projets',
    'description' => 'Les projets que j ai réalisé',
    'menu_position' => 5,
    'menu_icon' => 'dashicons-airplane',
    'public' => true,
    'rewrite' => [
        'slug' => 'projets',
    ],
    'supports' => ['title','excerpt','editor','thumbnail'],
    'taxonomies' => ['project_types'],
]);
register_taxonomy('project_types', ['projects'], [
    'labels' => [
        'name' => 'Les types de projets',
        'singular' => 'Type de voyage'
    ],
    'description' => 'Types de projets',
    'public' => true,
    'hierarchical' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'show_tagcloud' => false,
    'rewrite' => ['slug' => 'type-de-voyage'],

],
);


function create_site_options_page() {
    if (function_exists('acf_add_options_page')) {
        // Page principale
        acf_add_options_page([
            'page_title'  => 'Site Options',
            'menu_title'  => 'Site Settings',
            'menu_slug'   => 'site-options',
            'capability'  => 'edit_posts',
            'redirect'    => false
        ]);

        // Sous-pages
        acf_add_options_sub_page([
            'page_title'  => 'Company Settings',
            'menu_title'  => 'Company',
            'parent_slug' => 'site-options',
        ]);

        acf_add_options_sub_page([
            'page_title'  => 'SEO Settings',
            'menu_title'  => 'SEO',
            'parent_slug' => 'site-options',
        ]);
    }
}

add_action('acf/init', 'create_site_options_page');

function charger_jquery_et_fancybox() {
    // Forcer le chargement de jQuery
    wp_enqueue_script('jquery');

    // Charger Fancybox CSS
    wp_enqueue_style(
        'fancybox-css',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css',
        array(),
        null
    );

    // Charger Fancybox JS
    wp_enqueue_script(
        'fancybox-js',
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js',
        array('jquery'),
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'charger_jquery_et_fancybox');

function responsive_image($image, $settings): bool|string
{
    if (empty($image)) {
        return '';
    }

    $image_id = '';

    if (is_numeric($image)) {
        $image_id = $image;
    } elseif (is_array($image) && isset($image['ID'])) {
        $image_id = $image['ID'];
    } else {
        return ''; // Aucun ID valide
    }

    $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
    $image_post = get_post($image_id);
    $title = $image_post->post_title ?? '';
    $name = $image_post->post_name ?? '';

    $src = wp_get_attachment_image_url($image_id, 'full');
    $srcset = wp_get_attachment_image_srcset($image_id, 'full');

    // Priorité à un "sizes" personnalisé
    $sizes = $settings['custom_sizes'] ?? wp_get_attachment_image_sizes($image_id, 'full');

    // Ex : (min-width: 920px) 620px, 100vw
    if (empty($settings['custom_sizes'])) {
        // Valeur par défaut : image prend toute la largeur en dessous de 920px, et 620px au-delà
        $sizes = '(min-width: 920px) 620px, 100vw';
    }

    $lazy = $settings['lazy'] ?? 'eager';

    $classes = '';
    if (!empty($settings['classes'])) {
        $classes = is_array($settings['classes']) ? implode(' ', $settings['classes']) : $settings['classes'];
    }

    ob_start();
    ?>
    <picture>
        <img
            src="<?= esc_url($src) ?>"
            alt="<?= esc_attr($alt) ?>"
            loading="<?= esc_attr($lazy) ?>"
            srcset="<?= esc_attr($srcset) ?>"
            sizes="<?= esc_attr($sizes) ?>"
            class="<?= esc_attr($classes) ?>">
    </picture>
    <?php
    return ob_get_clean();
}

function get_actual_title_page()
{
    $titlePage = "";

    if (is_home() || is_front_page()) {
        return $titlePage = "Accueil - " . get_bloginfo('name');
    } elseif (is_singular()) {
        return $titlePage = the_title("", " - ") . get_bloginfo("name");
    }
}


//Formulaire

register_post_type('contact_message', [
    'label' => 'Messages de contact',
    'description' => 'Les envois de formulaire via la page de contact',
    'menu_position' => 10,
    'menu_icon' => 'dashicons-email',
    'public' => false,
    'show_ui' => true,
    'has_archive' => false,
    'supports' => ['title','editor'],
]);

//Ajouter les action " POST "

add_action('admin_post_dw_submit_contact_form', 'dw_handle_contact_form');
add_action('admin_post_nopriv_dw_submit_contact_form', 'dw_handle_contact_form');

require_once(__DIR__.'/forms/ContactForm.php');

function dw_handle_contact_form()
{
    $form = (new \Portfolio_Theme\Forms\ContactForm())
        ->rule('firstname', 'required')
        ->rule('lastname', 'required')
        ->rule('email', 'required')
        ->rule('email', 'email')
        ->rule('message', 'required')
        ->rule('message', 'no_test')
        ->rule('object', 'required')
        ->rule('object', 'no_test')

        ->sanitize('firstname', 'sanitize_text_field')
        ->sanitize('lastname', 'sanitize_text_field')
        ->sanitize('email', 'sanitize_text_field')
        ->sanitize('message', 'sanitize_textarea_field')
        ->sanitize('phone', 'sanitize_text_field')
        ->sanitize('object', 'sanitize_text_field');

    return $form->handle($_POST);
}



