<?php get_header() ?>
<?php
if (have_posts()):while (have_posts()): the_post(); ?>
    <div class="bgProject">
        <section class="project">
            <h2 class="project__title">
                <?= get_field('project-title') ?>
            </h2>
            <a href="#" title="Retour à la page de projets" class="project__comebackLink">Retour aux projets</a>
            <div class="project__containerLinks">
                <a href="#" title="Retourner à la page de projet" class="project__link siteButton"> <span>Découvrir le site</span></a>
                <a href="#" title="Découvrir le site" class="project__link githubButton"><span>Projet Github</span></a>
            </div>
        </section>
    </div>
    <section class="resume">
        <div class="resume__content">
            <div class="resume__content__desc">
                <h2 class="resume__content__desc__title">
                    <?= get_field('desc-title') ?>
                </h2>
                <p class="resume__content__desc__paragraph">
                    <?= get_field('desc-desc') ?>
                </p>
            </div>
            <div class="resume__content__tools">
                <h2 class="resume__content__tools__title">
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
            <img class="resizeImg" src="<?= get_field('main-img') ?>" alt="<?= get_field('main-alt') ?>">
        </div>
    </section>
    <div>
        <section class="guideLine">
            <div class="guideLine__content">
                <h2 class="guideLine__content__title">
                    <?= get_field('directive-title') ?>
                </h2>
                <p class="guideLine__content__paragraph">
                    <?= get_field('directive-desc') ?>
                </p>
            </div>
            <div class="guideLine__img">
                <img class="resizeImg" src="<?= get_field('main-img') ?>" alt="main-alt">
            </div>

        </section>
        <?php
        if (have_rows("palette-list")): ?>
            <section class="palette">
                <h2 class="palette__title">
                    <?= get_field('palette-title') ?>
                </h2>
                <ul class="palette__list">
                    <?php while (have_rows('palette-list')): the_row() ?>
                        <li class="palette__list__item" data-palette="<?= get_sub_field('palette-item') ?>">
                            <svg fill="<?= get_sub_field('palette-item') ?>"
                                 id="<?= get_sub_field('palette-item') ?>"
                                 data-name="<?= get_sub_field('palette-item') ?>" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 356.98 357.05">
                                <defs>

                                    <style>

                                        .cls-33 {
                                            fill: #fff;

                                        }
                                    </style>
                                </defs>
                                <g id="<?= get_sub_field('palette-item') ?>"
                                   data-name="<?= get_sub_field('palette-item') ?>">
                                    <g class="cls-17">
                                        <g class="cls-17">
                                            <g class="cls-28">
                                                <g class="cls-17">
                                                    <path d="M240.46,12.95c-11.28-3.91-26.73-9.26-51.14-10.84-20.98-1.35-39.16,1.57-50.72,4.26-24.7,5.75-41.15,14.94-42.95,15.97-11.86,6.8-15.86,9.09-24.73,15.83-12.24,9.31-21.3,19.15-21.39,19.24-7.36,8.21-21.07,23.5-31.52,46.02-3.67,7.92-7.87,18.83-10.25,27.23s-4.37,20.2-5.65,28.96c-1.2,8.21-1.27,19.37-.84,27.66.45,8.71,2.19,20.26,3.75,28.85.37,2.02,3.91,20.4,15.09,42.55,22.38,44.38,57.98,66.63,64.88,70.64,11.54,6.7,25.89,15.03,49.21,21.06,23.24,6.01,43.31,5.97,53.21,5.42,53.41-3,86.96-27.57,97.98-35.64,19.41-14.22,32.33-31.53,37.85-38.93,9.34-12.52,18.43-31.72,21.63-40.76,6.47-18.3,7.3-23.93,10.04-42.57,1.32-8.99.85-21.2.67-30.28-.3-15.25-6.63-42.32-13.28-56.8-3.54-7.72-8.22-18.13-13-25.15-2.47-3.63-5.49-8.67-8.24-12.09-5.27-6.55-12.38-15.28-18.44-21.1-7.61-7.31-15.27-14.23-31.91-24.8-11.13-7.07-24.06-12.23-30.27-14.71-4.79-1.79-9.71-3.33-14.74-4.6s-10.24-2.3-15.52-3.03-10.72-1.19-16.22-1.35-11.15-.02-16.85.43c5.7-.45,11.32-.59,16.85-.43s10.92.61,16.22,1.35,10.46,1.75,15.52,3.03,9.96,2.81,14.74,4.6"/>
                                                </g>
                                            </g>
                                        </g>
                                        <g class="cls-17">
                                            <g class="cls-27">
                                                <g>
                                                    <path class="cls-33"
                                                          d="M106.83,213.78c-10.96,12.57-7.88,46.32,11.59,44.71,8.55-.71,10.22-9.6,8.16-17.56-2.21-8.51-6.98-13.59-19.75-27.15M116.76,164.57c-6.7-.39-19.14,11.79,2.07,35.53.52.58,1.22,1.34,1.75,1.91,6.92-10.18,9.08-36.35-3.82-37.44M115.32,260.59c-28.58-3.19-37.5-29.34-20.79-42.89,4.07-3.3,8.58-5.11,10.51-5.89-27.65-30.69-8.46-50.84,12.06-49.65,23.75,1.37,30.07,22.57,16.1,34.85-4.03,3.54-8.68,5.91-10.67,6.93,15.49,16.01,23.27,24.05,22.31,37.41-.85,11.86-11.71,19.86-26.39,19.45-.91-.03-2.16-.11-3.12-.2M120.69,134.67c-68.18-1.51-99.15,78.98-50.99,132.5,45.05,50.06,120.53,27.62,126.19-37.51,3.96-45.57-32.59-91.73-75.2-94.98"
                                                    />
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
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