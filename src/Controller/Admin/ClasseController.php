<?php 

namespace App\Controller\Admin;

use Entity\Repository\Classroom;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClasseController extends AbstractController
{
    #[Route("/class", name:"homeclass")]
    public function homeclass(Request $request): Response
    {
        return $this->render('backoffice/classe/home.html.twig');
    }

    #[Route("/classe/add", name:"addclass")]
    public function addclass(Request $request, EntityManagerInteface $entityManager): Response
    {
        $class = new Classroom();

        $form = $this->createForm(ClassroomType::class, $class,[
            'method' => 'POST'
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            if ($form->isValid()){
                $entityManager->$persit($class);
                $entityManager->flush();
                return $this->redirectToRoute('add.html.twig');
            }
        }

        return $this->render('backoffice/classe/add.html.twig',[
            'form' => $form,
            'class' => $class, 
        ]);
    }

    #[Route("/classe/modify/{id}", name:"modifyclass")]
    public function modifyclass(Request $request, Classroom $class, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ClassroomType::class, $class,[
            'method' => 'POST'
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            if($form->isValid()){
                $entityManager->flush();

                return $this->redirectToRoute('admin_contributeur_moodify',[
                    'id' => $class->getId(),
                ]);
            }

            return $this->render('backoffice/classe/modify.html.twig',[
                'form' => $form,
                'class' => $class,
            ]);
        }
    }

    #[Route("/classe/delete/{id}", name:"deleteclass")]
    public function deleteclass(Request $request, Classroom $class, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ClassroomType::class, $class, [
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

        return $this->render('backoffice/classe/delete.html.twig', [
            'form' => $form,
            'class' => $class,
        ]);
    }
}