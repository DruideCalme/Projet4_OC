<?php $this->title = "Gerer vos commentaires"; ?>

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
            <div class="manageComsBlock">
                <?= $this->session->show('delete_comment'); ?>
                <?= $this->session->show('edit_comment'); ?>
                <h2>Gérer vos commentaires</h2>
                <ul>
                    <?php
                    if (!$comments) {
                        ?>
                        <p>Aucun commentaire publié</p>
                        <?php
                    } else {
                        foreach ($comments as $comment)
                        {
                            ?>
                            <li>
                                <div class="manageComContent">
                                    <span class="comOverview"><?=$comment->getContent();?></span>
                                    <span class="comDetails"><pre>Publié le </pre><span class="comDate"><?=htmlspecialchars($comment->getCreatedAt());?></span>
                                </div>
                                <div class="editArticleLinks">
                                    <a href="../public/index.php?route=editComment&amp;commentId=<?= $comment->getId(); ?>&amp;commentAuthor=<?= $comment->getPseudo() ?>&amp;articleId=<?= $comment->getArticleId() ?>">Modifier</a> 
                                    <a href="../public/index.php?route=deleteComment&amp;commentId=<?= $comment->getId(); ?>&amp;commentAuthor=<?= $comment->getPseudo() ?>">Supprimer</a>
                                </div>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</section>