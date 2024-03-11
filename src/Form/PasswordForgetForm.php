<?php

use App\Entity\User;
use Symfony\Composant\Form\AbstractType;
use Symfony\Composant\Form\Core\Type\FileType;
use Symfonu\Composant\Form\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extention\Core\Type\Submitype;

final class ExerciceForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', TextType::class, [
                'label' => 'Veillez entrer votre email*',
                'attr' => ['placeholder' => 'Votre email'],
                'required' => true,
            ])
            ->add('button', SubmitType::class,[
                'label' => 'Envoyer',
            ])
        ;
    }
}