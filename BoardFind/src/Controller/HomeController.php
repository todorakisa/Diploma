<?php
//
//namespace App\Controller;
//
//use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Symfony\Component\Routing\Annotation\Route;
//use Symfony\Component\HttpFoundation\Response;
//
//class HomeController extends AbstractController
//{
//    /**
//     * @Route("/home", name="home")
//     */
//    public function number()
//    {
//        $number = random_int(0, 100);
//
//        return new Response(
//            '<html><body>Lucky number: '.$number.'</body></html>'
//        );
//    }
//}
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class HomeController extends AbstractController
{

    /**
     * @Route("/EventsAndPeople", name="EventsAndPeople")
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
        return $this->redirectToRoute('EventsAndPeople');
    }

    /**
     * @Route("/EventsAndPeople/Home", name="Home")
     */
    public function homePage()
    {
        return $this->render('Home/Home.html.twig');
    }

    /**
     * @Route("/EventsAndPeople/About", name="About")
     */
    public function aboutPage()
    {
        return $this->render('Home/About.html.twig');
    }

    /**
     * @Route("/EventsAndPeople/Account", name="Account")
     */
    public function accountPage()
    {
        return $this->render('Home/Account.html.twig');
    }

    /**
     * @Route("/EventsAndPeople/Trade", name="Trade")
     */
    public function tradePage()
    {
        return $this->render('Home/ListOffers.html.twig');
    }
}