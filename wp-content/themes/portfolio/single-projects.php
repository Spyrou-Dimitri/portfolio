<?php get_header() ?>
<?php
if (have_posts()):while (have_posts()):
the_post(); ?>
<div class="bgProject">
    <section class="project" data-animation="appear" itemscope itemtype="https://schema.org/CreativeWork">
        <h2 aria-level="2" class="project__title" itemprop="name">
            <?= get_field('project-title') ?>
        </h2>
        <a href="<?= get_post_type_archive_link('projects') ?>" title="Retour à la page de projets"
           class="project__comebackLink">Retour aux projets</a>
        <?php
        $buttonUrl = get_field('website-url');
        $buttonGithub = get_field('github_url');

        if ($buttonUrl || $buttonGithub): ?>
            <div class="project__containerLinks">
                <?php if ($buttonUrl): ?>
                    <a href="<?= esc_url($buttonUrl) ?>" title="Retourner à la page de projet" class="ctaPrimary" itemprop="url">
                        <span>Découvrir le site</span>
                    </a>
                <?php endif; ?>

                <?php if ($buttonGithub): ?>
                    <a href="<?= esc_url($buttonGithub) ?>" title="Découvrir le site" class="ctaSecondary" itemprop="codeRepository">
                        <span>Projet Github</span>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
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
                    <li style="background-color: <?= get_sub_field('palette-item') ?>"
                        data-clipboard="<?= get_sub_field('palette-item') ?>" class="palette__list__item"
                        data-palette="<?= get_sub_field('palette-item') ?>">
                            <span>
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
                <img data-animation="appearLeftBall" class="projectStep__container__article__img"
                     src="<?= $ball['url'] ?>" alt="<?= $ball['alt'] ?>">
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
                $images = get_field( 'gallery-list' );
                if ( $images ): ?>
                    <?php foreach ( $images as $image ): ?>
                        <a href="<?= esc_url( $image['url'] ); ?>" data-fancybox="gallery"
                           class="single-actuality-gallery-link">
                            <figure class="single-actuality-gallery-fig">
                                <?= responsive_image($image, [
                                    'lazy' => 'eager',
                                    'classes' => ['resizeImg'],
                                    'custom_sizes' => '(min-width: 817px) 400px ,100vw'
                                ]); ?>
                            </figure>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
        </div>
        <?php
        $buttonFigma = get_field('figma_url');

        if ($buttonFigma): ?>
        <a class="maquette_url" href="<?= $buttonFigma ?>" title="Voir la maquette de ce projet" target="_blank"><span>Maquette</span></a>
        <?php endif;?>
    </section>

<?php endwhile;?>
<?php endif; ?>


<?php get_footer() ?>



