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

    /**
     * @param \Snippet\Model\Author $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return \Snippet\Model\Author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param \Snippet\Model\String $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return \Snippet\Model\String
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param \Snippet\Model\String $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return \Snippet\Model\String
     */
    public function getName()
    {
        return $this->name;
    }
}
