<?php
namespace PHPCommerce\PaymentBundle;
use PHPCommerce\PaymentBundle\DependencyInjection\Compiler\PaymentGatewayCompilerPass;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class PHPCommercePaymentBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new PaymentGatewayCompilerPass());
    }
}
