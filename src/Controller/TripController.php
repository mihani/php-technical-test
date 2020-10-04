<?php

namespace App\Controller;

use App\Entity\Trip;
use App\Factory\TripFactory;
use App\Form\TripType;
use App\Repository\TripRepository;
use App\Utils\DurationUtils;
use App\Utils\TripUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/trip")
 */
class TripController extends AbstractController
{
    /**
     * @Route("", name="trip_index", methods={"GET"})
     */
    public function index(TripRepository $tripRepository): Response
    {
        return $this->render('trip/index.html.twig', [
            'trips' => $tripRepository->findBy([
                'user' => $this->getUser()
            ]),
        ]);
    }

    /**
     * @Route("/new", name="trip_new", methods={"GET","POST"})
     */
    public function new(Request $request, TripFactory $tripFactory): Response
    {
        $trip = new Trip();
        $form = $this->createForm(TripType::class, $trip);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trip->setUser($this->getUser());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tripFactory->updateSpeedPaceTrip($trip));
            $entityManager->flush();

            return $this->redirectToRoute('trip_index');
        }

        return $this->render('trip/new.html.twig', [
            'trip' => $trip,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="trip_show", methods={"GET"})
     */
    public function show(Trip $trip): Response
    {
        if($trip->getUser() !== $this->getUser()){
            return $this->redirectToRoute('trip_index');
        }

        return $this->render('trip/show.html.twig', [
            'trip' => $trip,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="trip_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Trip $trip, TripFactory $tripFactory): Response
    {
        if($trip->getUser() !== $this->getUser()){
            return $this->redirectToRoute('trip_index');
        }

        $form = $this->createForm(TripType::class, $trip);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tripFactory->updateSpeedPaceTrip($trip);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('trip_index');
        }

        return $this->render('trip/edit.html.twig', [
            'trip' => $trip,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="trip_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Trip $trip): Response
    {
        if($trip->getUser() !== $this->getUser()){
            return $this->redirectToRoute('trip_index');
        }

        if ($this->isCsrfTokenValid('delete'.$trip->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($trip);
            $entityManager->flush();
        }

        return $this->redirectToRoute('trip_index');
    }
}
