<?php


namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testUser()
    {
        $client = self::createClient();
        $client->request('POST', '/api/users');
        $this->assertEquals(201, $client->getResponse()->getStatusCode());
    }
}