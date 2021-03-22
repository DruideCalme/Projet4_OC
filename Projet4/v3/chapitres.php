<?php
require 'Database.php';
require 'Article.php'
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>P4 v1 - page Chapitres</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive.css">
    <link rel="stylesheet" href="./css/fonts.css">
    <script src="https://kit.fontawesome.com/09cce809d6.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="navContainer">
        <nav>
            <ul class="navBlockA">
                <li><a href="index.php">Billet pour</br>l'alaska</a></li>
            </ul>
            <ul class="navBlockB">
                <li><a class="navLink" href="index.php">ACCUEIL</a></li>
                <li><a class="navLink navActive" href="chapitres.php">CHAPITRES</a></li>
                <li><a class="navLink" href="presentation.html">QUI SUIS-JE</a></li>
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
                <li><a class="navLinkSmall" href="index.php"><p>ACCUEIL</p></a></li>
                <li><a class="navLinkSmall" href="chapitres.php"><p>CHAPITRES</p></a></li>
                <li><a class="navLinkSmall" href="presentation.html"><p>QUI SUIS-JE</p></a></li>
                <li><a class="navLinkSmall" href="#"><p>ADMINISTRATION</p></a></li>
            </ul>
        </nav>
    </div>

    <section id="pageBlock" class="articlepageBlock">

        <?php
        $article = new Article();
        $articles = $article->getArticles();

        while($article = $articles->fetch())
        {
            ?>
            <div class="articleBlock">
                <div class="articleImg">
                    <img src="./img/alaska-glacier.jpg">
                </div>
                <div class="articleDscBlock">
                    <div class="articleDsc">
                        <h2><?= htmlspecialchars($article->titre);?></h2>
                        <p><?= htmlspecialchars($article->contenu);?> [...]</p>
                        <div class="articleDscLinkBlock">
                            <a class="articleDscLink" href="chapitre.php?articleId=<?=htmlspecialchars($article->id);?>">
                                <b>LIRE LA SUITE</b>
                                <div class="linkBorder"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div> 
            
            <?php
        }

        $articles->closeCursor();
        ?>

    </section>

<script type="module" src="./js/main.js"></script>
</body>

</html>