<?php $this->title = "P4 v3 - page Gestion des commentaires"; ?>

<section id="pageBlock">
    <p>
        <?= $this->session->show('delete_comment'); ?>
        <?= $this->session->show('unflag_comment'); ?>
    </p>
    <div class="espacePersoBlock">
        <?php include 'admin_nav.php'; ?>
        <div class="espacePersoBlockInfo">
            <div class="manageComsBlock">
                <h2>Commentaires signalés</h2>
                <ul>
                    <?php
                    if (!$flagComments) {
                        ?>
                        <p class="noComment">Aucun commentaire signalé</p>
                        <?php
                    } else {
                        foreach ($flagComments as $flagComment)
                        {
                        ?>
                            <li>
                                <div class="manageComContent">
                                    <?=$flagComment->getContent();?><pre> - Publié par </pre><?=htmlspecialchars($flagComment->getPseudo());?><pre> le </pre><span class="comDate"><?=htmlspecialchars($flagComment->getCreatedAt());?>
                                </div>
                                <div class="manageComLinks flag">
                                    <a href="../public/index.php?route=unflagComment&amp;commentId=<?= $flagComment->getId(); ?>">Autoriser</a> 
                                    <a href="../public/index.php?route=deleteComment&amp;commentId=<?= $flagComment->getId(); ?>">Supprimer</a>
                                </div>
                            </li>
                        <?php
                        }
                    }
                    ?>
                </ul>
                <h2>Gérer les commentaires</h2>
                <ul>
                    <?php
                    if (!$comments) {
                        ?>
                        <p class="noComment">Aucun commentaire</p>
                        <?php
                    } else {
                        foreach ($comments as $comment)
                        {
                        ?>
                            <li>
                                <div class="manageComContent">
                                    <?=$comment->getContent();?><pre> - Publié par </pre><?=htmlspecialchars($comment->getPseudo());?><pre> le </pre><span class="comDate"><?=htmlspecialchars($comment->getCreatedAt());?>
                                </div>                            
                                <div class="manageComLinks">
                                    <a href="../public/index.php?route=deleteComment&amp;commentId=<?= $comment->getId(); ?>">Supprimer</a>
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