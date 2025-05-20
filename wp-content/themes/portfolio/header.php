<?php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Spyrou Dimitri">
    <meta name="keywords" content="Spyrou Dimitri, front-end, back-end, full-stack, Verviers, développeur web, portfolio, 3D">
    <link rel="stylesheet" href="<?= pf_asset('css/main.css') ?>">

    <!-- Profil !-->
    <meta property="profile:first_name" content="Dimitri">
    <meta property="profile:last_name" content="Spyrou">

    <!-- Open graph !-->

    <meta property="og:locale" content="fr_FR">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= get_actual_title_page() ?>">
    <meta property="og:description" content="<?= get_bloginfo('description') ?>">
    <meta property="og:url" content="<?= home_url($_SERVER['REQUEST_URI']) ?>">
    <meta property="og:site_name" content="<?= get_bloginfo('name') ?>">


    <title><?= get_bloginfo('title') ?></title>
</head>
<body itemscope itemtype="https://schema.org/Person">
<header role="banner">
    <h1 class="sro" aria-level="1">
        <?= get_actual_title_page() ?>
    </h1>
    <div class="header__containner">
        <nav class="nav">
            <h2 aria-level="2" class="nav__title sro">
                <?= wp_get_nav_menu_name("header_menu") ?>
            </h2>
            <a class="nav__link" href="<?= home_url() ?>" title="Vers l'accueil">Dim</a>
            <input type="checkbox" name="burger" id="burger__button">
            <label for="burger__button" class="sro">Menu dépliant</label>
            <div class="burger__wrapper">
                <span class="burger__wrapper__lines up"></span>
                <span class="burger__wrapper__lines middle"></span>
                <span class="burger__wrapper__lines down"></span>
            </div>
            <ul class="nav__container">
                <?php foreach (pf_get_navigation_links('header_menu') as $link): ?>
                    <li class="nav__container__items">
                        <a href="<?= $link->url ?>" class="nav__container__items__link"
                           title="Vers la page <?= $link->label ?>"><?= $link->label ?></a>
                    </li>
                <?php endforeach; ?>

            </ul>

        </nav>
    </div>

</header>
<main>



