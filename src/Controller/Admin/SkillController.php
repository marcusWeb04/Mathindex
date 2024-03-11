<?php 

namespace App\Controller\Admin;

use Entity\Repository\Skill;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SkillController extends AbstractController
{
    #[Route("/skill", name:"homeSkill")]
    public function homeSkill(Request $request): Response
    {
        return $this->render('backoffice/skill/home.html.twig');
    }

    #[Route("/skill/add", name:"addSkill")]
    public function addSkill(Request $request, EntityManagerInteface $entityManager): Response
    {
        $skill = new Skill();

        $form = $this->createForm(SkillType::class, $skill,[
            'method' => 'POST'
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            if ($form->isValid()){
                $entityManager->$persit($skill);
                $entityManager->flush();
                return $this->redirectToRoute('add.html.twig');
            }
        }

        return $this->render('backoffice/origin/add.html.twig',[
            'form' => $form,
            'origin' => $origin, 
        ]);
    }

    #[Route("/skill/modify/{id}", name:"modifySkill")]
    public function modifySkill(Request $request, Skill $skill, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SkillType::class, $skill,[
            'method' => 'POST'
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            if($form->isValid()){
                $entityManager->flush();

                return $this->redirectToRoute('admin_contributeur_moodify',[
                    'id' => $skill->getId(),
                ]);
            }

            return $this->render('backoffice/skill/modify.html.twig',[
                'form' => $form,
                'skill' => $skill,
            ]);
        }
    }

    #[Route("/skill/delete/{id}", name:"deleteSkill")]
    public function deleteSkill(Request $request, Skill $skill, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SkillType::class, $skill, [
            'method' => 'POST',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $entityManager->flush();

                return $this->redirectToRoute('admin_brand_edit', [
                    'id' => $skill->getId(),
                ]);
            }
        }

        return $this->render('backoffice/skill/delete.html.twig', [
            'form' => $form,
            'skill' => $skill,
        ]);
    }
}