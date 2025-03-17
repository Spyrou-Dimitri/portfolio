<?php /* Template Name: Page "Projets" */
get_header() ?>
<section>
    <h2>
        
    </h2>
    <label for="all">Tout</label>
    <input type="radio" name="projects" id="all" checked>
    <label for="web">Web</label>
    <input type="radio" name="projects" id="web">
    <label for="3D">3D</label>
    <input type="radio" name="projects" id="3D">
    <label for="design">Design</label>
    <input type="radio" name="projects" id="design">
    <label for="mobile">Mobile</label>
    <input type="radio" name="projects" id="mobile">
</section>
<section>
    <h2>
        Tous mes projets
    </h2>
    <?php
    $projects   = new WP_Query( [
        'post_type'     => 'projects',
        'order'         => 'DESC',

        'post_per_page' => 3,
    ] );
    if ($projects->have_posts()): while ($projects->have_posts()): $projects->the_post(); ?>
    <article>
        <?= get_the_post_thumbnail(size: 'medium')?>
        <h3> <?= get_the_title() ?></h3>
        <p><?= get_the_excerpt() ?></p>
    </article>
    <?php endwhile; endif; ?>
    <p>
        Bien d'autres à venir
    </p>
    <p>
        test test test test
    </p>

</section>

<?php get_footer() ?>
