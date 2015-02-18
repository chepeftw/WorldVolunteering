<?php

namespace World\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller
{
    public function indexAction()
    {
        return $this->render('WorldDashboardBundle:Dashboard:index.html.twig', array());
    }
}
