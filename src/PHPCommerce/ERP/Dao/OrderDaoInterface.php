<?php
namespace PHPCommerce\ERP\Dao;

use Doctrine\ORM\EntityManagerInterface;

interface OrderDaoInterface {
    public function __construct(EntityManagerInterface $entityManager);

}
