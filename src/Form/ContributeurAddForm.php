<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Composant\Form\AbstractType;
use Symfony\Composant\Form\Core\Type\TextType;
use Symfony\Composant\Form\Core\Type\EmailType;
use Symfonu\Composant\Form\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Composant\Form\Core\Type\PasswordType;
use Symfony\Component\Form\Extention\Core\Type\Submitype;

final class ContributeurAjoutForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom', TextType::class, [
                'label' => 'Nom :',
                'attr' => [
                    'placeholder' => 'Saisir le nom du contributeur'
                ],
            ])
            ->add('Prénom',PasswordType::class,[
                'label' => 'Prénom :',
                'attr' => [
                    'placeholder' => 'Saisissez votre mot de passe'
                ],
            ])
            ->add('Email',PasswordType::class,[
                'label' => 'Email :',
                'attr' => [
                    'placeholder' => 'Saisissez l\'email'
                ],
            ])
            ->add('Mot de passe',PasswordType::class,[
                'label' => 'Mot de passe :',
                'attr' => [
                    'placeholder' => 'Saisissez le mot de passe'
                ],
            ])
            ->add('Role', ChoiceType::class, [
                'label' => 'Role',
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'Enseignement' => 'Enseignement',
                    'Eleve' => 'Eleve',
                ],
            ])
            ->add('button', SubmitType::class,[
                'label' => 'Enregistrer',
            ])
        ;
    }
}