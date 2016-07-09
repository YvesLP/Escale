<?php

namespace EscaleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('userPro')
            ->add('userPseudo')
            ->add('userNom')
            ->add('userPrenom')
            ->add('userSoc')
            ->add('userEmail')
            ->add('userTel')
            ->add('userAdr')
//            ->add('userAdr2')
            ->add('userCp')
            ->add('userVille')
            ->add('userPays')
            ->add('userPhoto')
            ->add('sports')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EscaleBundle\Entity\User'
        ));
    }
}
