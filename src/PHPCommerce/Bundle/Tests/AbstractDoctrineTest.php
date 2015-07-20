<?php
namespace PHPCommerce\Bundle\Tests;

use Doctrine\Common\Persistence\ObjectRepository;
use PHPCommerce\Payment\Entity\OrderPayment;
use PHPUnit_Framework_TestCase;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Bundle\FrameworkBundle\Console\Application;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

abstract class AbstractDoctrineTest extends KernelTestCase {
    /**
     * @var EntityManager
     */
    protected $em;

    protected $application;

    public function setUp() {
        self::bootKernel();

        $this->application = new Application(static::$kernel);
        $this->application->setAutoExit(false);

        $this->em = static::$kernel->getContainer()->get('doctrine')->getManager();

        $output = new ConsoleOutput();

        $input = new ArrayInput([
            'command' => 'doctrine:database:drop', '--force' => true]);
        $exitCode = $this->application->run($input, $output);

        $input = new ArrayInput(['command' => 'doctrine:database:create']);
        $exitCode = $this->application->run($input, $output);

        $input = new ArrayInput(['command' => 'doctrine:schema:create']);
        $exitCode = $this->application->run($input, $output);

        $this->assertSame(0, $exitCode);

        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }
}