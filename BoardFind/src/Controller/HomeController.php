<?php

namespace App\Controller;

use App\Entity\Event;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class HomeController extends AbstractController
{

    /**
     * @Route("/BoardFind/EventsAndPeople", name="Events")
     */
    public function eventsAndPeople()
    {
        $Events = $this->getDoctrine()
            ->getRepository(Event::class)->findAll();
        return $this->render('Home/EventsAndPeople.html.twig', array(
            "arrayOfEvents" => $Events,
        ));
    }

    /**
     * @Route("/")
     */
    public function redirecting()
    {
        return $this->redirectToRoute('Home');
    }

    /**
     * @Route("/BoardFind")
     */
    public function redirectingToHome()
    {
        return $this->redirectToRoute('Home');
    }

    /**
     * @Route("/BoardFind/Home", name="Home")
     */
    public function homePage()
    {
        return $this->render('Home/Home.html.twig');
    }

    /**
     * @Route("/BoardFind/About", name="About")
     */
    public function aboutPage()
    {
        return $this->render('Home/About.html.twig');
    }

    /**
     * @Route("/BoardFind/Account", name="Account")
     */
    public function accountPage()
    {
        return $this->render('Home/Account.html.twig');
    }

}