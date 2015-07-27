<?php
namespace PHPCommerce\Payment\ORM\Types;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use PHPCommerce\Payment\PaymentType as PaymentTypeModel;

class PaymentType extends Type
{
    public function getName()
    {
        return 'payment_type';
    }

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getDoctrineTypeMapping('payment_type');
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return ($value === null) ? null : $value->getType();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return ($value === null) ? null : PaymentTypeModel::getInstance($value);
    }
}
