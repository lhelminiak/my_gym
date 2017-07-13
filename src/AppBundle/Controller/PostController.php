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
    public function newPost(Request $request){
        $request->isXmlHttpRequest();

        if(!$request->isXmlHttpRequest()){
            return new JsonResponse(array("Success" => false));
        }


        $user = $this->getUser();

        $content = $request->request->get("content");

        $post = new Post($user, $content, 0);

        $em = $this->get('doctrine.orm.entity_manager');
        $em->persist($post);
        $em->flush();

        return new JsonResponse(array('success'=> true));





    }
}
