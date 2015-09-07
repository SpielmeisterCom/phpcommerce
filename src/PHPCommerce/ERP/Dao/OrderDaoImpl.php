<?php
namespace PHPCommerce\ERP\Dao;

use Doctrine\ORM\EntityManagerInterface;

class OrderDao implements OrderDaoInterface {
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var EntityRepository
     */
    protected $repository;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository('PHPCommerce\ERP\Entity\Order');

    }
}