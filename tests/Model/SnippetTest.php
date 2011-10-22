<?php

require_once __DIR__ . '/../bootstrap.php';

require_once __DIR__ . '/../../src/Snippet/Model/Snippet.php';
require_once __DIR__ . '/../../src/Snippet/Model/Author.php';

use Snippet\Model\Snippet;
use Snippet\Model\Author;


class SnippetTest extends PHPUnit_Framework_TestCase
{
    public function testToString()
    {
        $author = new Author('John Doe', 'johnd@theodo.fr');

        $snippet = new Snippet('Sample code', 'This is a sample peace of code for testing purpose', $author);
        $this->assertEquals('John Doe <johnd@theodo.fr> : Sample code : This is a sample peace of code for testing purpose', (string) $snippet);
    }
}
