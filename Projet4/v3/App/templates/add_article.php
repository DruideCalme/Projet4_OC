<?php $this->title = "P4 v3 - page Publier nouveau chapitre"; ?>

<section id="pageBlock">
    <div class="espacePersoBlock">
        <?php
        if ($this->session->getUserInfo('role') === 'admin') {
            include 'admin_nav.php';
        } else {
            include 'user_nav.php';
        }
        ?>
        <div class="espacePersoBlockInfo">
            <h2>Publier nouveau chapitre</h2>
            <?php include 'form_article.php'; ?>
        </div>
    </div>
</section>