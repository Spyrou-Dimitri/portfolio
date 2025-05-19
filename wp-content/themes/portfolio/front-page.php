<?php /* Template Name: Page "Accueil" */
get_header();
?>
<section class="hero">
    <div class="container__topBillards">
        <div class="container__topBillards__ball">
            <img src="/wp-content/themes/portfolio/resources/img/ball8.svg" alt="La bille noir du billard" width="100"
                 height="100">
        </div>
        <div class="container__topBillards__cue">
            <img src="/wp-content/themes/portfolio/resources/img/cue.svg" alt="La canne du billard">
        </div>
    </div>
    <div class="hero__container" data-animation="appear">
        <h2 class="hero__title">
        <span class="hero__title__before">
            Portfolio
        </span>
            Spyrou Dimitri
            <span class="hero__title__after">
            Web développeur
        </span>
        </h2>
        <p class="hero__quote" style="white-space: normal">
            "Coder, c’est comme jouer au billard : précision, stratégie et un bon rebond pour atteindre la cible&nbsp;!"
        </p>
        <div class="hero__container__cta">
            <a class="ctaPrimary" href="<?= get_the_permalink('about') ?>" title=""><span>Me
            découvrir</span></a>
            <a class="ctaSecondary" href="" title=""><span>
                Mes projets
            </span></a>
        </div>
    </div>
    <div class="container__botBillards">
        <div class="container__botBillards__cue" id="test">
            <img src="/wp-content/themes/portfolio/resources/img/cue.svg" alt="La canne du billard">
        </div>
        <div class="container__botBillards__ball" id="test2">
            <img src="/wp-content/themes/portfolio/resources/img/ball8.svg" alt="La bille noir du billard" width="100"
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
            <article class="projectCard" data-animation="appearLeft">
                <a class="projectCard__link" href="<?= get_the_permalink() ?>"><span class="sro">Consulter <?= get_the_title() ?></span></a>
                <div>
                    <?= get_the_post_thumbnail(attr: ['class' => 'resizeImg']) ?>
                    <h3 class="projectCard__title">
                        <?= get_the_title() ?>
                    </h3>
                </div>



            </article>
        <?php
//on ferme 'la boucle' (The Loop)
        endwhile;
        else : ?>
            <p>Il n'y a pas de maison à afficher</p>
        <?php endif; ?>
    </div>



</section>


<?= get_footer(); ?>
