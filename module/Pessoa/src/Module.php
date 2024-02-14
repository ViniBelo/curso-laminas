<?php

namespace Pessoa;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\ResultSet\ResultSet;
use Laminas\Db\TableGateway\TableGateway;
use Laminas\ModuleManager\Feature\ConfigProviderInterface;
use Pessoa\Controller\PessoaController;
use Pessoa\Model\Pessoa;
use Pessoa\Model\PessoaTable;
use Pessoa\Model\PessoaTableGateway;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__."/../config/module.config.php";
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                PessoaTable::class => function($container) {
                    $tableGateway = $container->get(PessoaTableGateway::class);
                    return new PessoaTable($tableGateway);
                },
                PessoaTableGateway::class => function($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Pessoa());
                    return new TableGateway('pessoa', $dbAdapter, null, $resultSetPrototype);
                },
            ]
        ];
    }
    public function getControllerConfig()
    {
        return [
            'factories' => [
                PessoaController::class => function($container) {
                    $tableGateway = $container->get(PessoaTable::class);
                    return new PessoaController($tableGateway);
                },
            ]
        ];
    }
}