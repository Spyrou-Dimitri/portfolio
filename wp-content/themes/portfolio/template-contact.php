<?php /* Template Name: Page "Contact" */
?>
<?php
get_header();
?>
<?php if (have_posts()): while (have_posts()): the_post();
$email = get_option('options_email');
$phone = get_option('options_phone');
?>
<div class="bgContact">
    <section class="homeContact">
        <h2 aria-level="2" class="homeContact__title">
            <?= get_the_title() ?>
        </h2>
    </section>
</div>
<section class="content">

    <h2 aria-level="2" class="content__title sro">
        Contact
    </h2>

    <article class="content__coord">
        <h3 aria-level="3" class="content__coord__title">
            <?= get_field('coord-title') ?>
        </h3>
        <p class="content__coord__paragraph">
            <?= get_field('coord-desc') ?>
        </p>
        <dl class="content__coord__list">
            <dt class="content__coord__list__title">
                Email
            </dt>
            <dd class="content__coord__list__link">
                <a href="<?= $email['url'] ?>"><?= $email['title'] ?></a>
            </dd>
            <dt class="content__coord__list__title">
                Téléphone
            </dt>
            <dd class="content__coord__list__link">
                <a href="<?= $phone['url'] ?>"><?= $phone['title'] ?></a>
            </dd>
        </dl>
    </article>
    <article class="content__contact">
        <h3 aria-level="3" class="content__contact__title">
            <?= get_field('form-title') ?>
        </h3>
        <?php
        $errors = $_SESSION['contact_form_errors'] ?? [];
        unset($_SESSION['contact_form_errors']);
        $success = $_SESSION['contact_form_success'] ?? false;
        unset($_SESSION['contact_form_success']);
        ?>
        <?php if($success): ?>
            <div class="contact__success">
                <p><?= $success; ?></p>
            </div>
        <?php else: ?>
        <p class="content__contact__paragraph">
            <?= get_field('form-desc') ?>
        </p>




        <form action="<?= admin_url('admin-post.php'); ?>" method="post" class="content__contact__form">
            <div class="content__contact__form__container lastName-FirstName">
                <div class="lastName">
                    <label for="lastname">Nom (*)</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Copeau">
                    <?php if(isset($errors['lastname'])): ?>
                        <p class="field__error"><?= $errors['lastname']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="firstName">
                    <label for="firstname">Prénom (*)</label>
                    <input type="text" id="firstname" name="firstname" placeholder="Anthony">
                    <?php if(isset($errors['firstname'])): ?>
                        <p class="field__error"><?= $errors['firstname']; ?></p>
                    <?php endif; ?>
                </div>

            </div>
            <div class="content__contact__form__container email-tel">
                <div class="email">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="anthony.copeau@hotmail.com">
                    <?php if(isset($errors['email'])): ?>
                        <p class="field__error"><?= $errors['email']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="tel">
                    <label for="phone">Téléphone</label>
                    <input type="tel" id="phone" name="phone" placeholder="45678765">
                </div>
            </div>
            <div class="content__contact__form__container">
                <label for="object">Objet (*)</label>
                <input type="text" id="object" name="object">
            </div>
            <div class="content__contact__form__container">
                <label for="message">Message (*)</label>
                <textarea name="message" id="message" rows="10" placeholder="Ex. Bonjour je souhaite vous parler d'un projet"></textarea>
                <?php if(isset($errors['message'])): ?>
                    <p class="field__error"><?= $errors['message']; ?></p>
                <?php endif; ?>
            </div>
            <input type="hidden" name="action" value="dw_submit_contact_form">
            <button class="button" type="submit" name="submit"><span>Envoyer !</span></button>
        </form>
        <?php endif; ?>

    </article>
</section>




<?php endwhile; endif; ?>
<?php
get_footer();
?>
