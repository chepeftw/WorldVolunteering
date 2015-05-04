<?php

namespace World\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', null, array('label' => 'contact.firstname'))
            ->add('lastName', null, array('label' => 'contact.lastname'))
            ->add('email', null, array('label' => 'contact.email'))
            ->add('phone', null, array('label' => 'contact.phone'))
            ->add('comment', null, array('label' => 'contact.comment'))
            ->add('captcha', 'genemu_recaptcha')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'World\AdminBundle\Entity\Contact',
            'translation_domain' => 'WorldDashboardBundle',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'world_adminbundle_contact';
    }
}
