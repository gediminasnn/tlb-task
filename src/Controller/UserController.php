<?php

namespace App\Controller;

use App\Services\ApiKeyAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class UserController extends AbstractController
{
    /**
     * @Route("/api/users", name="user", methods="POST")
     */
    public function post(Request $request): Response
    {
        $apiKey = $request->headers->get('apiKey');//Get apiKey from headers

        //Authentication
        //Does apiKey exist
        if(!$apiKey)
        {
            return new Response( //Returning response with empty apiKey message
                "Api Key is empty",
                Response::HTTP_BAD_REQUEST
            );
        }
        //Does apiKey matches with original apiKey
        else if (hash('sha256', 'priimkitmaneidarba') !== $apiKey)
        {
            return new Response(                        //Returning response with incorrect apiKey message
                "Api Key '{$apiKey}' is incorrect",
                Response::HTTP_BAD_REQUEST
            );
        }

        //Fetching request body and instantiating response body
        $users = $request->toArray()['users'];          //Fetched request body into array TODO : use other methods
        $usersArray = array('users'=>array());          //Instantiated response body TODO : use other methods

        //Looping through request array
        foreach($users as $user){                       // Loops over all given users
            $newUser = new User();                      // Instantiate User object
            $newUser->setFirstName($user['first_name']);// Setting firstname
            $newUser->setLastName($user['last_name']);  // Setting lastname
            $newUser->getFullName();                    // Setting full name
            $usersArray['users'][] = $newUser;          // Pushing complete user into array
        }

        return new Response(
            json_encode($usersArray),                   //transforming array into json
            Response::HTTP_CREATED
        );

    }
}
