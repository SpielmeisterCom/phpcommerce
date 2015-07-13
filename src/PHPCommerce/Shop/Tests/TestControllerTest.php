<?php
namespace PHPCommerce\Bundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TestControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/test');
        $this->assertGreaterThan(0, $crawler->filter('html:contains("hello world")')->count());
    }
}