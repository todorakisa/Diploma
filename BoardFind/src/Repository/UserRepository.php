<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    public function findOneByPasswordAndEmailAndUsername($password,$email,$username,$isdeleted = false): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.password = :pass')
            ->setParameter('pass', $password)
            ->andWhere('u.email = :email')
            ->setParameter('email', $email)
            ->andWhere('u.isdeleted = :is')
            ->setParameter('is', $isdeleted)
            ->andWhere('u.username = :username')
            ->setParameter('username', $username)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findOneByPasswordAndUsername($password,$username,$isdeleted = false): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.password = :pass')
            ->setParameter('pass', $password)
            ->andWhere('u.isdeleted = :is')
            ->setParameter('is', $isdeleted)
            ->andWhere('u.username = :username')
            ->setParameter('username', $username)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }

    public function findOneByEmail($email, $isdeleted = false): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.email = :e')
            ->setParameter('e', $email)
            ->andWhere('u.isdeleted = :is')
            ->setParameter('is', $isdeleted)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }

    public function findOneByUsername($username, $isdeleted = false): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.username = :us')
            ->setParameter('us', $username)
            ->andWhere('u.isdeleted = :is')
            ->setParameter('is', $isdeleted)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }
}
