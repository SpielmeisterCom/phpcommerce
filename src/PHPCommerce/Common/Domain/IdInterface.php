<?php
namespace PHPCommerce\Common\Domain;

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