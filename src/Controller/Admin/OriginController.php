<?php 

namespace App\Controller\Admin;

use Entity\Repository\Origine;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OriginController extends AbstractController
{
    #[Route("/origin", name:"home")]
    public function home(Request $request): Response
    {
        return $this->render('backoffice/origin/home.html.twig');
    }

    #[Route("/origin/add", name:"add")]
    public function addContributor(Request $request, EntityManagerInteface $entityManager): Response
    {
        $origin = new Origine();

        $form = $this->createForm(OrigineType::class, $origin,[
            'method' => 'POST'
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            if ($form->isValid()){
                $entityManager->$persit($origin);
                $entityManager->flush();
                return $this->redirectToRoute('add.html.twig');
            }
        }

        return $this->render('backoffice/origin/add.html.twig',[
            'form' => $form,
            'origin' => $origin, 
        ]);
    }

    #[Route("/matiere/modify/{id}", name:"modify")]
    public function modifyContributor(Request $request, Origin $origin, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OriginType::class, $origin,[
            'method' => 'POST'
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            if($form->isValid()){
                $entityManager->flush();

                return $this->redirectToRoute('admin_contributeur_moodify',[
                    'id' => $origin->getId(),
                ]);
            }

            return $this->render('backoffice/origin/modify.html.twig',[
                'form' => $form,
                'origin' => $origin,
            ]);
        }
    }

    #[Route("/origin/delete/{id}", name:"delete")]
    public function deleteContributor(Request $request, Origine $origin, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OrigineType::class, $origin, [
            'method' => 'POST',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $entityManager->flush();

                return $this->redirectToRoute('admin_brand_edit', [
                    'id' => $origin->getId(),
                ]);
            }
        }

        return $this->render('backoffice/origin/delete.html.twig', [
            'form' => $form,
            'origin' => $origin,
        ]);
    }
}