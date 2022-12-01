<?php $this->title = "P4 v3 - Accueil"; ?>

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
                            <ul class="homepageArticleNav">
                                <li class="homepageArticleNav-li active"></li>
                                <li class="homepageArticleNav-li"></li>
                                <li class="homepageArticleNav-li"></li>
                                <li class="homepageArticleNav-li"></li>
                                <li class="homepageArticleNav-li"></li>
                                <li class="homepageArticleNav-li"></li>
                                <li class="homepageArticleNav-li"></li>
                                <li class="homepageArticleNav-li"></li>
                            </ul>
                            <h2><?= htmlspecialchars($lastArticle->getTitle());?></h2>
                        </div>
                        <span>
                            <?= $lastArticle->getContent()?>
                        </span>
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
                <img src="../public/img/j-forteroche.jpg">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eu feugiat nunc. Pellentesque at sapien sed diam tincidunt euismod. 
                Aliquam sed lorem nec sapien semper pretium eget eget urna.</p>
            </div>
        </div>
        <div class="homepageSocialNetworks">
            <h2>Réseaux sociaux</h2>
            <div class="homepageSocialNetworksBlock">
                <a href="https://www.facebook.com/" target="_blank"><img src="../public/img/facebook-icone.png"></a>
                <a href="https://twitter.com/" target="_blank"><img src="../public/img/twitter-icone.png"></a>
                <a href="https://linkedin.com/" target="_blank"><img src="../public/img/linkedin-icone.png"></a>
                <a href="https://www.instagram.com/" target="_blank"><img src="../public/img/instagram-icone.png"></a>
            </div>
        </div>
    </div>
    <div class="lastComSeparator"></div>
    <div class="homepageBlockCom">
            <h2>Dernier commentaire</h2>
            <div class="lastCom">
                <div class="lastComImg">
                    <img src="../public/img/no-profile-picture.png">
                </div>
                <div class="lastComContentBlock">
                    <p class="lastComName"><?=htmlspecialchars($lastComment->getPseudo());?></p>
                    <p class="lastComContent"><?=$lastComment->getContent();?></p>
                    <p class="lastComInfos">Chapitre <span class="chapterNum"><?=htmlspecialchars($lastComment->getArticleId());?></span> Le <span class="lastComDate"><?=htmlspecialchars($lastComment->getCreatedAt());?></span></p>
                </div>
            </div>
    </div>
</section>