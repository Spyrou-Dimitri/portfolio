<?php /* Template Name: Page "Contact" */
?>
<?php
get_header();
?>
<?php if (have_posts()): while (have_posts()): the_post();
$email = get_option('options_email');
$phone = get_option('options_phone');
?>
<section>
    <h2>
        <?= get_the_title() ?>
    </h2>
</section>
<section>
    <h2>
        Contact
    </h2>
    <article>
        <h3>
            <?= get_field('coord-title') ?>
        </h3>
        <p>
            <?= get_field('coord-desc') ?>
        </p>
        <dl>
            <dt>
                Email
            </dt>
            <dd>
                <a href="<?= $email['url'] ?>"><?= $email['title'] ?></a>
            </dd>
            <dt>
                Téléphone
            </dt>
            <dd>

                <a href="<?= $phone['url'] ?>"><?= $phone['title'] ?></a>
            </dd>
        </dl>
    </article>
    <article>
        <h3>
            <?= get_field('form-title') ?>
        </h3>
        <p>
            <?= get_field('form-desc') ?>
        </p>
        <form action="#" method="post">
            <label for="lastName">Nom (*)</label>
            <input type="text" name="lastName" id="name" placeholder="Copeau">
            <label for="firstName">Prénom (*)</label>
            <input type="text" id="firstName" name="firstName" placeholder="Anthony">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="anthony.copeau@hotmail.com">
            <label for="phone">Téléphone</label>
            <input type="tel" id="phone" name="phone" placeholder="45678765">
            <label for="object">Objet (*)</label>
            <input type="text" id="object" name="object">
            <label for="message">Message (*)</label>
            <textarea name="message" id="message" cols="30" rows="10" placeholder="Ex. Bonjour je souhaite vous parler d'un projet"></textarea>
            <button type="submit" name="submit">Envoyer</button>
        </form>

    </article>
</section>




<?php endwhile; endif; ?>
<?php
get_footer();
?>
