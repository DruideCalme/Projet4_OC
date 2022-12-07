<?php $this->title = "Modifier un commentaire"; ?>

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
            <h2>Modifier un commentaire</h2>
            <?php include 'form_comment.php'; ?>
        </div>
    </div>
</section>