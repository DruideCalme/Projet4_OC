<?php $this->title = "Modifier son mot de passe"; ?>

<section id="pageBlock">
    <div class="espacePersoBlock">
        <?php
        if ($this->session->getUserInfo('role') === 'Admin') {
            include 'admin_nav.php';
        } else {
            include 'user_nav.php';
        }
        ?>
        <div class="espacePersoBlockInfo">
            <div class="updatePassBlock">
                <h2>Modifier votre mot de passe</h2>
                <form method="post" action="../public/index.php?route=updatePass">
                    <div class="loginFormInput">
                        <input type="password" id="password" name="password" placeholder="Nouveau mot de passe"><br>
                    </div>
                    <?= isset($errors) ? $errors['password'] : ''?>
                    <div class="loginButtons">
                        <input type="submit" value="Mettre à jour" id="submit" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>