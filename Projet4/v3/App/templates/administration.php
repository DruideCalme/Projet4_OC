<?php $this->title = "P4 v3 - page Administration";
$user = $this->session->get('user');
?>

<section id="pageBlock">
    <div class="adminBlock">
        <p>
            <?= $this->session->show('update_password'); ?>
            <?= $this->session->show('error_login'); ?>
        </p>
        <h2>Votre profil <?= $this->session->getUserInfo('pseudo'); ?></h2>
        <p>Type de compte : <?= $this->session->getUserInfo('role') ?></p>
        <a href="./index.php?route=manageArticles">Gestion des chapitres</a></br>
        <a href="./index.php?route=manageComments">Gestion des commentaires</a></br>
        <a href="./index.php?route=myComments">Gérer vos commentaires</a></br>
        <a href="./index.php?route=manageUsers">Gestion des comptes utilisateurs</a></br>
        <a href="./index.php?route=updatePass">Modifier son mot de passe</a></br>
        <a href="./index.php?route=logout">Se déconnecter</a>
    </div>
</section>