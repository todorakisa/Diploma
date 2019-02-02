<?php

namespace App\Twig;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class AppExtension extends \Twig_Extension
{
//    protected $doctrine;

//    public function __construct(RegistryInterface $doctrine)
//    {
//        $this->doctrine = $doctrine;
//    }
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('userIdInformation', [$this, 'getUsernameByUserId']),
        ];
    }

    public function getUsernameByUserId($id)
    {
        $user = $this->em->getRepository("App:User")
            ->findOneById($id);

        return $user->getUsername();
    }


}