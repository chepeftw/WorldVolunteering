<?php

namespace World\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('WorldAdminBundle:Default:index.html.twig', array('name' => $name));
    }
}
