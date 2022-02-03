<?php

namespace App\Controller;


use App\Entity\Agents;
use App\Form\AgentsType;
use App\Entity\Collectivites;
use App\Form\CollectivitesType;
use App\Entity\Extranets;
use App\Form\ExtranetsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $data = $this->getDoctrine()->getRepository(Agents::class)->findAll();
        return $this->render('main/index.html.twig', [
            'list' => $data
        ]);
    }
    #[Route('create', name: 'create')]
    public function create(Request $request)
    {
        $agent = new Agents();
        $form = $this->createForm(AgentsType::class, $agent);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($agent);
            $em->flush();

            $this->addFlash('notice', 'Validé avec succès !!');

            return $this->redirectToRoute('home');
        }
        return $this->render('main/create.html.twig', [
            'form' => $form->createView()
        ]);

        $collectivite = new Collectivites();
        $form = $this->createForm(CollectivitesType::class, $collectivite);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($collectivite);
            $em->flush();

            $this->addFlash('notice', 'Validé avec succès !!');

            return $this->redirectToRoute('home');
        }
        return $this->render('main/create.html.twig', [
            'form' => $form->createView()
        ]);

        $extranet = new Extranets();
        $form = $this->createForm(ExtranetsType::class, $extranet);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($extranet);
            $em->flush();

            $this->addFlash('notice', 'Validé avec succès !!');

            return $this->redirectToRoute('home');
        }
        return $this->render('main/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
    #[Route('/update/{id}', name: 'update')]
    public function update(Request $request, $id)
    {
        $agent = $this->getDoctrine()->getRepository(Agents::class)->find($id);
        $form = $this->createForm(AgentsType::class, $agent);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($agent);
            $em->flush();

            $this->addFlash('notice', 'Mis à jour avec succès !!');

            return $this->redirectToRoute('home');
        }
        return $this->render('main/update.html.twig', [
            'form' => $form->createView()
        ]);

        $collectivite = $this->getDoctrine()->getRepository(Collectivites::class)->find($id);
        $form = $this->createForm(CollectivitesType::class, $collectivite);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($collectivite);
            $em->flush();

            $this->addFlash('notice', 'Mis à jour avec succès !!');

            return $this->redirectToRoute('home');
        }
        return $this->render('main/update.html.twig', [
            'form' => $form->createView()
        ]);

        $extranet = $this->getDoctrine()->getRepository(Extanets::class)->find($id);
        $form = $this->createForm(ExtranetsType::class, $extranet);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($extranet);
            $em->flush();

            $this->addFlash('notice', 'Mis à jour avec succès !!');

            return $this->redirectToRoute('home');
        }
        return $this->render('main/update.html.twig', [
            'form' => $form->createView()
        ]);
    }
    #[Route('/delate/{id}', name: 'delete')]
    public function delete($id)
    {
        $data = $this->getDoctrine()->getRepository(Agents::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();

        $this->addFlash('notice', 'Suppression effectué avec succès !!');

        $data = $this->getDoctrine()->getRepository(Collectivites::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();

        $this->addFlash('notice', 'Suppression effectué avec succès !!');

        $data = $this->getDoctrine()->getRepository(Extranets::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($data);
        $em->flush();

        $this->addFlash('notice', 'Suppression effectué avec succès !!');

        return $this->redirectToRoute('home');
    }
}
