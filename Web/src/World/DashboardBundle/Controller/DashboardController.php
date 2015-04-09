<?php

namespace World\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $slides = $em->getRepository('WorldAdminBundle:Slide')->findAllCustom( true );
        $news = $em->getRepository('WorldAdminBundle:News')->findAllCustom( true );
        $activities = $em->getRepository('WorldVolunteerBundle:Activity')->findAllCustom( true );
        $associations = $em->getRepository('WorldVolunteerBundle:Association')->findAllCustom( true );

        return $this->render('WorldDashboardBundle:Dashboard:index.html.twig', array(
            'slides' => $slides,
            'news' => $news,
            'activities' => $activities,
            'associations' => $associations,
        ));
    }
}
