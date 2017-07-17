<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestValueResolver;

class PostController extends Controller
{


    /**
     * @param Request $request
     * @return JsonResponse
     * @Route("/ajax_new_post", name="ajaxNewPost")
     */
    public function newPostAction(Request $request){



        $request->isXmlHttpRequest();

        if(!$request->isXmlHttpRequest()){
            return new JsonResponse(array("Success" => false));
        }

        $em = $this->get('doctrine.orm.entity_manager');

        $user = $this->getUser();

        $content = $request->request->get("content");

        $type = $request->request->get("type");


//        $post = new Post($user, $content, $type, $weight, $reps, $lift);


        if($type == 0){
            $post = new Post($user, $content, $type);

        }
        elseif ($type == 1){

            $lift = $em->getReference('AppBundle:Lift', $request->request->get("lift_id"));

            $weight = $request->request->get("weight");

            $reps = $request->request->get("reps");


            $post = new Post($user, $content, $type, $weight, $reps, $lift);
        }


        $em->persist($post);
        $em->flush();

        return new JsonResponse(array('success'=> true));





    }
}
