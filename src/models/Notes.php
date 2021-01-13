<?php


class Notes
{
    private $id;
    private $user_id;
    private $title;
    private $type;
    private $content;
    private $last_open;


    public function __construct($id = null, $user_id, $title, $type, $content, $last_open)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->type = $type;
        $this->content = $content;
        $this->last_open = $last_open;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type): void
    {
        $this->type = $type;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content): void
    {
        $this->content = $content;
    }

    public function getLastOpen()
    {
        return $this->last_open;
    }

    public function setLastOpen($last_open): void
    {
        $this->last_open = $last_open;
    }



}