<?php

namespace World\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $slides = $em->getRepository('WorldAdminBundle:Slide')->findAllCustom( true );

        return $this->render('WorldDashboardBundle:Dashboard:index.html.twig', array(
            'slides' => $slides,
        ));
    }

    public function sliderAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WorldAdminBundle:Slide')->findAllCustom( true );

        return $this->render('WorldDashboardBundle:Dashboard:slider.html.twig', array(
            'entities' => $entities,
        ));
    }
}
