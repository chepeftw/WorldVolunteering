<?php

namespace World\VolunteerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('WorldVolunteerBundle:Default:index.html.twig', array('name' => $name));
    }
}
