<?php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="<?= pf_asset('css/main.css') ?>">
    <title><?= get_bloginfo('title') ?></title>
</head>
<body>
<header>
    <h1 class="sro">
        <?= get_the_title('58') ?>
    </h1>
    <div class="header__containner">
        <nav class="nav">
            <h2 class="nav__title sro">
                <?= wp_get_nav_menu_name("header_menu") ?>
            </h2>
            <a class="nav__link" href="#" title="Vers l'accueil">Dimitri S.</a>
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



