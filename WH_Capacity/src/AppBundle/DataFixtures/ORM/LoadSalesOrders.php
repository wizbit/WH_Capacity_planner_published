<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Item;
use AppBundle\Entity\Owner;
use AppBundle\Entity\SalesOrder;
use AppBundle\Entity\SalesOrderItem;
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
        $owner = new Owner();
        $owner->setName('Test Owner');
        $manager->persist($owner);

        $items = $this->createItems($owner);

        foreach ($items as $item) {
            $manager->persist($item);
        }

        $manager->persist($this->createSalesOrder($owner, 'order_1', \DateTime::createFromFormat(DATE_ISO8601, '2017-05-05T15:00:00+0000'), \DateTime::createFromFormat(DATE_ISO8601, '2017-07-05T12:00:00+0000'), [[$items[0], 4], [$items[1], 6]]));
        $manager->persist($this->createSalesOrder($owner, 'order_2', \DateTime::createFromFormat(DATE_ISO8601, '2017-05-06T15:00:00+0000'), \DateTime::createFromFormat(DATE_ISO8601, '2017-06-05T18:00:00+0000'), [[$items[2], 3]]));
        $manager->persist($this->createSalesOrder($owner, 'order_3', \DateTime::createFromFormat(DATE_ISO8601, '2017-05-07T15:00:00+0000'), null, [[$items[0], 1], [$items[5], 3]]));
        $manager->persist($this->createSalesOrder($owner, 'order_4', \DateTime::createFromFormat(DATE_ISO8601, '2017-05-08T15:00:00+0000'), null, [[$items[1], 2], [$items[2], 3], [$items[3], 2]]));
        $manager->flush();
    }

    private function createItems(Owner $owner)
    {
        $items = [];

        for ($i = 0; $i < 10; ++$i) {
            $item = new Item();
            $item->setCode(uniqid('item_'));
            $item->setOwner($owner);
            $items[] = $item;
        }

        return $items;
    }

    private function createSalesOrder(Owner $owner, $orderRef, \DateTime $dateOrdered, \DateTime $dataShipped = null, $items)
    {
        $salesOrder = new SalesOrder();
        $salesOrder->setDateOrdered($dateOrdered);
        $salesOrder->setDateShipped($dataShipped);
        $salesOrder->setOrderRef($orderRef);
        $salesOrder->setOwner($owner);

        foreach ($items as $item) {
            $salesOrder->addItem($item[0], $item[1]);
        }

        return $salesOrder;
    }
}
