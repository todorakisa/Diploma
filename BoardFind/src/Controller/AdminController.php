<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class AdminController extends AbstractController
{
    /**
     * @Route("/BoardFind/Admin", name="AdminPanel")
     */
    public function adminPanel()
    {
        return $this->render('Home/Admin.html.twig');
    }

    /**
     * @Route("/BoardFind/Admin/AllUsers", name="AllUsers")
     */
    public function adminPanelUsers()
    {
        $Users = $this->getDoctrine()
            ->getRepository(User::class)->findAll();
        return $this->render('Home/ListUsers.html.twig', array(
            "arrayOfUsers" => $Users,
        ));
    }

    /**
     * @Route("/BoardFind/Admin/DeleteUser/{id}", name="DeleteUser")
     */
    public function adminPanelUserDelete()
    {
        $offer = $this->getDoctrine()
            ->getRepository(TradeOffer::class)->find($id);

        return $this->redirectToRoute('AllUsers');
    }

    /**
     * @Route("/BoardFind/Admin/AllOffers", name="AllOffers")
     */
    public function adminPanelOffers()
    {
        return $this->render('Home/Admin.html.twig');
    }
}