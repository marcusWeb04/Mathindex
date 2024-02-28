<?php 

namespace App\Controller\Admin;

use Entity\Repository\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContributorController extends AbstractController
{
    #[Route("/contributor", name:"home")]
    public function home(Request $request): Response
    {
        return $this->render('backoffice/contributor/home.html.twig');
    }

    #[Route("/contributor/add", name:"addContributor")]
    public function addContributor(Request $request, EntityManagerInteface $entityManager): Response
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user,[
            'method' => 'POST'
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            if ($form->isValid()){
                $entityManager->$persit($user);
                $entityManager->flush();
                return $this->redirectToRoute('home.html.twig');
            }
        }

        return $this->render('backoffice/contributor/add.html.twig',[
            'form' => $form,
            'user' => $user, 
        ]);
    }

    #[Route("/contributor/modify/{id}", name:"modifyContributor")]
    public function modifyContributor(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UserType::class, $user,[
            'method' => 'POST'
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            if($form->isValid()){
                $entityManager->flush();

                return $this->redirectToRoute('admin_contributeur_moodify',[
                    'id' => $user->getId(),
                ]);
            }

            return $this->render('backoffice/contributor/modify.html.twig',[
                'form' => $form,
                'user' => $user,
            ]);
        }
    }

    #[Route("/contributor/delete/{id}", name:"deleteContributor")]
    public function deleteContributor(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContributorType::class, $user, [
            'method' => 'POST',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $entityManager->flush();

                return $this->redirectToRoute('admin_brand_edit', [
                    'id' => $user->getId(),
                ]);
            }
        }

        return $this->render('backoffice/contributor/delete.html.twig', [
            'form' => $form,
            'user' => $user,
        ]);
    }
}