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

class HomeController extends AbstractController
{

    /**
     * @Route("/EventsAndPeople", name="EventsAndPeople")
     */
    public function EventsAndPeople()
    {
        return $this->render('Home/EventsAndPeople.html.twig');
    }
    /**
     * @Route("/")
     */
    public function Redirecting()
    {
        return $this->redirectToRoute('EventsAndPeople');
    }
}