<?php $this->title = "P4 v3 - page Gerer vos commentaires"; ?>

<section id="pageBlock">
    <div class="myCommentsBlock">
        <p>
            <?= $this->session->show('delete_comment'); ?>
            <?= $this->session->show('edit_comment'); ?>
        </p>
        <h2>Gérer vos commentaires</h2>
        <ul>
            <?php
            foreach ($comments as $comment)
            {
                ?>
                <li>
                    <?=htmlspecialchars($comment->getContent());?> - Publié le <span class="comDate"><?=htmlspecialchars($comment->getCreatedAt());?> 
                    <a href="../public/index.php?route=editComment&amp;commentId=<?= $comment->getId(); ?>&amp;commentAuthor=<?= $comment->getPseudo() ?>&amp;articleId=<?= $comment->getArticleId() ?>">Modifier</a> 
                    <a href="../public/index.php?route=deleteComment&amp;commentId=<?= $comment->getId(); ?>&amp;commentAuthor=<?= $comment->getPseudo() ?>">Supprimer</a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</section>