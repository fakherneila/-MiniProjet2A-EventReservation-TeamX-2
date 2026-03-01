<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;

class EventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Event::class);
    }

    public function findPaginatedEvents(int $page, int $limit, string $search = ''): Paginator
    {
        $queryBuilder = $this->createQueryBuilder('e')
            ->orderBy('e.date', 'ASC');
        
        if ($search) {
            $queryBuilder->andWhere('e.title LIKE :search OR e.location LIKE :search')
                ->setParameter('search', '%' . $search . '%');
        }
        
        $queryBuilder->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit);
        
        return new Paginator($queryBuilder);
    }

    public function findUpcomingEvents(): array
    {
        return $this->createQueryBuilder('e')
            ->where('e.date > :now')
            ->setParameter('now', new \DateTime())
            ->orderBy('e.date', 'ASC')
            ->getQuery()
            ->getResult();
    }
}