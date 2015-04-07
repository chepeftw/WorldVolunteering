<?php

namespace World\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use World\AdminBundle\Entity\Slide;
use World\AdminBundle\Form\SlideType;

/**
 * Slide controller.
 *
 */
class SlideController extends Controller
{

    /**
     * Lists all Slide entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('WorldAdminBundle:Slide')->findAll();

        $entity = new Slide();

        return $this->render('WorldAdminBundle:Slide:index.html.twig', array(
            'entities' => $entities,
            'entity' => $entity,
        ));
    }
    /**
     * Creates a new Slide entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Slide();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($entity);

            if( $entity->getImage() != null ) {
                $uploadableManager = $this->get('stof_doctrine_extensions.uploadable.manager');
                $uploadableManager->markEntityToUpload( $entity, $entity->getImage() );
            }

            $em->flush();

            return $this->redirect($this->generateUrl('slide_show', array('id' => $entity->getId())));
        }

        return $this->render('WorldAdminBundle:Slide:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Slide entity.
     *
     * @param Slide $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Slide $entity)
    {
        $form = $this->createForm(new SlideType(), $entity, array(
            'action' => $this->generateUrl('slide_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'form.new', 'translation_domain' => 'WorldDashboardBundle'));

        return $form;
    }

    /**
     * Displays a form to create a new Slide entity.
     *
     */
    public function newAction()
    {
        $entity = new Slide();
        $form   = $this->createCreateForm($entity);

        return $this->render('WorldAdminBundle:Slide:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Slide entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WorldAdminBundle:Slide')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Slide entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WorldAdminBundle:Slide:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Slide entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WorldAdminBundle:Slide')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Slide entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('WorldAdminBundle:Slide:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Slide entity.
    *
    * @param Slide $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Slide $entity)
    {
        $form = $this->createForm(new SlideType(), $entity, array(
            'action' => $this->generateUrl('slide_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'form.update', 'translation_domain' => 'WorldDashboardBundle'));

        return $form;
    }
    /**
     * Edits an existing Slide entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('WorldAdminBundle:Slide')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Slide entity.');
        }

        $image = $entity->getImage();

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {

            $entityImage = $entity->getImage();
            if( !isset( $entityImage ) || ( trim( $entityImage ) === '' ) ) {
                $entity->setImage( $image );
            } else {
                $uploadableManager = $this->get('stof_doctrine_extensions.uploadable.manager');
                $uploadableManager->markEntityToUpload( $entity, $entity->getImage() );
            }

            $em->persist( $entity );
            $em->flush();

            return $this->redirect($this->generateUrl('slide_show', array('id' => $id)));
        }

        return $this->render('WorldAdminBundle:Slide:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Slide entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('WorldAdminBundle:Slide')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Slide entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('slide'));
    }

    /**
     * Creates a form to delete a Slide entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('slide_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'form.delete', 'translation_domain' => 'WorldDashboardBundle'))
            ->getForm()
        ;
    }
}
