<?php

namespace App\Twig;
use Doctrine\ORM\EntityManagerInterface;

class AppExtension extends \Twig_Extension
{

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('isAdmin', [$this, 'getIsAdminByUserId']),
            new \Twig_SimpleFunction('userIdInformation', [$this, 'getUsernameByUserId']),
            new \Twig_SimpleFunction('getNameOfUser', [$this, 'getNameByUserId']),
            new \Twig_SimpleFunction('getLastNameOfUser', [$this, 'getLastNameByUserId']),
            new \Twig_SimpleFunction('getPhoneOfUser', [$this, 'getPhoneByUserId']),
            new \Twig_SimpleFunction('getEmailOfUser', [$this, 'getEmailByUserId']),

            new \Twig_SimpleFunction('getOfferUsername', [$this, 'getUsernameByOfferId']),
            new \Twig_SimpleFunction('getNameByOfferId', [$this, 'getNameByOfferId']),
            new \Twig_SimpleFunction('getLastNameByOfferId', [$this, 'getLastNameByOfferId']),
            new \Twig_SimpleFunction('getEmailByOfferId', [$this, 'getEmailByOfferId']),
            new \Twig_SimpleFunction('getTelephoneByOfferId', [$this, 'getTelephoneByOfferId']),
        ];
    }

    public function getIsAdminByUserId($id)
    {
        $user = $this->em->getRepository("App:User")
            ->find($id);
        return $user->getIsadmin();
    }

    public function getUsernameByUserId($id)
    {
        $user = $this->em->getRepository("App:User")
            ->find($id);
        return $user->getUsername();
    }

    public function getNameByUserId($id)
    {
        $user = $this->em->getRepository("App:User")
            ->find($id);
        return $user->getName();
    }

    public function getLastNameByUserId($id)
    {
        $user = $this->em->getRepository("App:User")
            ->find($id);
        return $user->getLastName();
    }

    public function getPhoneByUserId($id)
    {
        $user = $this->em->getRepository("App:User")
            ->find($id);
        return $user->getUsername();
    }

    public function getEmailByUserId($id)
    {
        $user = $this->em->getRepository("App:User")
            ->find($id);
        return $user->getEmail();
    }

    public function getUsernameByOfferId($id)
    {
        $offer = $this->em->getRepository("App:TradeOffer")
            ->find($id);
        $user = $offer->getUser();
        return $user->getUsername();
    }

    public function getNameByOfferId($id)
    {
        $offer = $this->em->getRepository("App:TradeOffer")
            ->find($id);
        $user = $offer->getUser();
        return $user->getName();
    }

    public function getLastNameByOfferId($id)
    {
        $offer = $this->em->getRepository("App:TradeOffer")
            ->find($id);
        $user = $offer->getUser();
        return $user->getLastName();
    }

    public function getTelephoneByOfferId($id)
    {
        $offer = $this->em->getRepository("App:TradeOffer")
            ->find($id);
        $user = $offer->getUser();
        return $user->getTelephone();
    }

    public function getEmailByOfferId($id)
    {
        $offer = $this->em->getRepository("App:TradeOffer")
            ->find($id);
        $user = $offer->getUser();
        return $user->getEmail();
    }
}