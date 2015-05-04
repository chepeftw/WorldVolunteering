<?php

namespace World\DashboardBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use World\AdminBundle\Entity\Contact;
use World\AdminBundle\Form\ContactType;

class DashboardController extends Controller
{
    public function indexAction() {
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

    public function associationsAction() {
        $em = $this->getDoctrine()->getManager();

        $slides = $em->getRepository('WorldAdminBundle:Slide')->findAllCustom( true );
        $activities = $em->getRepository('WorldVolunteerBundle:Activity')->findAllCustom( true );
        $associations = $em->getRepository('WorldVolunteerBundle:Association')->findAllCustom( true );

        return $this->render('WorldDashboardBundle:Dashboard:associations.html.twig', array(
            'slides' => $slides,
            'activities' => $activities,
            'associations' => $associations,
        ));

    }

    public function aboutAction() {
        $em = $this->getDoctrine()->getManager();

        $slides = $em->getRepository('WorldAdminBundle:Slide')->findAllCustom( true );

        return $this->render('WorldDashboardBundle:Dashboard:about.html.twig', array(
            'slides' => $slides,
        ));
    }

    public function contactAction() {
        $em = $this->getDoctrine()->getManager();

        $slides = $em->getRepository('WorldAdminBundle:Slide')->findAllCustom( true );

        $entity = new Contact();
        $form   = $this->createContactForm($entity);

        return $this->render('WorldDashboardBundle:Dashboard:contact.html.twig', array(
            'slides' => $slides,
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function sendAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $slides = $em->getRepository('WorldAdminBundle:Slide')->findAllCustom( true );

        $entity = new Contact();
        $form   = $this->createContactForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->sendMail( $entity );

            $this->get('session')->getFlashBag()->add( 'success', 'send.success' );

            return $this->redirect( $this->generateUrl('world_dashboard_contact') );
        }

        $this->get('session')->getFlashBag()->add( 'error', 'send.error' );

        return $this->render('WorldDashboardBundle:Dashboard:contact.html.twig', array(
            'slides' => $slides,
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }





    /**
     * Creates a form to create a Contact entity.
     *
     * @param Contact $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createContactForm(Contact $entity)
    {
        $form = $this->createForm(new ContactType(), $entity, array(
            'action' => $this->generateUrl('world_dashboard_contact_send'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'form.send', 'translation_domain' => 'WorldDashboardBundle'));

        return $form;
    }

    private function sendMail( $entity ) {

        $message = \Swift_Message::newInstance()
            ->setSubject( $entity->toSubject() )
            ->setTo( $this->container->getParameter('contact_mail') )
            ->setFrom( $this->container->getParameter('mailer_user') )
            ->setBody(
                $this->get('templating')->render(
                    'WorldDashboardBundle:Dashboard:email.html.twig',
                    array( 'entity' => $entity )
                ), 'text/html'
            )
        ;

        $this->get('mailer')->send($message);
    }
}
