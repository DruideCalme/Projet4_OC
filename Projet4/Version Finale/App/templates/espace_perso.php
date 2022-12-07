<?php $this->title = "Espace perso";?>

<section id="pageBlock">
    <div class="espacePersoBlock">
        <?php include 'user_nav.php'; ?>
        <div class="espacePersoBlockInfo">
            <div class="espacePersoBlockNavMobile NavMobileUsers">
                <div>
                <a href="./index.php?route=myComments">GERER VOS COMMENTAIRES</a>
                </div>
                <div>
                <a href="./index.php?route=updatePass">MODIFIER SON MOT DE PASSE</a>
                </div>
                <div>
                <a href="./index.php?route=deleteAccount">SUPPRIMER SON COMPTE</a>
                </div>
                <div>
                <a href="./index.php?route=logout">SE DECONNECTER</a>
                </div>
            </div>
            <?= $this->session->show('update_password'); ?>
            <?= $this->session->show('error_login'); ?>
            <?= $this->session->show('login_message'); ?>
            <h2>Votre profil <?= $this->session->getUserInfo('pseudo'); ?></h2>
            <p>Type de compte : <?= $this->session->getUserInfo('role') ?></p>
            <p>Inscrit depuis le : <?= $this->session->getUserInfo('createdAt') ?></p>
        </div>
    </div>
</section>