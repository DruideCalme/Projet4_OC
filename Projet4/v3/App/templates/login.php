<?php $this->title = "P4 v3 - page Connexion"; ?>

<section id="pageBlock">
    <div class="loginBlock">
        <p>
            <?= $this->session->show('error_login'); ?>
        </p>

        <form method="post" action="../public/index.php?route=login">
            <label for="pseudo">Pseudo</label><br>
            <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')) : '';?>"><br>
            <label for="password">Mot de passe</label><br>
            <input type="password" id="password" name="password"><br>
            <input type="submit" value="Connexion" id="submit" name="submit">
        </form>
    </div>
    <a href="./index.php?route=register">Inscription</a>
</section>