<?php

require_once __DIR__ . '/../bootstrap.php';
require_once __DIR__ . '/../../src/Snippet/Model/Author.php';

use Snippet\Model\Author;

class AuthorTest extends PHPUnit_Framework_TestCase
{
    public function testToString()
    {
        $author = new Author('Benjamin Grandfond', 'benjaming@theodo.fr');

        $this->assertEquals('Benjamin Grandfond <benjaming@theodo.fr>', (string) $author);
    }
}
