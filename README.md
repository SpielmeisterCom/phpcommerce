[![Build Status](https://travis-ci.org/phpcommerce/core.svg)](https://travis-ci.org/phpcommerce/core) [![Coverage Status](https://coveralls.io/repos/phpcommerce/core/badge.svg)](https://coveralls.io/r/phpcommerce/core)

To get started add `phpcommerce/core` as a composer dependency and add the following bundles to your Symfony project:

Add to your `AppKernel.php`:

```php
    public function registerBundles()
    {
        $bundles = array(
            //...
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Symfony\Cmf\Bundle\RoutingBundle\CmfRoutingBundle(),
            new PHPCommerce\CoreBundle\PHPCommerceCoreBundle()
        );
        
        return $bundles;
        
   }    
```