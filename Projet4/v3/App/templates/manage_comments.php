<?php $this->title = "P4 v3 - page Gestion des commentaires"; ?>

<section id="pageBlock">
    <div class="manageCommentsBlock">
        <p>
            <?= $this->session->show('delete_comment'); ?>
            <?= $this->session->show('unflag_comment'); ?>
        </p>
        <h2>Commentaires signalés</h2>
        <ul>
            <?php
            foreach ($flagComments as $flagComment)
            {
                ?>
                    <li>
                        <?=htmlspecialchars($flagComment->getContent());?> - Publié par <?=htmlspecialchars($flagComment->getPseudo());?> le <span class="comDate"><?=htmlspecialchars($flagComment->getCreatedAt());?> 
                        <a href="../public/index.php?route=unflagComment&amp;commentId=<?= $flagComment->getId(); ?>">Unflag</a> 
                        <a href="../public/index.php?route=deleteComment&amp;commentId=<?= $flagComment->getId(); ?>">Supprimer</a>
                    </li>
                <?php
            }
            ?>
        </ul>
        <h2>Gérer les commentaires</h2>
        <ul>
            <?php
            foreach ($comments as $comment)
            {
                ?>
                    <li>
                        <?=htmlspecialchars($comment->getContent());?> - Publié par <?=htmlspecialchars($comment->getPseudo());?> le <span class="comDate"><?=htmlspecialchars($comment->getCreatedAt());?> 
                        <?php
                        if ($comment->getPseudo() !== $this->session->getUserInfo('pseudo')) {
                            ?>
                            <a href="../public/index.php?route=deleteComment&amp;commentId=<?= $comment->getId(); ?>">Supprimer</a>
                            <?php
                        }
                        ?>
                    </li>
                <?php
            }
            ?>
        </ul>
    </div>
</section>