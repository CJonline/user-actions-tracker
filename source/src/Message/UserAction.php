<?php

namespace App\Message;

class UserAction
{
    private $content;

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     *
     * @return UserAction
     */
    public function setContent(string $content): UserAction
    {
        $this->content = $content;

        return $this;
    }
}