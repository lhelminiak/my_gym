<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ComponentController extends Controller
{



    public function showUserSidePanelAction(){
        $user = $this->getUser();

        return $this->render(':components:user_info_side_panel.html.twig', array(
            'user' => $user
        ));
    }

    public function renderNewPostFormViewAction(){




    }
}
