<?php

namespace App\Repository;

use App\Entity\Publication;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Publication|null find($id, $lockMode = null, $lockVersion = null)
 * @method Publication|null findOneBy(array $criteria, array $orderBy = null)
 * @method Publication[]    findAll()
 * @method Publication[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PublicationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Publication::class);
    }

    public function produitMax6(): array
    {
        return $this
        ->createQueryBuilder("p")
        ->orderBy("p.datePublication", "DESC")
        ->setMaxResults(6)
        ->getQuery()
        ->getResult();
    }
    public function getLegumes()
    {
        return $this
        ->createQueryBuilder("publication")
        ->select("produit")
        ->from('App\Entity\Produit' ,'produit') 
        ->leftJoin('produit.type' ,'type')
        ->andWhere("type.label LIKE '%legumes%'")
        ->getQuery()
        ->getResult();
    }
    public function getFruits()
    {
        return $this
        ->createQueryBuilder("publication")
        ->select("produit")
        ->from('App\Entity\Produit' ,'produit') 
        ->leftJoin('produit.type' ,'type')
        ->andWhere("type.label LIKE '%fruits%'")
        ->getQuery()
        ->getResult();
    }
    public function getBoulangerie()
    {
        return $this
        ->createQueryBuilder("publication")
        ->select("produit")
        ->from('App\Entity\Produit' ,'produit') 
        ->leftJoin('produit.type' ,'type')
        ->andWhere("type.label LIKE '%boulangerie%'")
        ->getQuery()
        ->getResult();
    }
    public function getCremerie()
    {
        return $this
        ->createQueryBuilder("publication")
        ->select("produit")
        ->from('App\Entity\Produit' ,'produit') 
        ->leftJoin('produit.type' ,'type')
        ->andWhere("type.label LIKE '%cremerie%'")
        ->getQuery()
        ->getResult();
    }
    public function getEpicerie()
    {
        return $this
        ->createQueryBuilder("publication")
        ->select("produit")
        ->from('App\Entity\Produit' ,'produit') 
        ->leftJoin('produit.type' ,'type')
        ->andWhere("type.label LIKE '%epicerie%'")
        ->getQuery()
        ->getResult();
    }
    public function getBoissons()
    {
        return $this
        ->createQueryBuilder("publication")
        ->select("produit")
        ->from('App\Entity\Produit' ,'produit') 
        ->leftJoin('produit.type' ,'type')
        ->andWhere("type.label LIKE '%boissons%'")
        ->getQuery()
        ->getResult();
    }
    // /**
    //  * @return Publication[] Returns an array of Publication objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Publication
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
