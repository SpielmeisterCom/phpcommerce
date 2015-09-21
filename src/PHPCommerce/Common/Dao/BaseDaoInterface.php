<?php
namespace PHPCommerce\Common\Dao;

use Doctrine\ORM\EntityManagerInterface;
use PHPCommerce\Common\Entity\BaseEntityInterface;

interface BaseDaoInterface {
    public function __construct(EntityManagerInterface $entityManager, $class);

    /**
     * @param $id
     * @return BaseEntityInterface
     */
    public function getById($id);

    /**
     * @param $id
     * @return BaseEntityInterface
     */
    public function getReferenceById($id);

    /**
     * @return BaseEntityInterface
     */
    public function createEntity();

    /**
     * @param BaseEntityInterface $entity
     * @throws \Exception
     * @return void
     */
    public function save(BaseEntityInterface $entity);

    /**
     * @param BaseEntityInterface $entity
     * @throws \Exception
     * @return void
     */
    public function delete(BaseEntityInterface $entity);
}