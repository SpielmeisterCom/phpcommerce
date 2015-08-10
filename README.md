[![Build Status](https://travis-ci.org/phpcommerce/phpcommerce.svg)](https://travis-ci.org/phpcommerce/phpcommerce) [![Coverage Status](https://coveralls.io/repos/phpcommerce/phpcommerce/badge.svg)](https://coveralls.io/r/phpcommerce/phpcommerce)

To get started add `phpcommerce/phpcommerce` as a composer dependency and add the following bundles to your Symfony project:

Add to your `AppKernel.php`:

```php
    public function registerBundles()
    {
        $bundles = array(
            //...
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),

            new Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new PHPCommerce\Bundle\PHPCommerceBundle()
        );
        
        return $bundles;
        
   }    
```

Add to your `parameters.yml`:

```yaml
parameters:
    php_commerce.database.driver: pdo_mysql
    php_commerce.database.host: 127.0.0.1
    php_commerce.database.port: 3306
    php_commerce.database.name: phpcommerce
    php_commerce.database.user: root
    php_commerce.database.password: root

```