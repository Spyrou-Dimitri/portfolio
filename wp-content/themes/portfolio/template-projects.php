<?php /* Template Name: Page "Projets"Home */
get_header() ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <div class="bg">
        <section class="projectsHome">
            <h2 class="projectsHome__title">
                <?= get_field('projects-title') ?>
            </h2>
            <div class="projectsHome__container">
                <a href="#" title="Afficher tous mes projets" class="projectsHome__container__link">Tout</a>
                <a href="#" title="Afficher seulement mes projets Web" class="projectsHome__container__link">Web</a>
                <a href="#" title="Afficher seulement mes projets 3D" class="projectsHome__container__link">3D</a>
                <a href="#" title="Afficher seulement mes design" class="projectsHome__container__link">Design</a>
                <a href="#" title="Afficher seulement mes applications mobiles" class="projectsHome__container__link">Mobile</a>
            </div>
        </section>
    </div>

    <section class="projectsList">
        <h2 class="projectsList__title">
            Tous mes projets
        </h2>
        <div class="projectsList__container">
            <?php
            $projects = new WP_Query([
                'post_type' => 'projects',
                'order' => 'DESC',

                'post_per_page' => 3,
            ]);
            if ($projects->have_posts()): while ($projects->have_posts()): $projects->the_post(); ?>
                <article class="projectsList__container__items">
                    <?= get_the_post_thumbnail(attr: ['class' => 'resizeImg']) ?>
                    <h3 class="projectsList__container__items__title"> <?= get_the_title() ?></h3>
                    <p class="projectsList__container__items__paragraph"><?= get_the_excerpt() ?></p>
                    <a class="projectsList__container__items__link" href="<?= get_the_permalink() ?>" title="Voir le projet <?= get_the_title() ?>">Voir le projet</a>
                </article>
            <?php endwhile; endif; ?>
        </div>
        <p class="projectsList__other">
            Bien d'autres à venir
        </p>
    </section>
<?php endwhile; endif; ?>
<section>


    <?php get_footer() ?>
