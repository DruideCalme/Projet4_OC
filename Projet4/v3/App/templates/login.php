<?php $this->title = "P4 v3 - page Connexion"; ?>

<section id="pageBlock" class="loginPageBlock">
    <p>
        <?= $this->session->show('error_login'); ?>
    </p>
    <div class="loginBlock">
        <div class="loginTitle">
            <h2>Se connecter</h2>
        </div>
        <div class="loginForm">
            <form method="post" action="../public/index.php?route=login">
                <label for="pseudo">Pseudo</label>
                <div class="loginFormInput">
                    <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')) : '';?>" placeholder="Entrez votre pseudo"><br>
                </div>
                <label for="password">Mot de passe</label>
                <div class="loginFormInput">
                    <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe"><br>
                </div>
                <div class="loginButtons">
                    <input type="submit" value="Connexion" id="submit" name="submit">
                    <div class="registerLink">
                        <a href="./index.php?route=register">Inscription</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>