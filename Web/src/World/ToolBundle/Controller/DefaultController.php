<?php

namespace World\ToolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('WorldToolBundle:Default:index.html.twig', array('name' => $name));
    }
}
