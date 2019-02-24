<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Event;
use App\Form\EventType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EventController extends AbstractController
{
    /**
     * @Route("/BoardFind/EventsAndPeople/RegisterEvent", name="RegisterEvent")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function register(Request $request)
    {
        $Event = new Event();
        $form = $this->createForm(EventType::class, $Event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $Event = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();

            $session = $this->get('session');
            $userId = $session->get("id");
            $user = $this->getDoctrine()
                ->getRepository(User::class)->find($userId);
            $Event->setEventOwnerId($user->getId());
            $Event->setIsDeleted(false);

            $entityManager->persist($Event);
            $entityManager->flush();

            $flashbag = $this->get('session')->getFlashBag();
            $flashbag->add("SuccessfullRegister", "You successfully registered your event!");
            return $this->redirectToRoute('Events');
        }

        return $this->render('home/RegisterEvent.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    /**
     * @Route("/BoardFind/EventsAndPeople/AllEvents", name="AllEvents")
     */
    public function allEvents()
    {
        return $this->render('Home/EventsAndPeople.html.twig');
    }

    /**
     * @Route("/BoardFind/Event/{id}", name="EventDetails")
     */
    public function seeingEvent($id)
    {
        $event = $this->getDoctrine()
            ->getRepository(Event::class)->find($id);
        return $this->render('Home/EventDetails.html.twig', array(
            "Event" => $event,
        ));
    }
}