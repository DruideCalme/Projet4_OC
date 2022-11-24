<?php $this->title = "P4 v3 - page Modifier son mot de passe"; ?>

<section id="pageBlock">
    <div class="updatePassBlock">
        <p>Le mot de passe de (pseudo ici) sera modifié</p>
        <form method="post" action="../public/index.php?route=updatePass">
            <label for="password">Nouveau mot de passe</label><br>
            <input type="password" id="password" name="password"><br>
            <?= isset($errors) ? $errors['password'] : ''?>
            <input type="submit" value="Mettre à jour" id="submit" name="submit">
    </form>
    </div>
</section>