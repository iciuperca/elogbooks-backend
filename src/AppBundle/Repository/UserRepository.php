<?php

namespace AppBundle\Repository;

use AppBundle\Form\FilterType\Model\UserFilter;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;

/**
 * UserRepository
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @param UserFilter $listFilterModel
     *
     * @return Query
     */
    public function filterAndReturnQuery(UserFilter $listFilterModel)
    {
        $qb = $this->createQueryBuilder('u')
            ->setMaxResults(UserFilter::LIMIT)
        ;

        $this->applyFilter($qb, $listFilterModel);

        return $qb->getQuery();
    }

    /**
     * @param QueryBuilder $qb
     * @param UserFilter   $listFilterModel
     *
     * @return $this
     */
    public function applyFilter(QueryBuilder $qb, UserFilter $listFilterModel)
    {

        if ($listFilterModel->getOrderKey()) {
            $qb->orderBy(
                sprintf('u.%s', $listFilterModel->getOrderKey()),
                $listFilterModel->getOrderDirection()
            );
        }

        if($listFilterModel->getName())
        {
            $qb
                ->andWhere(sprintf(" u.name LIKE '%s' ", "%".$listFilterModel->getName()."%"));
        }

        if($listFilterModel->getEmail())
        {
            $qb
                ->andWhere(sprintf(" u.email LIKE '%s' ", "%".$listFilterModel->getEmail()."%"));
        }

        return $this;
    }
}
