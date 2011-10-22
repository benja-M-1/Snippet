<?php

use Silex\WebTestCase;

class IndexTest extends WebTestCase
{
    public function createApplication()
    {
        return require __DIR__ . '/../../src/app.php';
    }

    public function testIndex()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/hello/benjamin');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertEquals('Hello benjamin', $client->getResponse()->getContent());
    }
}
