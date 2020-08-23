<?php

namespace App\Form;

use App\Entity\Agency;
use App\Entity\Compteepsx;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompteepsxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('clerib')
            ->add('solde')
            ->add('datecreation')
            ->add('activedate')
            ->add('nextremundate')
            ->add('closedate')
            ->add('hostagency')
            ->add('owner')
            ->add('idopeningfees')
            ->add('iduser')
            ->add('state')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Compteepsx::class,
        ]);
    }
}
