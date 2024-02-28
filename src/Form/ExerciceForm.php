<?php

use App\Entity\File;
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
            ->add('name', TextType::class, [
                'label' => 'Nom de l\'exercice*',
                'attr' => ['placeholder' => 'Nom de l\'exercice'],
                'required' => true,
            ])
            ->add('matiere',ChoiceType::class,[
                'label' => 'Matiére*',
            ])
            ->add('classe',FileType::class,[
                'label' => 'Classe*',
            ])
            ->add('thematique',FileType::class,[
                'label' => 'Thématique*',
            ])
            ->add('chapitre',TextType::class,[
                'label' => 'Chapitre du cours',
                'attr' => ['placeholder' => 'Chapitre du cours'],
                'required' => true,
            ])
            ->add('competence', ChoiceType::class, [
                'label' => 'Compétence',
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'Chercher' => '1',
                    'Représenter' => '2',
                    'Calculer' => '3',
                    'Modéliser' => '4',
                    'Raisonner' => '5',
                    'Communiquer' => '6',
                ],
            ])
            ->add('Difficulté', ChoiceType::class, [
                'label' => 'Difficulté *:',
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'Chercher' => '1',
                    'Représenter' => '2',
                    'Calculer' => '3',
                    'Modéliser' => '4',
                    'Raisonner' => '5',
                    'Communiquer' => '6',
                ],
            ])
            ->add('name', TextType::class, [
                'label' => 'Durée',
            ])
            ->add('button', SubmitType::class,[
                'label' => 'Continuer',
            ])
        ;
    }
}