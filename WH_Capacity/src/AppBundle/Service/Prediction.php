<?php

namespace AppBundle\Service;

use AppBundle\Entity\Item;
use AppBundle\Repository\SalesOrderRepository;

class Prediction
{
    /**
     * @var SalesOrderRepository
     */
    private $salesOrderRepository;

    /**
     * Prediction constructor.
     */
    public function __construct(SalesOrderRepository $salesOrderRepository)
    {
        $this->salesOrderRepository = $salesOrderRepository;
    }

    public function predictRunOutOfItem(Item $item)
    {
        $this->salesOrderRepository->findByItem($item);
        return new \DateTimeImmutable('now');
    }
}