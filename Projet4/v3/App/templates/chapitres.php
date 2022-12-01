<?php $this->title = "P4 v3 - page Chapitres"; ?>

<section id="pageBlock" class="articlesPageBlock">
    <div id="pageTitle" class="articlesPageTitle">
        <h2>Chapitres</h2>
    </div>
    <?php
    foreach ($articles as $article)
    {
        ?>
        <div class="articleBlock">
            <div class="articleImg">
                <img src="../public/img/alaska-glacier.jpg">
            </div>
            <div class="articleDscBlock">
                <div class="articleDsc">
                    <div class="articleDscContent">
                        <h2><?= htmlspecialchars($article->getTitle());?></h2>
                        <span><?= $article->getContent();?></span>
                    </div>
                    <div class="articleDscLinkBlock">
                        <a class="articleDscLink" href="../public/index.php?route=chapitre&articleId=<?=htmlspecialchars($article->getId());?>">
                            <b>LIRE LA SUITE</b>
                            <div class="linkBorder"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
    ?>
</section>