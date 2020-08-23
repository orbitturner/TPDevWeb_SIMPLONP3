<?php

namespace App\Controller;

use App\Entity\Clientphysique;
use App\Form\ClientphysiqueType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/clientphysique")
 */
class ClientphysiqueController extends AbstractController
{
    /**
     * @Route("/", name="clientphysique_index", methods={"GET"})
     */
    public function index(): Response
    {
        $clientphysiques = $this->getDoctrine()
            ->getRepository(Clientphysique::class)
            ->findAll();

        return $this->render('clientphysique/index.html.twig', [
            'clientphysiques' => $clientphysiques,
        ]);
    }

    /**
     * @Route("/new", name="clientphysique_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $clientphysique = new Clientphysique();
        $form = $this->createForm(ClientphysiqueType::class, $clientphysique);
        $form->handleRequest($request);
        // Notify the User If The Client is created | 0/1/-1
        if(isset($_GET['formState'])){
            $formState = $_GET['formState'];
        }else{
            $formState = 0;
        }
        // Generate an Client Number 
        $numClient = $this->getDoctrine()
        ->getRepository(Clientphysique::class)
        ->physiqueNumGen();
        if ($form->isSubmitted() && $form->isValid()) {
            //Settint The Client Number & Creation date
            // $dateCreate = Date('Y-m-d H:i');
            $clientphysique->setNumid($numClient); 
            $clientphysique->setDatecreation(Date('Y-m-d H:i')); 
        
            // PERSISTING
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($clientphysique);
            $entityManager->flush();

            //Testing If Its Successfull
            $row = $clientphysique->getId();
            ($row > 0) ? $formState = 1 : $formState = -1;
            return $this->redirectToRoute('clientphysique_new',['formState' => $formState]);
        }

        return $this->render('clientphysique/new.html.twig', [
            'clientphysique' => $clientphysique,
            'form' => $form->createView(),
            'formState' => $formState,
            'numClient' => $numClient,
        ]);
    }

    /**
     * @Route("/{id}", name="clientphysique_show", methods={"GET"})
     */
    public function show(Clientphysique $clientphysique): Response
    {
        return $this->render('clientphysique/show.html.twig', [
            'clientphysique' => $clientphysique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="clientphysique_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Clientphysique $clientphysique): Response
    {
        $form = $this->createForm(ClientphysiqueType::class, $clientphysique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('clientphysique_index');
        }

        return $this->render('clientphysique/edit.html.twig', [
            'clientphysique' => $clientphysique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="clientphysique_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Clientphysique $clientphysique): Response
    {
        if ($this->isCsrfTokenValid('delete'.$clientphysique->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($clientphysique);
            $entityManager->flush();
        }

        return $this->redirectToRoute('clientphysique_index');
    }
}
