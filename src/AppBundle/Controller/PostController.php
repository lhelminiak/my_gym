<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use AppBundle\Entity\Record;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestValueResolver;
use Symfony\Component\Validator\Constraints\Date;


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



        if($type == 0){
            $post = new Post($user, $content, $type, null, null, null, null, null);

            $em->persist($post);
            $em->flush();

        }
        elseif ($type == 1){

//            $lift = $em->getReference('AppBundle:Lift', $request->request->get("lift_id"));

            $lift = $this->getDoctrine()->getRepository('AppBundle:Lift')->find($request->request->get("lift_id"));

            $weight = $request->request->get("weight");

            $reps = $request->request->get("reps");


            $post = new Post($user, $content, $type, $weight, $reps, $lift, null, null);


            $em->persist($post);
            $em->flush();


            $id = $post->getId();
            $post = $em->getReference('AppBundle:Post', $id);

            $record = new Record($user, $weight, $reps, $lift, $post);

            $em->persist($record);
            $em->flush();



        }
        else{

//            $lift = $em->getReference('AppBundle:Lift', $request->request->get("lift_id"));

            $lift = $this->getDoctrine()->getRepository('AppBundle:Lift')->find($request->request->get("lift_id"));



            $location = $this->getDoctrine()->getRepository('AppBundle:Location')->find($request->request->get("gym_id"));

            $liftTime = $request->request->get('liftTime');

            $date = new \DateTime($liftTime);


            $post = new Post($user, $content, $type, null, null, $lift, $location, $date);

            $em->persist($post);
            $em->flush();

        }






        $em->clear();

        return new JsonResponse(array('success'=> true));





    }
}
