<?php

namespace App\Message;

class SimpleMessage
{
    protected $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}