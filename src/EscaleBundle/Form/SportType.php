<?php

namespace EscaleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SportType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sportEtat')
            ->add('sportLib')
//            ->add('sportPicto')
            ->add('phPicto', 'file', array('label' => 'Pictogramme', 'required' => false))
            ->add('phPhoto', 'file', array('label' => 'Photo', 'required' => false))
//            ->add('sportPhoto')
            ->add('sportSite')
            ->add('users')
            ->add('spots')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EscaleBundle\Entity\Sport'
        ));
    }
}
