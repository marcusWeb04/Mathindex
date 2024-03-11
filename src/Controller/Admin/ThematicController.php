<?php 

namespace App\Controller\Admin;

use Entity\Repository\Thematic;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ThematicController extends AbstractController
{
    #[Route("/thematic", name:"homeThematic")]
    public function homeThematic(Request $request): Response
    {
        return $this->render('backoffice/thematic/home.html.twig');
    }

    #[Route("/thematic/add", name:"addThematic")]
    public function addThematic(Request $request, EntityManagerInteface $entityManager): Response
    {
        $skill = new Skill();

        $form = $this->createForm(ThematicType::class, $thematic,[
            'method' => 'POST'
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            if ($form->isValid()){
                $entityManager->$persit($thematic);
                $entityManager->flush();
                return $this->redirectToRoute('add.html.twig');
            }
        }

        return $this->render('backoffice/thematic/add.html.twig',[
            'form' => $form,
            'thematic' => $thematic, 
        ]);
    }

    #[Route("/thematic/modify/{id}", name:"modifyThematic")]
    public function modifyThematic(Request $request, Thematic $thematic, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ThematicType::class, $thematic,[
            'method' => 'POST'
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            if($form->isValid()){
                $entityManager->flush();

                return $this->redirectToRoute('admin_contributeur_moodify',[
                    'id' => $thematic->getId(),
                ]);
            }

            return $this->render('backoffice/thematic/modify.html.twig',[
                'form' => $form,
                'thematic' => $thematic,
            ]);
        }
    }

    #[Route("/skill/delete/{id}", name:"deleteThematic")]
    public function deleteThematic(Request $request, Thematic $thematic, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ThematicType::class, $thematic, [
            'method' => 'POST',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $entityManager->flush();

                return $this->redirectToRoute('admin_brand_edit', [
                    'id' => $thematic->getId(),
                ]);
            }
        }

        return $this->render('backoffice/skill/delete.html.twig', [
            'form' => $form,
            'thematic' => $thematic,
        ]);
    }
}