<?php /* Template Name: Page "Accueil" */
get_header();
?>
<section>
    <h2>
        <span>
            Portfolio
        </span>
        Spyrou Dimitri
        <span>
            Web développeur
        </span>
    </h2>
    <p>
        "Coder, c’est comme jouer au billard : précision, stratégie et un bon rebond pour atteindre la cible !"
    </p>
    <a href="" title="">Me découvrir</a>
    <a href="" title="">Mes projets</a>
    <p>
        Scroll Down
    </p>
</section>
<div>
    <section>
        <h2>
            Projets à la une
        </h2>
        <?php
        $projects   = new WP_Query( [
            'post_type'     => 'projects',
            'order'         => 'DESC',
            
            'post_per_page' => 3,
        ] );
        if ($projects->have_posts() ): while ( $projects->have_posts() ):$projects->the_post(); ?>
            <article>
                <a href="">
                </a>
                <h3>
                    <?= get_the_title() ?>
                </h3>
                <?= get_the_post_thumbnail( size: 'medium'); ?>

            </article>
        <?php
//on ferme 'la boucle' (The Loop)
        endwhile;
        else : ?>
            <p>Je n'ai pas de projet récents à montrer pour le moment</p>
        <?php endif; ?>



    </section>
</div>

<?= get_footer(); ?>
