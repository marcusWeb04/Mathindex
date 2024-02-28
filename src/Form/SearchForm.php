<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Composant\Form\AbstractType;
use Symfony\Composant\Form\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extention\Core\Type\Submitype;

final class SearchForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Search', TextType::class, [
                'label' => 'Rechercher un contributeur par nom, prénom ou email :',
            ])
            ->add('button', SubmitType::class,[
                'label' => 'Rechercher',
            ])
        ;
    }
}