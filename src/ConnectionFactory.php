<?php

namespace Spiffy\DoctrineORMPackage;

use Doctrine\DBAL\DriverManager;
use Spiffy\Inject\Injector;
use Spiffy\Inject\ServiceFactory;

final class ConnectionFactory  implements ServiceFactory
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param Injector $i
     * @return \Doctrine\DBAL\Connection
     */
    public function createService(Injector $i)
    {
        return DriverManager::getConnection($i['doctrine-orm'][$this->name]['connection']);
    }
}
