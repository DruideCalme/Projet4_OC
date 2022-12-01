<?php 
    $this->title = "P4 v3 - page Supprimer son compte";
    $confirm = 0;
?>

<section id="pageBlock">
    <?= $this->session->show('error_deleting_account'); ?>
    <div class="espacePersoBlock">
        <?php include 'user_nav.php'; ?>
        <div class="espacePersoBlockInfo">
            <h2>Supprimer votre compte</h2>
            <form method="post" action="../public/index.php?route=deleteAccount" id="deleteAccount">
                <input type="hidden" name="pseudo" id="pseudo" value="<?= $this->session->getUserInfo('pseudo'); ?>">
                <label for="password">Saisissez votre mot de passe pour supprimer votre compte</label>
                <div class="loginFormInput">
                    <input type="password" id="password" name="password" placeholder="Mot de passe"><br>
                </div>
                <?= isset($errors) ? $errors['password'] : ''?>
                <input type="submit" value="Supprimer" id="submit" name="submit"> 
            </form>
        </div>
    </div>
</section>