<?php
namespace PHPCommerce\Common\Dao;

interface IdInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param mixed $id
     */
    public function setId($id);
}