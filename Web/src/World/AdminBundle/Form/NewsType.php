<?php

namespace World\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array( 'label' => 'general.name' ))
            ->add('description', null, array( 'label' => 'general.description' ))
            ->add('image', null, array( 'data_class' => null, 'label' => 'general.image' ) )
            ->add('startDate', null, array( 'label' => 'general.startdate' ))
            ->add('endDate', null, array( 'label' => 'general.enddate' ))
            ->add('sortOrder', null, array( 'label' => 'general.sortorder' ))
            ->add('enabled', null, array( 'label' => 'general.enabled' ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'World\AdminBundle\Entity\News',
            'translation_domain' => 'WorldDashboardBundle',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'world_adminbundle_news';
    }
}
