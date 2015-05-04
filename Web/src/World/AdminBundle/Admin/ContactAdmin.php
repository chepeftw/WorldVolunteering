<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace World\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ContactAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
//            ->add('title', 'text', array('label' => 'Post Title'))
//            ->add('author', 'entity', array('class' => 'Acme\DemoBundle\Entity\User'))
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('phone')
            ->add('comment')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('phone')
            ->add('comment')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('email')
            ->add('firstName')
            ->add('lastName')
            ->add('phone')
            ->add('comment')
            ->add('created')
        ;
    }
}