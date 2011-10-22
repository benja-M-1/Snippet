<?php

namespace Snippet\Model;

class Author
{
    /**
     * @var String $name
     */
    protected $name;

    /**
     * @var String $email
     */
    protected $email;

    public function __construct($name, $email)
    {
        $this->name  = $name;
        $this->email = $email;
    }

    /**
     * Returns the name and the email of the snippet author
     * @return String
     */
    public function __toString()
    {
        return strtr('%name% <%email%>', array('%name%' => $this->name, '%email%' => $this->email));
    }

    /**
     * @param \Snippet\Model\String $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return \Snippet\Model\String
     */
    public function getEmail()
    {
        return $this->email;
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
