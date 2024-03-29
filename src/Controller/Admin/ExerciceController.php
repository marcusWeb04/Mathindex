<?php 

namespace App\Controller\Admin;

use Entity\Repository\Exercice;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExerciceController extends AbstractController
{
    #[Route("/exercice", name:"homeExercice")]
    public function homeExercice(Request $request): Response
    {
        return $this->render('backoffice/exercice/home.html.twig');
    }

    #[Route("/exercice/add", name:"addExercice")]
    public function addExercice(Request $request, EntityManagerInteface $entityManager): Response
    {
        $exercice = new Exercice();

        $form = $this->createForm(ExerciceType::class, $exercice,[
            'method' => 'POST'
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            if ($form->isValid()){
                $entityManager->$persit($exercice);
                $entityManager->flush();
                return $this->redirectToRoute('add.html.twig');
            }
        }

        return $this->render('backoffice/exercice/add.html.twig',[
            'form' => $form,
            'exercice' => $exercice, 
        ]);
    }

    #[Route("/exercice/modify/{id}", name:"modifyExercice")]
    public function modifyExercice(Request $request, Exercice $exercice, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ExerciceType::class, $exercice,[
            'method' => 'POST'
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            if($form->isValid()){
                $entityManager->flush();

                return $this->redirectToRoute('admin_contributeur_moodify',[
                    'id' => $exercice->getId(),
                ]);
            }

            return $this->render('backoffice/exercice/modify.html.twig',[
                'form' => $form,
                'exercice' => $exercice,
            ]);
        }
    }

    #[Route("/exercice/delete/{id}", name:"deleteExercice")]
    public function deleteExercice(Request $request, Exercice $exercice, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ExerciceType::class, $exercice, [
            'method' => 'POST',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $entityManager->flush();

                return $this->redirectToRoute('admin_brand_edit', [
                    'id' => $exercice->getId(),
                ]);
            }
        }

        return $this->render('backoffice/exercice/delete.html.twig', [
            'form' => $form,
            'exercice' => $exercice,
        ]);
    }
}