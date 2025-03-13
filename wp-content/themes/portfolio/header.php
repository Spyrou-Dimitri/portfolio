<?php
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="<?= pf_asset('css/main.css')?>">
    <title><?= get_bloginfo('title') ?></title>
</head>
<body>
<header>
    <h1>
        <?= get_the_title('58') ?>
    </h1>
    <nav class="nav">
        <h2 class="nav__title hidden">
            <?= wp_get_nav_menu_name("header_menu") ?>
        </h2>
        <a class="nav__link" href="#" title="Vers l'accueil">Dimitri S.</a>
        <ul class="nav__container">
            <?php foreach (dw_get_navigation_links('header_menu') as $link): ?>
                <li class="nav__container__items">
                    <a href="<?= $link->url ?>" class="nav__container__items__link" title="Vers la page <?= $link->label?>"><?= $link->label?></a>
                </li>
            <?php endforeach; ?>

        </ul>
        <label for="burger">Menu dépliant</label>
        <div>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <input type="checkbox" name="burger" id="burger">
    </nav>
</header>
<main>



