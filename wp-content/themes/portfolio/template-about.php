<?php /* Template Name: Page "À propos" */
get_header();

?>
<div class="bgAbout">
    <section class="about">
        <?php if (have_posts()): while (have_posts()):
        the_post(); ?>
        <h2 class="about__title">
            <?= get_field('about-title'); ?>
        </h2>
        <article class="about__presentation">
            <div class="about__presentation__content">
                <h3 class="about__presentation__content__title">
                    <?= get_field('presentation-title'); ?>
                </h3>
                <?= get_field('description'); ?>
            </div>
            <div class="about__presentation__img">
                <img src="<?= get_field('about-img'); ?>" alt="Photo de moi">
            </div>
        </article>
    </section>
</div>
    <section class="career">
        <h2 class="career__title">
            Mon parcours
        </h2>
        <div class="career__container">
            <div class="career__container__img">
                <img src="/wp-content/themes/portfolio/resources/img/ball8.svg" alt="Boule 8 du billard">
            </div>
            <ul class="career__container__list">
                <?php if (have_rows('career')) : ?>
                    <?php while (have_rows('career')) : the_row(); ?>
                        <li class="career__container__list__items">
                            <time class="career__container__list__items__date"><?= get_sub_field('course-time') ?></time>
                            <h3 class="career__container__list__items__title"><?= get_sub_field('course-name') ?></h3>
                        </li>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>Aucune donnée trouvée.</p>
                <?php endif; ?>
            </ul>
        </div>

    </section>
    <div class="bgWayOfWorking">
        <section class="step">
            <h2 class="step__title">
                <?= get_field("wayOfWorking-title") ?>
            </h2>
            <ul class="step__list">
                <?php if (have_rows('wayOfWorking-list')) : ?>
                    <?php while (have_rows('wayOfWorking-list')) : the_row(); ?>

                        <li class="step__list__items">
                            <img class="step__list__items__img" src="<?= get_sub_field('wayOfWorking-ball') ?>"
                                 alt="<?= get_sub_field('ball-alt') ?>">
                            <h3 class="step__list__items__title"><?= get_sub_field('wayOfWorking-titleStep') ?></h3>
                            <p class="step__list__items__paragraph"><?= get_sub_field('wayOfWorking-desc') ?></p>
                        </li>

                    <?php endwhile; ?>
                <?php else : ?>
                    <p>Aucune donnée trouvée.</p>
                <?php endif; ?>
            </ul>
        </section>
    </div>
    <section class="tools">
        <h2 class="tools__title">
            <?= get_field('tools-title') ?>
        </h2>
        <ul class="tools__list">
            <?php if (have_rows('tools-list')): while (have_rows('tools-list')): the_row(); ?>
                <?php
                $img = get_sub_field('tool-item');
                if ($img) : ?>
                    <li class="tools__list__items">
                        <img class="tools__list__items__img" src="<?= $img['url']; ?>" alt="<?= $img['alt']; ?>">
                    </li>
                <?php endif; ?>
            <?php endwhile; endif; ?>
        </ul>
    </section>
<?php endwhile;
endif; ?>
<?php
get_footer()
?>
