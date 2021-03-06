<?php

namespace App\Controller;

use App\Entity\Lot;
use App\Form\LotEncherirType;
use App\Form\LotType;
use App\Repository\LotRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

/**
 * @Route("/lot")
 */
class LotController extends AbstractController
{
    /**
     * @Route("/", name="lot_index", methods={"GET"})
     */
    public function index(LotRepository $lotRepository): Response
    {
        return $this->render('lot/index.html.twig', [
            'lots' => $lotRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="lot_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $lot = new Lot();
        $form = $this->createForm(LotType::class, $lot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lot);
            $entityManager->flush();

            return $this->redirectToRoute('lot_index');
        }

        return $this->render('lot/new.html.twig', [
            'lot' => $lot,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lot_show", methods={"GET"})
     */
    public function show(Lot $lot): Response
    {
        return $this->render('lot/show.html.twig', [
            'lot' => $lot,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="lot_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Lot $lot): Response
    {
        $form = $this->createForm(LotType::class, $lot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lot_index');
        }

        return $this->render('lot/edit.html.twig', [
            'lot' => $lot,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lot_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Lot $lot): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lot->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($lot);
            $entityManager->flush();
        }

        return $this->redirectToRoute('lot_index');
    }

    /**
     * @Route("/{id}/encherirlot", name="lot_encherir", methods={"GET","POST"})
     */
    public function encherirLot(Request $request, Lot $lot): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $best = $lot->getPrixEnchere();
        $form = $this->createForm(LotEncherirType::class, $lot);
        $user = $this->getUser();
        $form->get('acheteur')->setData($user->getUsername());
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid() && $form["prixEnchere"]->getData()>$best) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lot_index');
        }

        return $this->render('lot/addPrixEnchere.html.twig', [
            'lot' => $lot,
            'form' => $form->createView(),
        ]);
    }

}
