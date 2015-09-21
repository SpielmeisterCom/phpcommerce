<?php
namespace PHPCommerce\Common\Dao;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use PHPCommerce\Common\Entity\BaseEntityInterface;
use PHPCommerce\Common\IdInterface;

class DoctrineBaseDao implements BaseDaoInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * Specified if changes to the underlying data layer should be flushed immediately
     * @var bool
     */
    protected $autoFlush;

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
     * @return boolean
     */
    public function isAutoFlush()
    {
        return $this->autoFlush;
    }

    /**
     * @param boolean $autoFlush
     */
    public function setAutoFlush($autoFlush)
    {
        $this->autoFlush = $autoFlush;
    }

    /**
     * Gets a reference to the entity identified by the given type and identifier
     * without actually loading it, if the entity is not yet loaded.
     *
     * @param string $id
     *
     * @return IdInterface
     */
    public function getReferenceById($id)
    {
        return $this->entityManager->getReference($this->class, $id);
    }

    public function save(BaseEntityInterface $entity)
    {
        $this->entityManager->persist($entity);

        if ($this->autoFlush) {
            $this->entityManager->flush();
        }
    }

    public function delete(BaseEntityInterface $entity)
    {
        $this->entityManager->remove($entity);

        if ($this->autoFlush) {
            $this->entityManager->flush();
        }
    }

    /**
     * @return BaseEntityInterface
     */
    public function createEntity()
    {
        return new $this->class();
    }

    /**
     * @param $id
     * @return BaseEntityInterface
     */
    public function getById($id)
    {
        return $this->repository->findOne($id);
    }
}