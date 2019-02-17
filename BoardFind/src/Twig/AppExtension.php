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
            new \Twig_SimpleFunction('userIdInformation', [$this, 'getUsernameByUserId']),
            new \Twig_SimpleFunction('isAdmin', [$this, 'getIsAdminByUserId']),
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
}