<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Composant\Form\AbstractType;
use Symfony\Composant\Form\Core\Type\TextType;
use Symfony\Composant\Form\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Composant\Form\Core\Type\PasswordType;
use Symfony\Component\Form\Extention\Core\Type\Submitype;

final class ConnectionForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email :',
                'attr' => [
                    'placeholder' => 'Saisissez votre adresse email'
                ],
            ])
            ->add('mot de passe',PasswordType::class,[
                'label' => 'Mot de passe :',
                'attr' => [
                    'placeholder' => 'Saisissez votre mot de passe'
                ],
                
            ] )
            ->add('button', SubmitType::class,[
                'label' => 'Connexion',
            ])
        ;
    }
}