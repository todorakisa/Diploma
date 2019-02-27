<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Event;
use App\Form\EventType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Common\Collections\ArrayCollection;

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
                ->getRepository(User::class)->find($userId);;
            $Event->setIsDeleted(false);
            $Event->setUser($user);

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
        $arrayUsernames = new ArrayCollection();
        $arrayOfParticipants = $event->getParticipants();
        foreach($arrayOfParticipants->getIterator() as $i => $item) {
            $arrayUsernames->add($item->getUsername());
        }
        return $this->render('Home/EventDetails.html.twig', array(
            "Event" => $event,
            "Owner" => $event->getUser()->getUsername(),
            "OwnerEmail" => $event->getUser()->getEmail(),
            "arrayOfUsernames" => $arrayUsernames,
        ));
    }

    /**
     * @Route("/BoardFind/Event/Participate/{id}", name="addParticipant")
     */
    public function addingParticipantsToEvent($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $event = $entityManager->getRepository("App:Event")
            ->find($id);
        $userId = $this->get('session')->get('id');
        $user = $entityManager->getRepository("App:User")
            ->find($userId);
        $event->addParticipant($user);
        $user->addParticipationOnEvent($event);
        $entityManager->flush();
        $flashbag = $this->get('session')->getFlashBag();
        $flashbag->add("SuccessfullRegistrationForEvent", "You successfully joined in this event, enjoy!");
        return $this->redirect('/BoardFind/Event/' . $id);
    }
}