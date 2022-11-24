<?php $this->title = "P4 v3 - page Supprimer son compte"; ?>

<section id="pageBlock">
    <div class="deleteAccountBlock">
        <p>Entrez votre mot de passe pour supprimer le compte de (pseudo ici)</p>
        <form method="post" action="#">
            <label for="password">Mot de passe</label><br>
            <input type="password" id="password" name="password"><br>
            <input type="submit" value="Supprimer" id="submit" name="submit">
        </form>
    </div>
</section>