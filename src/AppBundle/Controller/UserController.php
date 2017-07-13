<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @Route("/profile", name="profile")
     */
    public function userProfileAction(Request $request){

//        Get the current User
        $user = $this->getUser();

        $postQuery = $this->getDoctrine()->getRepository('AppBundle:Post')->getAllPostsForUserQuery($user);

        $recordQuery = $this->getDoctrine()->getRepository('AppBundle:Record')->getAllRecordsForUser($user);




    }

}
