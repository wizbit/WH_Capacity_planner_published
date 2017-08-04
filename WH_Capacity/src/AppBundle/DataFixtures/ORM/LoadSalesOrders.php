<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\SalesOrder;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadSalesOrders implements FixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $manager->persist($this->createSalesOrder('order_1', \DateTime::createFromFormat(DATE_ISO8601, '2017-05-05T15:00:00+0000'), \DateTime::createFromFormat(DATE_ISO8601, '2017-07-05T12:00:00+0000')));
        $manager->persist($this->createSalesOrder('order_2', \DateTime::createFromFormat(DATE_ISO8601, '2017-05-06T15:00:00+0000'), \DateTime::createFromFormat(DATE_ISO8601, '2017-06-05T18:00:00+0000')));
        $manager->persist($this->createSalesOrder('order_3', \DateTime::createFromFormat(DATE_ISO8601, '2017-05-07T15:00:00+0000')));
        $manager->persist($this->createSalesOrder('order_4', \DateTime::createFromFormat(DATE_ISO8601, '2017-05-08T15:00:00+0000')));
        $manager->flush();
    }

    private function createSalesOrder($orderRef, \DateTime $dateOrdered, \DateTime $dataShipped = null)
    {
        $salesOrder = new SalesOrder();
        $salesOrder->setDateOrdered($dateOrdered);
        $salesOrder->setDateShipped($dataShipped);
        $salesOrder->setOrderRef($orderRef);

        return $salesOrder;
    }
}
