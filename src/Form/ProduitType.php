<?php

namespace App\Form;

use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('estimationActuelle')
            ->add('prixVente')
            ->add('nom')
            ->add('description')
            ->add('artiste')
            ->add('style')
            ->add('produitcategories')
            ->add('idLot')
            ->add('idAcheteur')
            ->add('idVendeur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
