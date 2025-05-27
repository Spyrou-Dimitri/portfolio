<?php get_header() ?>
<?php
if (have_posts()):while (have_posts()): the_post(); ?>
    <div class="bgProject">
        <section class="project" data-animation="appear" itemscope itemtype="https://schema.org/CreativeWork">
            <h2 aria-level="2" class="project__title" itemprop="name">
                <?= get_field('project-title') ?>
            </h2>
            <a href="#" title="Retour à la page de projets" class="project__comebackLink">Retour aux projets</a>
            <div class="project__containerLinks">
                <a href="#" title="Retourner à la page de projet" class="ctaPrimary" itemprop="url"> <span>Découvrir le site</span></a>
                <a href="#" title="Découvrir le site" class="ctaSecondary" itemprop="codeRepository"><span>Projet Github</span></a>
            </div>
        </section>
    </div>
    <section class="resume" data-animation="appear">
        <div class="resume__content">
            <div class="resume__content__desc">
                <h2 aria-level="2" class="resume__content__desc__title">
                    <?= get_field('desc-title') ?>
                </h2>
                <p class="resume__content__desc__paragraph" itemprop="description">
                    <?= get_field('desc-desc') ?>
                </p>
            </div>
            <div class="resume__content__tools">
                <h2 aria-level="2" class="resume__content__tools__title">
                    <?= get_field('tools-title') ?>
                </h2>
                <ul class="resume__content__tools__list">
                    <?php
                    if (have_rows('tools-list')): while (have_rows('tools-list')): the_row(); ?>
                        <li class="resume__content__tools__list__item">
                            <img src="<?= get_sub_field('tools-item') ?>" alt="<?= get_sub_field('tools-alt') ?>">
                        </li>
                    <?php endwhile; endif; ?>
                </ul>
            </div>
        </div>
        <div class="resume__img">
            <?php
            $thumbnail_id = get_post_thumbnail_id();
            $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true)
            ?>
            <?= get_the_post_thumbnail(null, 'medium', [
                'class' => 'resizeImg',
                'alt' => $alt_text,
                'itemprop' => 'image',
                'sizes' => '(min-width: 817px) 550px ,100vw',
            ]); ?>
        </div>
    </section>
    <div>
        <section class="guideLine" data-animation="appear">
            <div class="guideLine__content">
                <h2 aria-level="2" class="guideLine__content__title">
                    <?= get_field('directive-title') ?>
                </h2>
                <p class="guideLine__content__paragraph">
                    <?= get_field('directive-desc') ?>
                </p>
            </div>
            <div class="guideLine__img">
                <?php
                $guideLine_img = get_field('main-img');
                ?>
                <?= responsive_image($guideLine_img, [
                    'lazy' => 'eager',
                    'classes' => ['resizeImg'],
                    'custom_sizes' => '(min-width: 817px) 550px ,100vw'
                ]); ?>
            </div>
        </section>
        <?php
        if (have_rows("palette-list")): ?>
            <section class="palette" data-animation="appear">
                <h2 aria-level="2" class="palette__title">
                    <?= get_field('palette-title') ?>
                </h2>
                <ul class="palette__list">
                    <?php while (have_rows('palette-list')): the_row() ?>
                        <li style="background-color: <?= get_sub_field('palette-item')  ?>" data-clipboard="<?= get_sub_field('palette-item') ?>" class="palette__list__item" data-palette="<?= get_sub_field('palette-item') ?>">
                            <span >
                                <?= get_sub_field('palette-item') ?>
                            </span>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <p class="palette__paragraph">
                    La couleur vous plait ?
                    <span>Cliquez dessus pour l’obtenir !</span>
                </p>
            </section>
        <?php endif; ?>
    </div>
    <section class="projectStep">
        <h2 aria-level="2" class="projectStep__title">
            <?= get_field('step') ?>
        </h2>
        <div class="projectStep__container">
            <?php
            if (have_rows('step-list')): while (have_rows('step-list')): the_row(); ?>

                <article class="projectStep__container__article">
                    <?php $ball = get_sub_field('step-img'); ?>
                    <img data-animation="appearLeftBall" class="projectStep__container__article__img" src="<?= $ball['url'] ?>" alt="<?= $ball['alt']?>">
                    <h3 aria-level="3" data-animation="appear" class="projectStep__container__article__title">
                        <?= get_sub_field('step-title') ?>
                    </h3>
                    <p data-animation="appear" class="projectStep__container__article__paragraph">
                        <?= get_sub_field('step-desc') ?>
                    </p>
                </article>

            <?php endwhile; endif; ?>
        </div>
    </section>

<section class="gallery">
    <h2 aria-level="2" class="gallery__title">
        <?= get_field('gallery') ?>
    </h2>
    <div class="gallery__container">

        <?php
        if (have_rows('gallery-list')): while (have_rows('gallery-list')): the_row(); ?>
        <?php
            $gallery = get_sub_field('gallery_item');

            ?>
        <a class="gallery__container__item" href="<?= $gallery['url'] ?>" data-fancybox="gallery">

            <?= responsive_image($gallery, [
                'lazy' => 'eager',
                'classes' => ['resizeImg'],
                'custom_sizes' => '(min-width: 817px) 400px ,100vw'
            ]); ?>
        </a>


    <?php endwhile; endif; ?>
    </div>
</section>
<?php endwhile; endif; ?>


<?php get_footer() ?>