<?php

namespace App\src\model;

/* Classe Article, représente un article du blog */

class Article
{
    private $id;
    private $title;
    private $content;
    private $createdAt;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {   
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
}