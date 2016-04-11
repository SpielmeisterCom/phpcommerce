<?php
namespace PHPCommerce\Payment\Type\DBAL;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use PHPCommerce\Payment\Type\PaymentGatewayType;

class PaymentGatewayDBALType extends Type
{
    public function getName()
    {
        return 'pc_payment_gateway_type';
    }

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getVarcharTypeDeclarationSQL($fieldDeclaration);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return ($value === null) ? null : $value->getType();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return ($value === null) ? null : PaymentGatewayType::getInstance($value);
    }
}
