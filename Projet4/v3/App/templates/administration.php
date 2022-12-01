<?php $this->title = "P4 v3 - page Administration";
$user = $this->session->get('user');
?>

<section id="pageBlock">
    <p>
        <?= $this->session->show('update_password'); ?>
        <?= $this->session->show('error_login'); ?>
    </p>
    <div class="espacePersoBlock">
        <?php include 'admin_nav.php'; ?>
        <div class="espacePersoBlockInfo">
            <div class="espacePersoBlockNavMobile">
                <div>
                    <a href="./index.php?route=manageArticles">GESTION DES CHAPITRES</a>
                </div>
                <div>
                    <a href="./index.php?route=manageComments">GESTION DES COMMENTAIRES</a>
                </div>
                <div>
                    <a href="./index.php?route=myComments">GERER VOS COMMENTAIRES</a>
                </div>
                <div>
                    <a href="./index.php?route=manageUsers">GESTION DES UTILISATEURS</a>
                </div>
                <div>
                    <a href="./index.php?route=updatePass">MODIFIER SON MOT DE PASSE</a>
                </div>
                <div>
                    <a href="./index.php?route=logout">SE DECONNECTER</a>
                </div>
            </div>
            <h2>Votre profil <?= $this->session->getUserInfo('pseudo'); ?></h2>
            <p>Type de compte : <?= $this->session->getUserInfo('role') ?></p>
            <p>Inscrit depuis le : <?= $this->session->getUserInfo('createdAt') ?></p>
        </div>
    </div>
</section>