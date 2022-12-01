<?php $this->title = "P4 v3 - Qui suis-je"; ?>

<section id="pageBlock">
    <div class="registerBlock">
        <div class="loginTitle">
            <h2>Inscription</h2>
        </div>
        <div class="loginForm">
            <form method="post" action="../public/index.php?route=register">
                <label for="pseudo">Pseudo</label>
                <div class="loginFormInput">
                    <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')) : '' ?>" placeholder="Entrez votre pseudo"><br>
                </div>
                <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''?>
                <label for="password">Mot de passe</label>
                <div class="loginFormInput">
                    <input type="password" id="password" name="password" value="<?= isset($post) ? htmlspecialchars($post->get('password')) : ''; ?>" placeholder="Entrez votre mot de passe"><br>
                </div>               
                <?= isset($errors['password']) ? $errors['password'] : ''?>
                <div class="loginButtons">
                    <input type="submit" value="Inscription" id="submit" name="submit">
                </div>
            </form>
        </div>  
    </div>
</section>