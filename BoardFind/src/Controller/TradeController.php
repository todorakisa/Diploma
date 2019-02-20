<?php

namespace App\Controller;

use App\Entity\TradeOffer;
use App\Entity\User;
use App\Form\OfferType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class TradeController extends AbstractController
{
    /**
     * @Route("/BoardFind/Trade", name="Trade")
     */
    public function tradePage()
    {
        $Offers = $this->getDoctrine()
            ->getRepository(TradeOffer::class)->findAll();
        return $this->render('Home/ListOffers.html.twig', array(
        "arrayOfOffers" => $Offers,
        ));
    }

    /**
     * @Route("/BoardFind/Offer/{id}", name="Details")
     */
    public function seeingOffer($id)
    {
        $offer = $this->getDoctrine()
            ->getRepository(TradeOffer::class)->find($id);
        return $this->render('Home/OfferDetails.html.twig', array(
        "Offer" => $offer,
        ));
    }

    /**
     * @Route("/BoardFind/Trade/RegisterOffer", name="RegisterOffer")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function register(Request $request)
    {
        $Offer = new TradeOffer();
        $form = $this->createForm(OfferType::class, $Offer);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $Offer = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();

            $session = $this->get('session');
            $userId = $session->get("id");
            $user = $this->getDoctrine()
                ->getRepository(User::class)->find($userId);
            $Offer->setUser($user);
            $Offer->setIsDeleted(false);

            $entityManager->persist($Offer);
            $entityManager->flush();

            $flashbag = $this->get('session')->getFlashBag();
            $flashbag->add("SuccessfullRegister", "You successfully registered your offer!");
            return $this->redirectToRoute('Trade');
        }

        return $this->render('home/RegisterOffer.html.twig', array(
            'form' => $form->createView(),
        ));

    }
}