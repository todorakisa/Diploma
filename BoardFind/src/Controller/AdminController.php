<?php

namespace App\Controller;

use App\Entity\TradeOffer;
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
     * @Route("/BoardFind/Admin/AllOffers", name="AllOffers")
     */
    public function adminPanelOffers()
    {
        $Offers = $this->getDoctrine()
            ->getRepository(TradeOffer::class)->findAll();
        return $this->render('Home/ListOffersAdmin.html.twig', array(
            "arrayOfOffers" => $Offers,
        ));
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
     * @Route("/BoardFind/Admin/DeleteUser/{id}", name="AdminDeleteUser")
     */
    public function adminPanelUserDelete($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository("App:User")
            ->find($id);
        $user->setIsDeleted(true);
        $entityManager->flush();
        return $this->redirectToRoute('AllUsers');
    }

    /**
     * @Route("/BoardFind/Admin/DeleteOffer/{id}", name="DeleteOffer")
     */
    public function adminPanelOfferDelete($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $offer = $entityManager->getRepository("App:TradeOffer")
            ->find($id);
        $offer->setIsDeleted(true);
        $entityManager->flush();
        return $this->redirectToRoute('AllOffers');
    }
}