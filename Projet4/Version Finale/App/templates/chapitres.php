<?php $this->title = "Les Chapitres"; ?>

<section id="pageBlock" class="articlesPageBlock">
    <div id="pageTitle" class="articlesPageTitle">
        <h2>Les Chapitres</h2>
    </div>
    <?php
    foreach ($articles as $article)
    {
        ?>
        <div class="articleBlock">
            <div class="articleDsc">
                <div class="articleDscContent">
                    <h2><?= htmlspecialchars($article->getTitle());?></h2>
                    <span class="articleDscOverview"><?= $article->getContent();?></span>
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