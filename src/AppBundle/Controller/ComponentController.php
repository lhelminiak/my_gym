<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ComponentController extends Controller
{



    public function showUserSidePanelAction(){
        $user = $this->getUser();

        return $this->render(':components:user_info_side_panel.html.twig', array(
            'user' => $user
        ));
    }

    public function renderNewPostFormViewAction(){

        $user = $this->getUser();

        $lifts = $this->getDoctrine()->getRepository('AppBundle:Lift')->findAll();

        $query = $this->getDoctrine()->getRepository('AppBundle:Gym')->getAllGymsForUserQuery($user);


        return $this->render(':components:new_post_form.html.twig', array(
            'lifts' => $lifts,
            'gyms' => $query

        ));


    }


    public function renderPostsViewAction($posts){

        return $this->render(':components:post_body.html.twig', array(
            'posts' => $posts

        ));


    }
}
