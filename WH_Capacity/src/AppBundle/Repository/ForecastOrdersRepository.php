<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ForecastOrdersRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */

class ForecastOrdersRepository extends EntityRepository
{
	public function deleteAll()
    {
        $this->getEntityManager()->createQuery('DELETE FROM AppBundle:ForecastOrders')
        ->execute();
    }
}
