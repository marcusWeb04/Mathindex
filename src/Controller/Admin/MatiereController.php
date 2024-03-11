<?php 

namespace App\Controller\Admin;

use Entity\Repository\Course;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MatiereController extends AbstractController
{
    #[Route("/matiere", name:"homeMatiere")]
    public function homeMatiere(Request $request): Response
    {
        return $this->render('backoffice/matiere/home.html.twig');
    }

    #[Route("/matiere/add", name:"addMatiere")]
    public function addMatiere(Request $request, EntityManagerInteface $entityManager): Response
    {
        $matiere = new Course();

        $form = $this->createForm(CourseType::class, $matiere,[
            'method' => 'POST'
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            if ($form->isValid()){
                $entityManager->$persit($matiere);
                $entityManager->flush();
                return $this->redirectToRoute('add.html.twig');
            }
        }

        return $this->render('backoffice/matiere/add.html.twig',[
            'form' => $form,
            'matiere' => $matiere, 
        ]);
    }

    #[Route("/matiere/modify/{id}", name:"modifyMatiere")]
    public function modifyMatiere(Request $request, Course $matiere, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MatiereType::class, $matiere,[
            'method' => 'POST'
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            if($form->isValid()){
                $entityManager->flush();

                return $this->redirectToRoute('admin_contributeur_moodify',[
                    'id' => $matiere->getId(),
                ]);
            }

            return $this->render('backoffice/matiere/modify.html.twig',[
                'form' => $form,
                'matiere' => $matiere,
            ]);
        }
    }

    #[Route("/matiere/delete/{id}", name:"deleteMatiere")]
    public function deleteMatiere(Request $request, Course $matiere, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MatiereType::class, $matiere, [
            'method' => 'POST',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $entityManager->flush();

                return $this->redirectToRoute('admin_brand_edit', [
                    'id' => $matiere->getId(),
                ]);
            }
        }

        return $this->render('backoffice/matiere/delete.html.twig', [
            'form' => $form,
            'matiere' => $matiere,
        ]);
    }
}