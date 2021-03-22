<?php

class Article extends Database

{
    public function getArticles()
    {
        $sql = 'SELECT id, titre, contenu, date FROM chapitre ORDER BY id ASC';
        return $this->createQuery($sql);
    }

    public function getArticle($articleId)
    {
        $sql = 'SELECT id, titre, contenu, date FROM chapitre WHERE id = ?';
        return $this->createQuery($sql, [$articleId]);
    }

    public function getLastArticle()
    {
        $sql = 'SELECT id, titre, contenu, date FROM chapitre ORDER BY id DESC';
        return $this->createQuery($sql)->fetch();
    }
}