<?php

namespace App\src\DAO;

class CommentDAO extends DAO

{

    public function getCommentsFromArticle($articleId)
    {
        $sql = 'SELECT id, pseudo, content, date FROM comment WHERE chapitre_id = ? ORDER BY date DESC';
        return $this->createQuery($sql, [$articleId]);
    }

    public function getLastComment()
    {
        $sql = 'SELECT id, pseudo, content, date, chapitre_id FROM comment ORDER BY date DESC LIMIT 1';
        return $this->createQuery($sql);
    }

}