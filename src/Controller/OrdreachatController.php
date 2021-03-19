<?php

namespace App\Controller;

use App\Entity\Ordreachat;
use App\Form\OrdreachatType;
use App\Repository\OrdreachatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ordreachat")
 */
class OrdreachatController extends AbstractController
{
    /**
     * @Route("/", name="ordreachat_index", methods={"GET"})
     */
    public function index(OrdreachatRepository $ordreachatRepository): Response
    {
        return $this->render('ordreachat/index.html.twig', [
            'ordreachats' => $ordreachatRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ordreachat_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ordreachat = new Ordreachat();
        $form = $this->createForm(OrdreachatType::class, $ordreachat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ordreachat);
            $entityManager->flush();

            return $this->redirectToRoute('ordreachat_index');
        }

        return $this->render('ordreachat/new.html.twig', [
            'ordreachat' => $ordreachat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ordreachat_show", methods={"GET"})
     */
    public function show(Ordreachat $ordreachat): Response
    {
        return $this->render('ordreachat/show.html.twig', [
            'ordreachat' => $ordreachat,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ordreachat_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Ordreachat $ordreachat): Response
    {
        $form = $this->createForm(OrdreachatType::class, $ordreachat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ordreachat_index');
        }

        return $this->render('ordreachat/edit.html.twig', [
            'ordreachat' => $ordreachat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ordreachat_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Ordreachat $ordreachat): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ordreachat->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ordreachat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ordreachat_index');
    }
}
