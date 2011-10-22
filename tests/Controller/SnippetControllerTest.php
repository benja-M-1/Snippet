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

    public function testShow()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/snippet/1');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertEquals('Two by John Doe <johnd@theodo.fr>', $crawler->filter('h2')->text());
        $this->assertEquals('text two', $crawler->filter('code')->text());
    }

    public function testShowExceptionNaN()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/snippet/nan');

        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }

    public function testShowExceptionSnippetNotFound()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/snippet/1000');

        $this->assertEquals(500, $client->getResponse()->getStatusCode());
    }
}