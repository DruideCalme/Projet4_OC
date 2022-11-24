<?php $this->title = "P4 v3 - page Gestion des chapitres"; ?>

<section id="pageBlock">
    <div class="manageArticlesBlock">
        <p>
            <?= $this->session->show('add_article'); ?>
            <?= $this->session->show('edit_article'); ?>
            <?= $this->session->show('delete_article'); ?>
        </p>
        <a href="./index.php?route=addArticle">Publier nouveau chapitre</a>
        <h2>Gérer les chapitres</h2>
        <ul>
            <?php
            foreach ($articles as $article)
            {
                ?>
                <li>
                    <?= htmlspecialchars($article->getTitle());?> - <?= htmlspecialchars($article->getCreatedAt());?>
                    <a href="../public/index.php?route=editArticle&amp;articleId=<?= $article->getId(); ?>">Modifier</a>
                    <a href="../public/index.php?route=deleteArticle&amp;articleId=<?= $article->getId(); ?>">Supprimer</a>
                </li>
                <?php
            }
            ?>
        </ul>       
    </div>
</section>