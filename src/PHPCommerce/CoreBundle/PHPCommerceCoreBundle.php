<?php
namespace PHPCommerce\CoreBundle;
use PHPCommerce\CoreBundle\DependencyInjection\Compiler\PaymentGatewayCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class PHPCommerceCoreBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new PaymentGatewayCompilerPass());
    }
}