<?php /* Template Name: Page "Accueil" */
get_header();
?>
<section class="hero">
    <div class="container__topBillards">
        <div class="container__topBillards__ball">
            <img src="wp-content/themes/portfolio/resources/img/ball8.svg" alt="La bille noir du billard" width="100"
                 height="100">
        </div>
        <div class="container__topBillards__cue">
            <img src="wp-content/themes/portfolio/resources/img/cue.svg" alt="La canne du billard">
        </div>
    </div>
    <h2 class="hero__title">
        <span class="hero__title__before">
            Portfolio
        </span>
        Spyrou Dimitri
        <span class="hero__title__after">
            Web développeur
        </span>
    </h2>
    <p class="hero__quote">
        "Coder, c’est comme jouer au billard : précision, stratégie et un bon rebond pour atteindre la cible !"
    </p>
    <div class="hero__container__cta">
        <a class="hero__container__cta__link ctaAbout" href="<?= get_the_permalink('about') ?>" title="">Me
            découvrir</a>
        <a class="hero__container__cta__link ctaProjects" href="" title="">Mes projets</a>
    </div>
    <div class="container__botBillards">
        <div class="container__botBillards__cue">
            <img src="wp-content/themes/portfolio/resources/img/cue.svg" alt="La canne du billard">
        </div>
        <div class="container__botBillards__ball">
            <img src="wp-content/themes/portfolio/resources/img/ball8.svg" alt="La bille noir du billard" width="100"
                 height="100">
        </div>

    </div>
    <p class="hero__scroll">
        Scroll Down
    </p>
</section>
<section class="lastProjects">
    <h2 class="lastProjects__title">
        <b>Projets</b><span>à la une</span>
    </h2>
    <div class="lastProjects__container">
        <?php
        $projects = new WP_Query([
            'post_type' => 'projects',
            'order' => 'DESC',
            'orderby' => 'date',
            'posts_per_page' => 3,
        ]);
        if ($projects->have_posts()): while ($projects->have_posts()):$projects->the_post(); ?>
            <article class="lastProjects__container__article">
                <a href="<?= get_the_permalink() ?>" class="lastProjects__container__article__link">
                    <span class="sro">Découvrir le projet <?= get_the_title() ?></span>
                </a>
                <?= get_the_post_thumbnail(size: 'medium'); ?>
                <h3 class="lastProjects__container__article__title">
                    <?= get_the_title() ?>
                </h3>
                <p class="lastProjects__container__article__paragraph">
                    <?= get_the_excerpt() ?>
                </p>
                <a href="<?= get_the_permalink() ?>" title="Découvrir le projet <?= get_the_title()?>" class="lastProjects__container__article__cta">Voir le projet</a>
            </article>
        <?php
//on ferme 'la boucle' (The Loop)
        endwhile;
        else : ?>
            <p>Je n'ai pas de projet récents à montrer pour le moment</p>
        <?php endif; ?>
    </div>



</section>


<?= get_footer(); ?>
