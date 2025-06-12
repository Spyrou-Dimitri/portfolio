<?php get_header()?>
<section class="page404">
    <h2 class="page404__title">
        Error 404
    </h2>
    <p class="page404__desc">
        La page à la quelle vous essayez d'accéder n'existe pas !
    </p>
    <a class="page404__link" href="<?= home_url() ?>"><span>Retourner à l'accueil</span></a>
    <div>
        <img src="/wp-content/themes/portfolio/resources/img/ball8.svg" alt="Ball 8" width="100" height="100">
    </div>

</section>


<?php get_footer() ?>
