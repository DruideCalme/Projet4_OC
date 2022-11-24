<?php $this->title = "P4 v3 - page Chapitre"; ?>

<section id="pageBlock">
    <div style="display: none">
        <p>
            <?= $this->session->show('add_comment'); ?>
            <?= $this->session->show('flag_comment'); ?>
        </p>
    </div>
    <div class="chapitreTitle">
        <h2><?= htmlspecialchars($article->getTitle());?></h2>
    </div>
    <div class="chapitreContentBlock">
        <div class="chapitreImg"></div>
        <div class="chapitreDsc">
            <div class="chapitreDscContent">
                <p><?= htmlspecialchars($article->getContent());?></p>
                <div class="backToArticles">
                    <a href="./index.php?route=chapitres">
                        <b>RETOUR AUX CHAPITRES</b>
                        <div class="linkBorder"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
        
    <div class="comSeparator"></div>

    <div class="blockCom">
        <h2>Commentaires</h2>
        <a href="./index.php?route=addComment&articleId=<?=htmlspecialchars($article->getId());?>">Ajouter un commentaire</a>
    <?php
    if (!$comments) {
        ?>
        <p>Aucun commentaires</p>
        <?php
    } else {
        foreach ($comments as $comment) {
            ?>
            <div class="com">
                <div class="comImg">
                    <img src="../public/img/no-profile-picture.png">
                </div>
                <div class="comContentBlock">
                    <p class="comName"><?=htmlspecialchars($comment->getPseudo());?></p>
                    <p class="comContent"><?=htmlspecialchars($comment->getContent());?></p>
                    <p class="comInfos">Le <span class="comDate"><?=htmlspecialchars($comment->getCreatedAt());?></span></p>
                    <a href="./index.php?route=flagComment&commentId=<?=htmlspecialchars($comment->getId());?>&articleId=<?=htmlspecialchars($article->getId());?>">Signaler commentaire</a>
                </div>
            </div>

            <?php
        }
    }
    ?>
    </div>      
</section>