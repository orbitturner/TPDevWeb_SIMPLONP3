<?php

namespace App\Form;

use App\Entity\Clientphysique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientphysiqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('email')
            ->add('cni')
            ->add('telephone')
            ->add('adresse')
            ->add('sexe', ChoiceType::class, [
                'choices'  => [
                    'Masculin' => 'M',
                    'Feminin' => 'F',
                ],
                'placeholder' => 'CHOISISSEZ UNE OPTION'
                ])
            ->add('datenaiss', DateType::class, [
                'widget' => 'single_text',
                'input' => 'string',
            ])
            ->add('features', ChoiceType::class, [
                'choices' => [
                    'SMS' => 1,
                    'EMAIL' => 2,
                    'FUNCT3' => 3,
                    'FUNCT4' => 4,
                ],
                'multiple' => true, 'expanded' => true])
            ->add('issalarie', ChoiceType::class, [
                'choices' => [
                    'Salarié' => 1,
                    'Non Salarié' => 0,
                ],
                'expanded' => true
                ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Clientphysique::class,
        ]);
    }
}
