<?php
namespace PHPCommerce\Bundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class PaymentGatewayCompilerPass implements CompilerPassInterface {
    public function process(ContainerBuilder $container) {
        if (!$container->has('phpcommerce.payment.gateway.configuration_service_provider')) {
            return;
        }

        $definition = $container->findDefinition(
            'phpcommerce.payment.gateway.configuration_service_provider'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'phpcommerce.payment.gateway'
        );

        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall(
                'addGatewayConfigurationService',
                array(new Reference($id))
            );
        }
    }
}
