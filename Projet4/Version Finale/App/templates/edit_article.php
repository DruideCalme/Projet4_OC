<?php $this->title = "Modifier un chapitre"; ?>

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
            <h2>Modifier chapitre</h2>
            <?php include 'form_article.php'; ?>
        </div>
    </div>
</section>