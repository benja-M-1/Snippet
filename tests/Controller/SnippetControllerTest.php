<?php

require_once __DIR__.'/../bootstrap.php';

use Silex\WebTestCase;

class SnippetControllerTest extends WebTestCase
{
    public function createApplication()
    {
        return require __DIR__.'/../../src/app.php';
    }

    public function testIndex()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/snippet/');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertEquals(3, $crawler->filter('ul li')->count());
    }
}