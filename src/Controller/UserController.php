<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
        $users = $request->toArray()['users'];//request body
        $usersArray = array('users'=>array());//response body
        $api_key = "d195e8fb160ff29935bce1fe6772253b18ac92d6b74f1f7407c8cbafbf439d3e";
//        $api_key = $request->headers->get('api-key');

        if($api_key && hash('sha256', 'priimkitmaneidarba') === $api_key){

            foreach($users as $user){
                $newUser = new User();
                $newUser->setFirstName($user['first_name']);
                $newUser->setLastName($user['last_name']);
                $newUser->getFullName();
                array_push($usersArray['users'], $newUser);
            }

            return new Response(
                json_encode($usersArray),
                JsonResponse::HTTP_CREATED
            );
        }
        else {
            return new JsonResponse(
                ["Message" => "Api_key 'd195e8fb160ff29935bce1fe6772253b18ac92d6b74f1f7407c8cbafbf439d3e' is either incorrect or empty"],
                JsonResponse::HTTP_UNAUTHORIZED
            );
        }

    }
}
