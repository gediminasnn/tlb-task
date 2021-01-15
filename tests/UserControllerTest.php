<?php


namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class UserControllerTest extends WebTestCase
{
    public function testUser()
    {

        $client = $this->createClient();
        $body =
            '{
                "users": [
                {
                    "first_name": "Abraomas",
                    "last_name": "Braomas"
                },
                {
                    "first_name": "Tomas",
                    "last_name": "Bernius"
                }
            ]
        }';
        $client->request('POST',
            '/api/users',
            [],
            [],
            [
                'HTTP_api_key' => 'd195e8fb160ff29935bce1fe6772253b18ac92d6b74f1f7407c8cbafbf439d3e',
                'CONTENT_TYPE' => 'application/json'
            ],
            $body);

        $this->assertEquals(201, $client->getResponse()->getStatusCode());
    }
}