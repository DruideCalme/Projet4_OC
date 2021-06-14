<?php
require '../vendor/autoload.php';

use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>P4 v3 - page Chapitre</title>
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
                <li><a class="navLink" href="./index.php">ACCUEIL</a></li>
                <li><a class="navLink navActive" href="./chapitres.php">CHAPITRES</a></li>
                <li><a class="navLink" href="./presentation.html">QUI SUIS-JE</a></li>
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
                <li><a class="navLinkSmall" href="./chapitres.php"><p>CHAPITRES</p></a></li>
                <li><a class="navLinkSmall" href="./presentation.html"><p>QUI SUIS-JE</p></a></li>
                <li><a class="navLinkSmall" href="#"><p>ADMINISTRATION</p></a></li>
            </ul>
        </nav>
    </div>

    <section id="pageBlock">

        <?php 
        $article = new ArticleDAO();
        $articles = $article->getArticle($_GET['articleId']);
        $article = $articles->fetch();
        ?>

        <div class="chapitreTitle">
            <h2><?= htmlspecialchars($article->titre);?></h2>
        </div>
        <div class="chapitreContentBlock">
            <div class="chapitreImg"></div>
            <div class="chapitreDsc">
                <div class="chapitreDscContent">
                    <p><?= htmlspecialchars($article->contenu);?></p>
                    <div class="backToArticles">
                        <a href="./chapitres.php">
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
            
        <?php
        $comment = new CommentDAO();
        $comments = $comment->getCommentsFromArticle($_GET['articleId']);

        if(!$comment = $comments->fetch())
        {
            ?>
            <p>Aucun commentaires</p>
            <?php
        } else {
            while($comment = $comments->fetch())
            {
                ?>
                <div class="com">
                    <div class="comImg">
                        <img src="../public/img/no-profile-picture.png">
                    </div>
                    <div class="comContentBlock">
                        <p class="comName"><?=htmlspecialchars($comment->pseudo);?></p>
                        <p class="comContent"><?=htmlspecialchars($comment->content);?></p>
                        <p class="comInfos">Le <span class="comDate"><?=htmlspecialchars($comment->date);?></span></p>
                    </div>
                </div>

                <?php
            }
        }

        $comments->closeCursor();
        ?>
        </div>      

    </section>

<script type="module" src="../public/js/main.js"></script>
</body>

</html>