<?php

namespace EscaleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpotType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('spotEtat')
            ->add('spotNom')
            ->add('spotGpsLat')
            ->add('spotGpsLng')
            ->add('spotAdr')
//            ->add('spotPhoto')
            ->add('phPhoto', 'file', array('label' => 'Photo', 'required' => false))
            ->add('spotDesc')
            ->add('spotSite')
            ->add('spotLikes')
            ->add('services')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EscaleBundle\Entity\Spot'
        ));
    }
}
