<?php
namespace PHPCommerce\Bundle;
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
}