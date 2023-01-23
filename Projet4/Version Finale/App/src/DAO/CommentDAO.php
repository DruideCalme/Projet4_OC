<?php

namespace App\src\DAO;

use App\src\model\Comment;

/* Class CommentDAO gère les opérations effectuées sur les commentaires. */

class CommentDAO extends DAO
{
    private function buildObject($row)
    {
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setPseudo($row['pseudo']);
        $comment->setContent($row['contenu']);
        $comment->setCreatedAt($row['date']);
        $comment->setArticleId($row['chapitre_id']);
        
        return $comment;
    }

    public function addComment($post, $articleId)
    {
        $sql = 'INSERT INTO comment (pseudo, contenu, date, chapitre_id, flag) VALUES (?, ?, NOW(), ?, 0)';
        $this->createQuery($sql, [
            $post->get('pseudo'),
            $post->get('content'),
            $articleId
        ]);
    }

    public function editComment($post, $commentId)
    {
        $sql = 'UPDATE comment SET contenu=:content WHERE id=:commentId';
        $this->createQuery($sql, [
            'content' => $post->get('content'),
            'commentId' => $commentId
        ]);
    }

    public function getComments()
    {
        $sql = 'SELECT id, pseudo, contenu, date, flag, chapitre_id FROM comment WHERE flag=:flag ORDER BY date DESC';
        $result = $this->createQuery($sql, [
            'flag' => 0
        ]);
        $comments = [];

        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();

        return $comments;
    }

    public function getComment($commentId) 
    {
        $sql = 'SELECT id, pseudo, contenu, date, chapitre_id FROM comment WHERE id = ?';
        $result = $this->createQuery($sql, [$commentId]);
        $comment = $result->fetch();
        $result->closeCursor();

        return $this->buildObject($comment);
    }

    public function getFlagComments()
    {
        $sql = 'SELECT id, pseudo, contenu, date, flag, chapitre_id FROM comment WHERE flag=:flag ORDER BY date DESC';
        $result = $this->createQuery($sql, [
            'flag' => 1
        ]);
        $comments = [];

        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();

        return $comments;
    }

    public function getCommentsFromArticle($articleId)
    {
        $sql = 'SELECT id, pseudo, contenu, date, flag, chapitre_id FROM comment WHERE chapitre_id = ? AND flag = ? ORDER BY date DESC';
        $result = $this->createQuery($sql, [$articleId, 0]);
        $comments = [];

        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();

        return $comments;
    }

    public function getLastComment()
    {
        $sql = 'SELECT id, pseudo, contenu, date, chapitre_id FROM comment ORDER BY date DESC LIMIT 1';
        $result = $this->createQuery($sql);
        $comment = $result->fetch();
        $result->closeCursor();

        return $this->buildObject($comment);
    }

    public function getUserComments($pseudo) {
        $sql = 'SELECT id, pseudo, contenu, date, chapitre_id FROM comment WHERE pseudo = ? ORDER BY date DESC';
        $result = $this->createQuery($sql, [$pseudo]);
        $comments = [];
        
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();

        return $comments;
    }

    public function deleteComment($commentId)
    {
        $sql = 'DELETE FROM comment WHERE id=:id';
        $this->createQuery($sql, [
            'id' => $commentId
        ]);
    }

    public function flagComment($commentId)
    {
        $sql = 'UPDATE comment SET flag=:flag WHERE id=:id';
        $this->createQuery($sql, [
            'flag' => 1,
            'id' => $commentId
        ]);
    }

    public function unflagComment($commentId)
    {
        $sql = 'UPDATE comment SET flag=? WHERE id=?';
        $this->createQuery($sql, [0, $commentId]);
    }
}