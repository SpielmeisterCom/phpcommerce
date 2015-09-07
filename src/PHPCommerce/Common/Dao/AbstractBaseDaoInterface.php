<?php
namespace PHPCommerce\Common\Dao;

use Doctrine\ORM\EntityManagerInterface;

interface AbstractBaseDaoInterface {
    public function __construct(EntityManagerInterface $entityManager, $class);
}