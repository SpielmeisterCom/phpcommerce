<?php
namespace PHPCommerce\Payment\Type\DBAL;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use PHPCommerce\Payment\Type\PaymentType;

class PaymentDBALType extends Type
{
    public function getName()
    {
        return 'pc_payment_type';
    }

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return "VARCHAR(255)";
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return ($value === null) ? null : $value->getType();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return ($value === null) ? null : PaymentType::getInstance($value);
    }
}
