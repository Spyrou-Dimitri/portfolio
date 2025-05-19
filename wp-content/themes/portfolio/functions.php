<?php
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



