<?php get_header() ?>
<?php
if (have_posts()):while (have_posts()): the_post(); ?>
    <section>
        <h2>
            <?= get_field('title') ?>
        </h2>
        <a href="#" title="Retourner à la page de projet">Retour aux projets</a>
        <a href="#" title="Découvrir le site"> Projet Github</a>
    </section>

    <section>
        <div>
            <h2>
                <?= get_field('desc-title') ?>

            </h2>
            <p>
                <?= get_field('desc-desc') ?>
            </p>
        </div>
        <?= get_the_post_thumbnail(size: 'medium') ?>
    </section>
<div>
    <section>
        <div>
            <h2>
                <?= get_field('directive-title') ?>
            </h2>
            <p>
                <?= get_field('directive-desc') ?>
            </p>
        </div>
        <?= get_the_post_thumbnail(size: 'medium') ?>
    </section>
    <section>
        <h2>
            <?= get_field('tools-title') ?>
        </h2>
        <?php
        if (have_rows('tools-list')): while (have_rows('tools-list')): the_row(); ?>
        <li>
            <img src="<?= get_sub_field('tools-item') ?>" alt="<?= get_sub_field('tools-alt')?>">
        </li>
        <?php endwhile; endif; ?>
    </section>
    <?php
    if (have_rows("palette-list")): ?>
    <section>
        <h2>
            <?= get_field('palette-title') ?>
        </h2>
        <ul>
        <?php while (have_rows('palette-list')): the_row() ?>
            <li>
                <span>
                    <?= get_sub_field('palette-item') ?>
                </span>
            </li>
        <?php endwhile; ?>
        </ul>
    </section>
     <?php endif; ?>
</div>
<section>
    <h2>
        <?= get_field('step') ?>
    </h2>
    <ol>
        <?php
        if (have_rows('step-list')): while (have_rows('step-list')): the_row(); ?>
        <li>
            <article>
                <h3>
                    <?= get_sub_field('step-title') ?>
                </h3>
                <p>
                    <?= get_sub_field('step-desc') ?>
                </p>
            </article>
        </li>
        <?php endwhile; endif; ?>
    </ol>
</section>
<?php endwhile; endif; ?>



    <?php get_footer() ?>