<?php
// src/Acme/DemoBundle/Admin/PostAdmin.php

namespace World\VolunteerBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class AssociationAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
//            ->add('title', 'text', array('label' => 'Post Title'))
//            ->add('author', 'entity', array('class' => 'Acme\DemoBundle\Entity\User'))
            ->add('name')
            ->add('address')
            ->add('country')
            ->add('state')
            ->add('city')
            ->add('phone')
            ->add('email')
            ->add('founded')
            ->add('operationTime')
            ->add('mission')
            ->add('vision')
            ->add('philosophy')
            ->add('legal')
            ->add('type')
            ->add('typeOther')
            ->add('denomination')
            ->add('denominationOther')
            ->add('coverage')
            ->add('aboutUs')
            ->add('whatWeDo')
            ->add('legalPartner')
            ->add('legalPartnerPhone')
            ->add('legalPartnerEmail')
            ->add('executivePartner')
            ->add('executivePartnerPhone')
            ->add('executivePartnerEmail')
            ->add('communicationPartner')
            ->add('communicationPartnerPhone')
            ->add('communicationPartnerEmail')
            ->add('website')
            ->add('facebook')
            ->add('twitter')
            ->add('instagram')
            ->add('director')
            ->add('directorPhone')
            ->add('directorEmail')
            ->add('directorBirthdate')
            ->add('directorTime')
            ->add('history')
            ->add('volunteerRequirements')
            ->add('volunteerAge')
            ->add('commitment')
            ->add('donations')
            ->add('donationMethod')
            ->add('donationPurpose')
            ->add('axis')
            ->add('volunteerActive')
            ->add('volunteerPermanent')
            ->add('volunteerMan')
            ->add('volunteerWoman')
            ->add('frequency')
            ->add('logo', 'file', array('required' => false, 'data_class' => null, 'mapped' => true))
            ->add('user')
            ->add('approved')
            ->add('enabled')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('phone')
            ->add('email')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('phone')
            ->add('email')
            ->add('logo', null, array(
                'template' => 'WorldToolBundle:Admin:image.html.twig'
            ))
        ;
    }

    public function prePersist($object)
    {
        // We get the uploadable manager!
        $uploadableManager = $this->getConfigurationPool()->getContainer()->get('stof_doctrine_extensions.uploadable.manager');
        $uploadableManager->markEntityToUpload($object, $object->getLogo());
    }

    public function preUpdate($object)
    {
        // We get the uploadable manager!
        $uploadableManager = $this->getConfigurationPool()->getContainer()->get('stof_doctrine_extensions.uploadable.manager');
        $uploadableManager->markEntityToUpload($object, $object->getLogo());
    }
}