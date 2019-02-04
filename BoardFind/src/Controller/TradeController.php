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
            ->getRepository(User::class)->findAll();
        return $this->render('Home/ListOffers.html.twig', array(
        "arrayOfOffers" => $Offers,
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
        echo "sdsds";
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $Offer = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();

            $session = $this->get('session');
            $userId = $session->get("id");
            $user = $this->getDoctrine()
                ->getRepository(User::class)->find($userId);
            echo "sdsds";
            $Offer->setUser($user);
            $Offer->setTraderName($user->getName());
            $Offer->setTraderLastName($user->getLastName());
            $Offer->setUsername($user->getUsername());
            $Offer->setTraderEmail($user->getEmail());

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