<?php $this->title = "P4 v3 - page Chapitres"; ?>

<section id="pageBlock" class="articlepageBlock">
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
                    <h2><?= htmlspecialchars($article->getTitle());?></h2>
                    <p><?= htmlspecialchars($article->getContent());?> [...]</p>
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