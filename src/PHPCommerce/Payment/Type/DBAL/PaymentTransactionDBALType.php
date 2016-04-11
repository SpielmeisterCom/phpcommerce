<?php
namespace PHPCommerce\Payment\Doctrine\DBAL\Types;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use PHPCommerce\Payment\Type\PaymentTransactionType;

class PaymentTransactionDBALType extends Type
{
    public function getName()
    {
        return 'pc_payment_transaction_type';
    }

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'VARCHAR(255)';
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return ($value === null) ? null : $value->getType();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return ($value === null) ? null : PaymentTransactionType::getInstance($value);
    }
}
