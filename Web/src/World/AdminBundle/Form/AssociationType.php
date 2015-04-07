<?php

namespace World\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AssociationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
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
            ->add('logo')
            ->add('randomValue')
            ->add('user')
            ->add('approved')
            ->add('enabled')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'World\VolunteerBundle\Entity\Association'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'world_adminbundle_association';
    }
}
