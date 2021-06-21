<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>P4 v3</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/responsive.css">
    <link rel="stylesheet" href="../public/css/fonts.css">
    <script src="https://kit.fontawesome.com/09cce809d6.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="navContainer">
        <nav>
            <ul class="navBlockA">
                <li><a href="./index.php">Billet pour</br>l'alaska</a></li>
            </ul>
            <ul class="navBlockB">
                <li><a class="navLink navActive" href="./index.php">ACCUEIL</a>
                </li>
                <li><a class="navLink" href="./index.php?route=chapitres">CHAPITRES</a></li>
                <li><a class="navLink" href="./index.php?route=presentation">QUI SUIS-JE</a></li>
            </ul>
            <ul class="navBlockC">
                <li><a class="navLink" href="#">ADMINISTRATION</a></li>
            </ul>
        </nav>
    </div>

    <div class="navContainerSmall">
        <nav>
            <span class="navBackgroundSmall"></span>
            <span class="navClickZone"></span>
            <ul class="navBlockASmall">
                <li class="navLogoSmall"><span>Billet pour l'alaska</span></li>
                <li class="navButtonSmall"><span class="fas fa-bars fa-2x"></span></li>
            </ul>
            <ul class="navBlockBSmall navHide navDisplay">
                <li><a class="navLinkSmall" href="./index.php"><p>ACCUEIL</p></a></li>
                <li><a class="navLinkSmall" href="./index.php?route=chapitres"><p>CHAPITRES</p></a></li>
                <li><a class="navLinkSmall" href="./index.php?route=presentation"><p>QUI SUIS-JE</p></a></li>
                <li><a class="navLinkSmall" href="#"><p>ADMINISTRATION</p></a></li>
            </ul>
        </nav>
    </div>

    <section id="pageBlock" class="homepageBlock">
        <div class="homepageBlockLeft">
            <div class="homepageArticleImg"></div>
            <div class="homepageArticle">
                <div class="homepageArticleBlock">
                    <div class="homepageArticleBlock-content">
                        <ul class="homepageArticleNav">
                            <li class="homepageArticleNav-li"></li>
                            <li class="homepageArticleNav-li"></li>
                            <li class="homepageArticleNav-li active"></li>
                            <li class="homepageArticleNav-li"></li>
                            <li class="homepageArticleNav-li"></li>
                            <li class="homepageArticleNav-li"></li>
                            <li class="homepageArticleNav-li"></li>
                            <li class="homepageArticleNav-li"></li>
                        </ul>

                        <?php
                        $article = $article->fetch();
                        ?>

                        <h2><?= htmlspecialchars($article->titre);?></h2>
                        <p><?= htmlspecialchars($article->contenu);?> [...]</p>
                        <a href="../public/index.php?route=chapitre&articleId=<?=htmlspecialchars($article->id);?>">
                            <b>LIRE LA SUITE</b>
                            <div class="linkBorder"></div>
                        </a>
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

                <?php 
                $lastComment = $lastComment->fetch();
                ?>

                <div class="lastCom">
                    <div class="lastComImg">
                        <img src="../public/img/no-profile-picture.png">
                    </div>
                    <div class="lastComContentBlock">
                        <p class="lastComName"><?=htmlspecialchars($lastComment->pseudo);?></p>
                        <p class="lastComContent"><?=htmlspecialchars($lastComment->content);?></p>
                        <p class="lastComInfos">Chapitre <span class="chapterNum"><?=htmlspecialchars($lastComment->chapitre_id);?></span> Le <span class="lastComDate"><?=htmlspecialchars($lastComment->date);?></span></p>
                    </div>
                </div>
        </div>
    </section>

<script type="module" src="../public/js/main.js"></script>
</body>

</html>