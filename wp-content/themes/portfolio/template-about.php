<?php /* Template Name: Page "À propos" */
get_header();

?>
<section class="about">
    <?php if (have_posts()): while (have_posts()):
    the_post(); ?>
    <h2 class="about__title">
        <?= get_field('about-title'); ?>
    </h2>
    <article class="about__presentation">
        <h3 class="about__presentation">
            <?= get_field('presentation-title'); ?>

        </h3>
        <p class="about__title">
            <?= get_field('description'); ?>
        </p>
        <div class="about__container">
            <img src="<?= get_field('about-img'); ?>" alt="Photo de moi" class="about__container__img">
        </div>
    </article>
</section>
<section class="career">
    <h2 class="career title">
        Mon parcours
    </h2>
    <?php if (have_rows('career')) : ?>
        <?php while (have_rows('career')) : the_row(); ?>
            <section>
                <h3><?= get_sub_field('course-name') ?></h3>
                <p><?= get_sub_field('course-time') ?></p>
            </section>
        <?php endwhile; ?>
    <?php else : ?>
        <p>Aucune donnée trouvée.</p>
    <?php endif; ?>
        </section>
</section>
<div class="bgWayOfWorking" >
    <section>
        <h2>
        </h2>
            <?php if (have_rows('step-list')) : ?>
                <?php while (have_rows('step-list')) : the_row(); ?>
                    <section>
                        <img src="" alt="">
                        <h3><?= get_sub_field('step-title') ?></h3>
                        <p><?= get_sub_field('step-desc') ?></p>
                    </section>
                <?php endwhile; ?>
            <?php else : ?>
                <p>Aucune donnée trouvée.</p>
            <?php endif; ?>
    </section>
</div>
<section>
    <h2>
        <?= get_field('tools-title') ?>
    </h2>
    <ul>
        <?php if (have_rows('tools-list')): while (have_rows('tools-list')): the_row(); ?>
        <?php
            $img = get_sub_field('tool-item');
            if ($img) : ?>
        <li>
            <img src="<?= $img['url']; ?>" alt="<?= $img['alt']; ?>" width="5%">
        </li>
        <?php endif;?>
        <?php endwhile; endif; ?>
    </ul>
</section>
<?php endwhile;
endif; ?>
<?php
get_footer()
?>
