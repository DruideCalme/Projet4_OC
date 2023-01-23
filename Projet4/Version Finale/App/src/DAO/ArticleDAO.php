<?php

namespace App\src\DAO;

use App\src\model\Article;

/* Class ArticleDAO gère les opérations effectuées sur les articles. */

class ArticleDAO extends DAO
{
    private function buildObject($row)
    {
        $article = new Article();
        $article->setId($row['id']);
        $article->setTitle($row['titre']);
        $article->setContent($row['contenu']);
        $article->setCreatedAt($row['date']);

        return $article;
    }

    public function getArticles()
    {
        $sql = 'SELECT id, titre, contenu, date FROM chapitre ORDER BY id ASC';
        $result = $this->createQuery($sql);
        $articles = [];

        foreach ($result as $row) {
            $articleId = $row['id']; 
            $articles[$articleId] = $this->buildObject($row);
        }
        $result->closeCursor();

        return $articles;
    }

    public function getArticle($articleId)
    {
        $sql = 'SELECT id, titre, contenu, date FROM chapitre WHERE id = ?';
        $result = $this->createQuery($sql, [$articleId]);
        $article = $result->fetch();
        $result->closeCursor();

        return $this->buildObject($article);
    }

    public function getLastArticle()
    {
        $sql = 'SELECT id, titre, contenu, date FROM chapitre ORDER BY id DESC LIMIT 1';
        $result = $this->createQuery($sql);
        $article = $result->fetch();
        $result->closeCursor();
        
        return $this->buildObject($article);
    }

    public function addArticle($post)
    {
        $sql = 'INSERT INTO chapitre (titre, contenu, date) VALUES (?, ?, NOW())';
        $this->createQuery($sql, [$post->get('title'), $post->get('content')]);
    }

    public function editArticle($post, $articleId)
    {
        $sql = 'UPDATE chapitre SET titre=:title, contenu=:content WHERE id=:articleId';
        $this->createQuery($sql, [
            'title' => $post->get('title'),
            'content' => $post->get('content'),
            'articleId' => $articleId
        ]);
    }

    public function deleteArticle($articleId)
    {
        $sql = 'DELETE FROM comment WHERE chapitre_id=:id';
        $this->createQuery($sql, [
           'id' => $articleId
        ]);
        $sql = 'DELETE FROM chapitre WHERE id=:id';
        $this->createQuery($sql, [
            'id' => $articleId
        ]);
    }
}