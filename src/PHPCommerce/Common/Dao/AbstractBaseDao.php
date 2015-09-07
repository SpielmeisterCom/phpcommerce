<?php
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use PHPCommerce\Common\IdInterface;

abstract class AbstractBaseDao
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var string
     */
    protected $class;

    /**
     * @var EntityRepository
     */
    protected $repository;

    /**
     * @param EntityManagerInterface $entityManager
     * @param string                 $class
     */
    public function __construct(EntityManagerInterface $entityManager, $class)
    {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository($class);
        $this->class = $class;
    }

    /**
     * Gets a reference to the entity identified by the given type and identifier
     * without actually loading it, if the entity is not yet loaded.
     *
     * @param string $id
     *
     * @return IdInterface
     */
    public function getReference($id)
    {
        return $this->entityManager->getReference($this->class, $id);
    }

    /**
     * @return EntityRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @param IdInterface $entity
     * @param bool        $flush
     */
    protected function saveEntity(IdInterface $entity, $flush = true)
    {
        $this->entityManager->persist($entity);

        if ($flush) {
            $this->entityManager->flush();
        }
    }

    /**
     * @param IdInterface $entity
     * @param bool        $flush
     */
    protected function removeEntity(IdInterface $entity, $flush = true)
    {
        $this->entityManager->remove($entity);

        if ($flush) {
            $this->entityManager->flush();
        }
    }

    /**
     * @return IdInterface
     */
    protected function createEntity()
    {
        return new $this->class();
    }
}