<?php
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

/**
 * This AppKernel can be used for running phpcommerce in a standalone context (development, tests)
 */
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        return array(
            new Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(),
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new PHPCommerce\Bundle\PHPCommerceBundle()
        );
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load( __DIR__ . '/../src/PHPCommerce/Bundle/Resources/config/config_standalone_' . $this->getEnvironment() . '.yml');
    }
}