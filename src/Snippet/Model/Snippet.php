<?php

namespace Snippet\Model;

use Snippet\Model\Author;

class Snippet
{
    /**
     * @var String $name
     */
    protected $name;

    /**
     * @var String $code
     */
    protected $code;

    /**
     * @var Author $author
     */
    protected $author;

    public function __construct($name, $code, \Snippet\Model\Author $author)
    {
        $this->name = $name;
        $this->code = $code;
        $this->author = $author;
    }

    public function __toString()
    {
        return strtr('%author% : %name% : %code%', array('%author%' => $this->author, '%name%' => $this->name, '%code%' => $this->code));
    }
}
