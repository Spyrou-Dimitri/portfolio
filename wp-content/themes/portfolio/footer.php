</main>
<footer>
    <section class="footer__container">
        <h2 class="sro">
            Pieds de pages
        </h2>
        <div class="footer__container__section contact">
            <h3 class="footer__container__section__title">
                Je vous intéresse ?
            </h3>
            <p>
                Dans ce cas, prenez contact avec moi via le bouton ci-dessous !
            </p>
            <a href="/contact" title="Vers la page de contact" hreflang="fr" class="ctaPrimary"><span>Contactez-moi</span></a>
        </div>
        <nav class="footer__container__section secondNav">
            <h3 class="footer__container__section__title">
                <?= wp_get_nav_menu_name('header_menu') ?>
            </h3>
            <ul class="footer__container__section__list">
                <?php foreach (pf_get_navigation_links('header_menu') as $link): ?>
                    <li class="footer__container__section__list__items">
                        <a class="footer__container__section__list__items__links" href="<?= $link->url ?>"
                           class="nav__containner__items__link"
                           title="Vers la page <?= $link->label ?>"><?= $link->label ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <div class="footer__container__section social">
            <h3 class="footer__container__section__title">
                <?= wp_get_nav_menu_name('social_media_menu') ?>
            </h3>
            <ul class="footer__container__section__list">
                <?php foreach (pf_get_navigation_links('social_media_menu') as $link): ?>
                    <li class="footer__container__section__list__items">
                        <a class="footer__container__section__list__items__links" href="<?= $link->url ?>"
                           title="Vers la page <?= $link->label ?>" target="_blank"><?= $link->label ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="footer__container__section usefull">
            <h3 class="footer__container__section__title">
                <?= wp_get_nav_menu_name('usefull_links_menu') ?>
            </h3>
            <ul class="footer__container__section__list">
                <?php foreach (pf_get_navigation_links('usefull_links_menu') as $link): ?>
                    <li class="footer__container__section__list__items">
                        <a class="footer__container__section__list__items__links" href="<?= $link->url ?>"
                           title="Vers la page <?= $link->label ?>" target="_blank"><?= $link->label ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

</footer>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox/fancybox.umd.js"></script>
<script type="module" src="<?= pf_asset('js/main.js') ?>" defer></script>
</body>

</html>
