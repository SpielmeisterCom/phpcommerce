<?php
namespace PHPCommerce\Bundle;
use Doctrine\DBAL\Types\Type;
use PHPCommerce\Bundle\DependencyInjection\Compiler\PaymentGatewayCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class PHPCommerceBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new PaymentGatewayCompilerPass());
    }

    public function boot() {
        if(!Type::hasType('payment_type')) {
            Type::addType('payment_type', 'PHPCommerce\Payment\ORM\Types\PaymentType');
        }

        if(!Type::hasType('payment_gateway_type')) {
            Type::addType('payment_gateway_type', 'PHPCommerce\Payment\ORM\Types\PaymentGatewayType');
        }

        $em = $this->container->get('doctrine.orm.default_entity_manager');
        $conn = $em->getConnection();

        $conn->getDatabasePlatform()->registerDoctrineTypeMapping('payment_type', 'payment_type');
        $conn->getDatabasePlatform()->registerDoctrineTypeMapping('payment_gateway_type', 'payment_gateway_type');
    }
}