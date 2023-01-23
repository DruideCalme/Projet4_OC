<?php $this->title = "Accueil"; ?>

<div style="display: none">
    <p>
        <?= $this->session->show('login_message'); ?>
        <?= $this->session->show('logout'); ?>
        <?= $this->session->show('delete_account'); ?>
        <?= $this->session->show('register'); ?>
    </p>
</div>

<section id="pageBlock" class="homepageBlock">
    <div class="homepageBlockLeft">
        <div class="homepageArticleImg"></div>
        <div class="homepageArticle">
            <div class="homepageArticleBlock">
                <div class="homepageArticleBlock-content">
                    <div class="homepageArticleBlock-contentFlex">
                        <div class="homepageArticleTitle">
                            <h2><?= htmlspecialchars($lastArticle->getTitle());?></h2>
                        </div>
                        <div class="homepageOverview">
                            <?= $lastArticle->getContent()?>
                        </div>
                    </div>
                    <div class="homepageArticleLink">
                        <a href="../public/index.php?route=chapitre&articleId=<?=htmlspecialchars($lastArticle->getId());?>">
                            <b>LIRE LA SUITE</b>
                            <div class="linkBorder"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="homepageBlockRight">
        <div class="homepageWhoAmI">
            <div class="homepageWhoAmIBlock">
                <h2>A propos de moi</h2>
                <img src="../public/img/j-forteroche.jpg" alt="portrait de Jean Forteroche">
                <p>Jean Forteroche fait partie de ceux qui changent les règles du jeu. Largement considéré comme le plus grand industriel du moment, il porte l'innovation à 
                    des niveaux rarement atteints.</p>
            </div>
        </div>
        <div class="homepageSocialNetworks">
            <h2>Réseaux sociaux</h2>
            <div class="homepageSocialNetworksBlock">
                <a href="https://www.facebook.com/" target="_blank"><img src="../public/img/facebook-icone.png" alt="icone facebook"></a>
                <a href="https://twitter.com/" target="_blank"><img src="../public/img/twitter-icone.png" alt="icone twitter"></a>
                <a href="https://linkedin.com/" target="_blank"><img src="../public/img/linkedin-icone.png" alt="icone linkedin"></a>
                <a href="https://www.instagram.com/" target="_blank"><img src="../public/img/instagram-icone.png" alt="icone instagram"></a>
            </div>
        </div>
    </div>
    <div class="lastComSeparator"></div>
    <div class="homepageBlockCom">
        <h2>Dernier commentaire</h2>
        <div class="lastCom">
            <?php
            if (!$lastComment->getPseudo()) {
            ?>
                <p>Aucun commentaires</p>
            <?php   
            } else {
            ?>
                <div class="lastComImg">
                    <img src="../public/img/no-profile-picture.png" alt="image d'utilisateur par défaut">
                </div>
                <div class="lastComContentBlock">
                    <p class="lastComName"><?=htmlspecialchars($lastComment->getPseudo());?></p>
                    <div class="lastComContent"><?=$lastComment->getContent();?></div>
                    <p class="lastComInfos">Chapitre <span class="chapterNum"><?=htmlspecialchars($lastComment->getArticleId());?></span> Le <span class="lastComDate"><?=htmlspecialchars($lastComment->getCreatedAt());?></span></p>
                </div>
            <?php
            }
            ?>     
        </div>
    </div>
</section>