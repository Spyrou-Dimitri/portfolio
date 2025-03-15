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

function dw_get_navigation_links(string $location): array
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
]);

