<?php
namespace PHPCommerce\Bundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class PaymentGatewayCompilerPass implements CompilerPassInterface {
    public function process(ContainerBuilder $container) {
        if (!$container->has('php_commerce.payment.gateway.configuration_service_provider')) {
            return;
        }

        $definition = $container->findDefinition(
            'php_commerce.payment.gateway.configuration_service_provider'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'php_commerce.payment.gateway'
        );

        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall(
                'addGatewayConfigurationService',
                array(new Reference($id))
            );
        }
    }
}
