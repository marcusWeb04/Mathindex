<?php

use App\Entity\File;
use Symfony\Composant\Form\AbstractType;
use Symfony\Composant\Form\Core\Type\FileType;
use Symfony\Component\Form\Extention\Core\Type\Submitype;

final class FileForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', FileType::class, [
                'label' => 'Fiche exercice(PDF,word)*',
            ])
            ->add('name',FileType::class,[
                'label' => 'Fiche corrigé(PDF,word)*',
            ])
            ->add('button', SubmitType::class,[
                'label' => 'Enregistrer',
            ])
        ;
    }
}