<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class HomeController extends AbstractController
{

    /**
     * @Route("/BoardFind", name="BoardFind")
     */
    public function eventsAndPeople()
    {
        return $this->render('Home/EventsAndPeople.html.twig');
    }

    /**
     * @Route("/")
     */
    public function redirecting()
    {
        return $this->redirectToRoute('BoardFind');
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