<?php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Playfair:ital,opsz,wght@0,5..1200,300..900;1,5..1200,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= pf_asset('css/main.css') ?>">
    <title><?= get_bloginfo('title') ?></title>
</head>
<body>
<header>
    <h1 class="sro">
        <?= get_actual_title_page() ?>
    </h1>
    <div class="header__containner">
        <nav class="nav">
            <h2 class="nav__title sro">
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



