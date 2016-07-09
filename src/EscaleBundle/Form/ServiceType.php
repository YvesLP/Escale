<?php

namespace EscaleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ServiceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('servEtat')
            ->add('servNom')
            ->add('servGpsLat')
            ->add('servGpsLng')
            ->add('servInfos')
            ->add('servEmail')
            ->add('servTel')
            ->add('servAdr')
            ->add('servAdr2')
            ->add('servCp')
            ->add('servVille')
            ->add('servPays')
            ->add('servPhoto')
            ->add('servDesc')
            ->add('servSite')
            ->add('servLikes')
            ->add('servIduser')
            ->add('servIdcat')
            ->add('spots')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EscaleBundle\Entity\Service'
        ));
    }
}
