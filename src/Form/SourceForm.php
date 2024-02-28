<?php

namespace App\Form;

use App\Entity\Exercice;
use Symfony\Composant\Form\AbstractType;
use Symfony\Composant\Form\Core\Type\TextType;
use Symfony\Composant\Form\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Composant\Form\Core\Type\PasswordType;
use Symfony\Component\Form\Extention\Core\Type\Submitype;

final class SourceForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Origine', ChoiceType::class, [
                'label' => 'Email :',
            ])
            ->add('Ou proposé par un',ChoiceType::class,[
                'label' => 'Mot de passe :',
            ])
            ->add('Nom du livre/Lien du site',TextType::class,[
                'label' => 'Mot de passe :',
            ])
            ->add('Informations complémentaire',TextType::class,[
                'label' => 'Mot de passe :',
            ])
            ->add('Nom :',TextType::class,[
                'label' => 'Mot de passe :',
            ])
            ->add('Prénom :',TextType::class,[
                'label' => 'Mot de passe :',
            ])
            ->add('button', SubmitType::class,[
                'label' => 'Continuer',
            ])
        ;
    }
}