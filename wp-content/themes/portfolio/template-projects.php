<?php /* Template Name: Template Projects */ ?>
<?php get_header(); ?>

<?php
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$taxonomy_filter = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : '';

$args = [
    'post_type' => 'projects',
    'paged' => $paged,
];

if ($taxonomy_filter !== '') {
    $args['tax_query'] = [
        [
            'taxonomy' => 'project_types',
            'field' => 'slug',
            'terms' => $taxonomy_filter,
        ]
    ];
}

$query = new WP_Query($args);

// Récupérer les termes de la taxonomie
$terms = get_terms([
    'taxonomy' => 'project_types',
    'hide_empty' => false,
]);

$current_filter = $taxonomy_filter;
?>
<div class="bg">
    <section class="projectsHome">
        <h2 aria-level="2" class="projectsHome__title">
            <?= get_field('projects-title') ?>
        </h2>
        <div class="projectsHome__container">
            <a href="<?= get_post_type_archive_link('projects'); ?>"
               class="<?= ($current_filter === '') ? 'is_active ctaTagNoHoverable' : 'ctaTag '; ?>">
                <span>
                <?= __('Tout'); ?>

                </span>
            </a>

            <?php foreach ($terms as $term): ?>
                <?php $is_active = ($current_filter === $term->slug) ? 'is_active ctaTagNoHoverable' : 'ctaTag'; ?>
                <a href="<?= get_post_type_archive_link('projects') . '?filter=' . $term->slug; ?>"
                   class="<?= $is_active; ?>">
                    <span>
                    <?= esc_html($term->name); ?>

                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </section>

</div>


<section class="projectsList">
    <h2 aria-level="2" class="projectsList__title"><?= __('Tous mes projets'); ?></h2>

    <div class="projectsList__container">

        <?php if ($query->have_posts()): while ($query->have_posts()): $query->the_post();

            ?>
            <article class="projectCard" itemscope itemtype="https://schema.org/CreativeWork"
                     data-animation="appearLeft">
                <a itemprop="url" class="projectCard__link" href="<?= get_the_permalink() ?>"><span
                            class="sro">Consulter <?= get_the_title() ?></span></a>
                <div>
                    <?php
                    $thumbnail_id = get_post_thumbnail_id();
                    $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true)
                    ?>
                    <?= get_the_post_thumbnail(null, 'medium', [
                        'class' => 'resizeImg',
                        'alt' => $alt_text,
                        'itemprop' => 'image',
                        'sizes' => '(min-width: 817px) 350px ,100vw',
                    ]); ?>
                    <h3 aria-level="3" itemprop="name" class="projectCard__title"><?= get_the_title() ?></h3>
                </div>
            </article>
        <?php endwhile; else: ?>
            <p><?= __('Aucun projet trouvé.'); ?></p>
        <?php endif; ?>
    </div>

</section>

<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>
