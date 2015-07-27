<?php
namespace PHPCommerce\Payment\ORM\Types;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use PHPCommerce\Payment\PaymentGatewayType as PaymentGatewayTypeModel;

class PaymentGatewayType extends Type
{
    public function getName()
    {
        return 'payment_gateway_type';
    }

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getDoctrineTypeMapping('payment_gateway_type');
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return ($value === null) ? null : $value->getType();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return ($value === null) ? null : PaymentGatewayTypeModel::getInstance($value);
    }
}
