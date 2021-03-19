<?php

namespace App\Form;

use App\Entity\Ordreachat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrdreachatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('montantMax')
            ->add('adresseDepot')
            ->add('idProduit')
            ->add('idAcheteur')
            ->add('idEnchere')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ordreachat::class,
        ]);
    }
}
