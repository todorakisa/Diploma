<?php
/**
 * Created by PhpStorm.
 * User: todor
 * Date: 2/1/2019
 * Time: 12:24 PM
 */

namespace App\Repository;

use App\Entity\TradeOffer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TradeOffer|null find($id, $lockMode = null, $lockVersion = null)
 * @method TradeOffer|null findOneBy(array $criteria, array $orderBy = null)
 * @method TradeOffer[]    findAll()
 * @method TradeOffer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TradeOfferRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TradeOffer::class);
    }

}