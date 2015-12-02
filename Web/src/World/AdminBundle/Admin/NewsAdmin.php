<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace World\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class NewsAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
//            ->add('title', 'text', array('label' => 'Post Title'))
//            ->add('author', 'entity', array('class' => 'Acme\DemoBundle\Entity\User'))
            ->add('name') //if no type is specified, SonataAdminBundle tries to guess it
            ->add('description')
            ->add('image', 'file', array('required' => false, 'data_class' => null, 'mapped' => true))
            ->add('startDate')
            ->add('endDate')
            ->add('sortOrder')
            ->add('enabled')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('description')
            ->add('startDate')
            ->add('endDate')
            ->add('sortOrder')
            ->add('enabled')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('description')
            ->add('image', null, array(
                'template' => 'WorldToolBundle:Admin:image.html.twig'
            ))
            ->add('startDate')
            ->add('endDate')
            ->add('sortOrder')
            ->add('enabled')
        ;
    }

    public function prePersist($object)
    {
        if( $object->getImage() ) {
            $uploadableManager = $this->getConfigurationPool()->getContainer()->get('stof_doctrine_extensions.uploadable.manager');
            $uploadableManager->markEntityToUpload($object, $object->getImage());
        }
    }

    public function postPersist($object) {
        if( $object->getImage() ) {
            $object->setAuxImage( $object->getImage() );
            $this->getModelManager()->update( $object );
        }
    }

    public function preUpdate($object)
    {
        if( $object->getImage() ) {
            $uploadableManager = $this->getConfigurationPool()->getContainer()->get('stof_doctrine_extensions.uploadable.manager');
            $uploadableManager->markEntityToUpload($object, $object->getImage());
        }
    }

    public function postUpdate($object) {
//        $entity = $this->getModelManager()->find( self::$CLASS, $object->getId() );
//        echo $entity->getName()." - ".$entity->getImageWebPath();die;

        if( $object->getImage() == null && $object->getAuxImage() != null  ) {
            $object->setImage( $object->getAuxImage() );
            $this->getModelManager()->update( $object );
        }

        if( $object->getImage() ) {
            if( $object->getImage() != $object->getAuxImage() ) {
                $object->setAuxImage( $object->getImage() );
                $this->getModelManager()->update( $object );
            }
        }
    }
}