<?php $this->title = htmlspecialchars($article->getTitle()); ?>

<section id="pageBlock" class="chapitrePageBlock">
    <div>
        <p class="sessionInfos">
            <?= $this->session->show('add_comment'); ?>
            <?= $this->session->show('flag_comment'); ?>
        </p>
    </div>
    <?= $this->session->show('add_comment'); ?>
    <?= $this->session->show('flag_comment'); ?>
    <div class="chapitreTitle">
        <h2><?= htmlspecialchars($article->getTitle());?></h2>
    </div>
    <div class="chapitreContentBlock">
        <div class="chapitreDsc">
            <div class="chapitreDscContent">
                <?= $article->getContent();?></br>
                <i>Date de publication : <?= $article->getCreatedAt();?></i>
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
                    <p class="comContent"><?=$comment->getContent();?></p>
                    <p class="comInfos">Publié le <span class="comDate"><?=htmlspecialchars($comment->getCreatedAt());?></span></p>
                    <a href="./index.php?route=flagComment&commentId=<?=htmlspecialchars($comment->getId());?>&articleId=<?=htmlspecialchars($article->getId());?>">Signaler le commentaire</a>
                </div>
            </div>

            <?php
        }
    }
    ?>
    </div>      
</section>