<?php $this->title = "P4 v3 - page Espace perso";?>

<section id="pageBlock">
    <div class="profileBlock">
        <p>
            <?= $this->session->show('update_password'); ?>
            <?= $this->session->show('error_login'); ?>
        </p>
        <h2>Votre profil <?= $this->session->getUserInfo('pseudo'); ?></h2>
        <p>Type de compte : <?= $this->session->getUserInfo('role') ?></p>
        <a href="./index.php?route=myComments">Gérer vos commentaires</a></br>
        <a href="./index.php?route=updatePass">Modifier son mot de passe</a></br>
        <a href="./index.php?route=deleteAccount">Supprimer son compte</a></br>
        <a href="./index.php?route=logout">Se déconnecter</a>
    </div>
</section>