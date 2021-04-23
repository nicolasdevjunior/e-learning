<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
        {
        $builder
        ->add('nom',TextType::class)
        ->add('prenom',TextType::class)
        ->add('lieuNaissance',TextType::class)
        ->add('jour',ChoiceType::class,array(
                   'choices' => array('Jour' => null,
                    '01' => 1,
                    '02' => 2,
                    '03' => 3,
                    '04' => 4,
                    '05' => 5,
                    '06' => 6,
                    '07' => 7,
                    '08' => 8,
                    '09' => 9,
                    '10' => 10,
                    '11' => 11,
                    '12' => 12,
                    '13' => 13,
                    '14' => 14,
                    '15' => 15,
                    '16' => 16,
                    '17' => 17,
                    '18' => 18,
                    '19' => 19,
                    '20' => 20,
                    '21' => 21,
                    '22' => 22,
                    '23' => 23,
                    '24' => 24,
                    '25' => 25,
                    '26' => 26,
                    '27' => 27,
                    '28' => 28,
                    '29' => 29,
                    '30' => 30,
                    '31' => 31)
                   ))
        ->add('mois',ChoiceType::class,array(
                   'choices' => array('Mois' => null,
                    'Janvier' => 1,
                    'Fevrier' => 2,
                    'Mars' => 3,
                    'Avril' =>4,
                    'Mai' => 5,
                    'Juin' => 6,
                    'Juillet' => 7,
                    'Août' => 8,
                    'Septembre' => 9,
                    'Octobre' => 10,
                    'Novembre' => 11,
                    'Decembre' => 12)
                   ))
        ->add('annee',ChoiceType::class,array(
                   'choices' => array('Année' => null,
                    '1981' => 1981,
                    '1982' => 1982,
                    '1983' => 1983,
                    '1984' => 1984,
                    '1985' => 1985,
                    '1986' => 1986,
                    '1987' => 1987,
                    '1988' => 1988,
                    '1989' => 1989,
                    '1990' => 1990,
                    '1991' => 1991,
                    '1992' => 1992,
                    '1993' => 1993,
                    '1994' => 1994,
                    '1995' => 1995,
                    '1996' => 1996,
                    '1997' => 1997,
                    '1998' => 1998,
                    '1999' => 1999,
                    '2000' => 2000,
                    '2001' => 2001,
                    '2002' => 2002,
                    '2003' => 2003,
                    '2004' => 2004,
                    '2005' => 2005,
                    '2006' => 2006,
                    '2007' => 2007,
                    '2008' => 2008
                    )
                   ))
        ->add('ville',TextType::class)
        ->add('sex',ChoiceType::class,array(
                   'choices' => array(
                    'Homme' => true,
                    'Femme' => false)
                   ))
         ->add('categorie',ChoiceType::class,array(
                   'choices' => array(
                    'Formateur' => 'formateur',
                    'Apprenant' => 'apprenant')
                   ))
         ->add('activite',TextType::class)
        ->add('update',SubmitType::class);
        
        }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user';
    }

}
