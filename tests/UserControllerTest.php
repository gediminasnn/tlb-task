<?php


namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testUser()
    {
        $client = self::createClient();
        $client->request('POST', '/api/users', ['json' => [
            'users' => [
                ['first_name'=>'Tom','last_name'=>'Hardy'],
                ['first_name'=>'Tom','last_name'=>'Gnarly']
            ]
        ]
        ]);
        $this->assertEquals(201, $client->getResponse()->getStatusCode());
    }
}