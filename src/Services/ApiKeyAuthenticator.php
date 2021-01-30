<?php


namespace App\Security;


use Symfony\Component\HttpFoundation\Response;

class ApiKeyAuthenticator
{

    public function authenticateApiKey($apiKey)
    {
        if($apiKey || hash('sha256', 'priimkitmaneidarba') == $apiKey){
            return new Response(
                "Api_key '{$apiKey}' is either incorrect or empty",
                Response::HTTP_BAD_REQUEST
            );
        }
    }

}