<?php
namespace PHPCommerce\Bundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;

class PHPCommerceExtension extends Extension implements PrependExtensionInterface
{
    public function load(array $configs, ContainerBuilder $container)
    {

    }

    public function getAlias()
    {
        return 'php_commerce';
    }

    /**
     * Allow an extension to prepend the extension configurations.
     *
     * @param ContainerBuilder $container
     */
    public function prepend(ContainerBuilder $container)
    {
        $bundles = $container->getParameter('kernel.bundles');

        foreach(array('DoctrineMigrationsBundle', 'FrameworkBundle', 'DoctrineBundle') as $requiredBundle) {
            if(!in_array($requiredBundle, array_keys($bundles))) {
                throw new \Exception("Missing required Bundle " . $requiredBundle);
            }
        }

        //prepend our own config
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('config.yml');
    }
}