<?php

namespace App\Controller;

use App\Entity\Compteepsx;
use App\Form\CompteepsxType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/compteepsx")
 */
class CompteepsxController extends AbstractController
{
    /**
     * @Route("/", name="compteepsx_index", methods={"GET"})
     */
    public function index(): Response
    {
        $compteepsxes = $this->getDoctrine()
            ->getRepository(Compteepsx::class)
            ->findAll();

        return $this->render('compteepsx/index.html.twig', [
            'compteepsxes' => $compteepsxes,
        ]);
    }

    /**
     * @Route("/new", name="compteepsx_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $compteepsx = new Compteepsx();
        // Notify the User If The Account is created | 0/1/-1
        $formState = 0;
        $form = $this->createForm(CompteepsxType::class, $compteepsx);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // GENERATING THE ACCOUNT NUMBER | Returns String
            $numAccount = $this->getDoctrine()
            ->getRepository(Compteepsx::class)
            ->generateAccNumber($compteepsx->getHostagency()->getId());

            //SETTING THE NEWLY GENERATED ACCOUNT NUMBER
            $compteepsx->setAccountnumber($numAccount);
            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($compteepsx);
            $entityManager->flush();

            //Testing If Its Successfull
            $row = $compteepsx->getId();
            ($row > 0) ? $formState = 1 : $formState = -1;
            // return $this->redirectToRoute('compteepsx_index');
        }
        
            // echo "\n==============\n\n";
            // var_dump($compteepsx->getAccountnumber());
            // die();

        return $this->render('compteepsx/new.html.twig', [
            'compteepsx' => $compteepsx,
            'form' => $form->createView(),
            'formState' => $formState,
        ]);
    }

    /**
     * @Route("/{id}", name="compteepsx_show", methods={"GET"})
     */
    public function show(Compteepsx $compteepsx): Response
    {
        return $this->render('compteepsx/show.html.twig', [
            'compteepsx' => $compteepsx,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="compteepsx_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Compteepsx $compteepsx): Response
    {
        $form = $this->createForm(CompteepsxType::class, $compteepsx);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('compteepsx_index');
        }

        return $this->render('compteepsx/edit.html.twig', [
            'compteepsx' => $compteepsx,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="compteepsx_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Compteepsx $compteepsx): Response
    {
        if ($this->isCsrfTokenValid('delete'.$compteepsx->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($compteepsx);
            $entityManager->flush();
        }

        return $this->redirectToRoute('compteepsx_index');
    }
}
