<?php /* Template Name: Page "À propos" */
get_header();

?>
<div class="bgAbout">
    <section class="about" data-animation="appear">
        <?php if (have_posts()): while (have_posts()):
        the_post(); ?>
        <h2 aria-level="2" class="about__title">
            <?= get_field('about-title'); ?>
        </h2>
        <article itemprop="description" class="about__presentation">
            <div class="about__presentation__content">
                <h3 aria-level="3" class="about__presentation__content__title">
                    <?= get_field('presentation-title'); ?>
                </h3>
                <?= get_field('description'); ?>
            </div>
            <div class="about__presentation__img" itemprop="image">
                <?php
                $about_img = get_field('about-img');;
                ?>
                <?= responsive_image($about_img, [
                    'lazy' => 'eager',
                    'classes' => ['resizeImg'],
                    'custom_sizes' => '(min-width: 817px) 550px ,100vw'
                ]); ?>
            </div>
        </article>
    </section>
</div>
    <section class="career">
        <h2 aria-level="2" class="career__title">
            Mon parcours
        </h2>
        <div class="career__container">
            <div class="career__container__img">
                <img src="/wp-content/themes/portfolio/resources/img/ball8.svg" alt="Boule 8 du billard">
            </div>
            <ul class="career__container__list" itemscope itemtype="https://schema.org/EducationalOccupationalCredential" itemprop="hasCredential">
                <?php if (have_rows('career')) : ?>
                    <?php while (have_rows('career')) : the_row(); ?>
                        <li class="career__container__list__items">
                            <time class="career__container__list__items__date">
                                <?= get_sub_field('course-time') ?>
                                <div class="career__container__list__items__date__billard">
                                    <img src="/wp-content/themes/portfolio/resources/img/cue.svg"
                                         alt="La canne du billard">
                                </div>
                            </time>
                            <h3 aria-level="3" class="career__container__list__items__title" itemprop="credentialCategory"><?= get_sub_field('course-name') ?></h3>
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
            <h2 aria-level="2" class="step__title">
                <?= get_field("wayOfWorking-title") ?>
            </h2>
            <div class="step__container">
                <?php if (have_rows('wayOfWorking-list')) : ?>
                    <?php while (have_rows('wayOfWorking-list')) : the_row(); ?>

                        <article class="step__container__article" itemscope itemtype="https://schema.org/HowToStep">
                            <img class="step__container__article__img" data-animation="appearLeftBall"
                                 src="<?= get_sub_field('wayOfWorking-ball') ?>"
                                 alt="<?= get_sub_field('ball-alt') ?>">
                            <h3 aria-level="3" class="step__container__article__title"
                                data-animation="appear"
                                itemprop="name"><?= get_sub_field('wayOfWorking-titleStep') ?></h3>
                            <p class="step__container__article__paragraph"
                               data-animation="appear"
                               itemprop="text"><?= get_sub_field('wayOfWorking-desc') ?></p>
                        </article>

                    <?php endwhile; ?>
                <?php else : ?>
                    <p>Aucune donnée trouvée.</p>
                <?php endif; ?>
            </div>
        </section>
    </div>
    <section class="tools">
        <h2 aria-level="2" class="tools__title">
            <?= get_field('tools-title') ?>
        </h2>
        <ul class="tools__list" itemprop="knowsAbout">
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
