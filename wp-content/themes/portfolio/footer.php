</main>
<footer>
    <div class="footer__container">
        <section class="footer__container__section">
            <h2 class="footer__container__section__title class="footer__container__section__title" ">
                Je vous intéresse ?
            </h2>
            <p>
                Dans ce cas, prenez contact avec moi via le bouton ci-dessous !
            </p>
            <a href="#" title="Vers la page de contact" hreflang="fr">Contactez-moi</a>
        </section>
        <section class="footer__container__section">
            <h2 class="footer__container__section__title">
                <?= wp_get_nav_menu_name('usefull_links_menu') ?>
            </h2>
            <ul class="footer__container__section__list">
                <?php foreach (dw_get_navigation_links('usefull_links_menu') as $link): ?>
                <li class="footer__container__section__list__items">
                    <a class="footer__container__section__list__items__links" href="<?= $link->url ?>W" title="Vers la page <?= $link->label ?>" target="_blank"><?= $link->label ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
        </section>
        <section class="footer__container__section">
            <h2 class="footer__container__section__title">
                <?= wp_get_nav_menu_name('social_media_menu') ?>
            </h2>
            <ul class="footer__container__section__list">
                <?php foreach (dw_get_navigation_links('social_media_menu') as $link): ?>
                    <li class="footer__container__section__list__items">
                        <a class="footer__container__section__list__items__links" href="<?= $link->url ?>" title="Vers la page <?= $link->label ?>" target="_blank"><?= $link->label ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
        <nav class="footer__container__section">
            <h2 class="footer__container__section__title">
                <?= wp_get_nav_menu_name('header_menu') ?>
            </h2>
            <ul class="footer__container__section__list">
                <?php foreach (dw_get_navigation_links('header_menu') as $link): ?>
                    <li class="footer__container__section__list__items">
                        <a class="footer__container__section__list__items__links" href="<?= $link->url ?>" class="nav__containner__items__link" title="Vers la page <?= $link->label?>"><?= $link->label?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>

</footer>
</body>
</html>
