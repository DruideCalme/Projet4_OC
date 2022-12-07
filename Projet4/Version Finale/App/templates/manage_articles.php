<?php $this->title = "Gestion des chapitres"; ?>

<section id="pageBlock">
    <div class="espacePersoBlock">
        <?php include 'admin_nav.php'; ?>
        <div class="espacePersoBlockInfo manageArticles">
            <div class="manageArticlesBlock">
                <?= $this->session->show('add_article'); ?>
                <?= $this->session->show('edit_article'); ?>
                <?= $this->session->show('delete_article'); ?>
                <h2>Gérer les chapitres</h2>
                <div class="addArticleLink">
                    <a href="./index.php?route=addArticle">Publier un nouveau chapitre</a>
                </div></br>
                <ul>
                    <?php
                    if (!$articles) {
                        ?>
                        <p>Aucun chapitre publié</p>
                        <?php
                    } else {
                        foreach ($articles as $article)
                        {
                        ?>
                            <li>
                                <div class="editArticleContent">
                                    <?= htmlspecialchars($article->getTitle());?> - <span class="articleDate"><?=htmlspecialchars($article->getCreatedAt());?></span>
                                </div>
                                <div class="editArticleLinks">
                                    <a href="../public/index.php?route=editArticle&amp;articleId=<?= $article->getId(); ?>">Modifier</a>
                                    <a href="../public/index.php?route=deleteArticle&amp;articleId=<?= $article->getId(); ?>">Supprimer</a>
                                </div>
                            </li>
                        <?php
                        }
                    }
                    ?>
                </ul> 
            </div>
        </div>
    </div>
</section>