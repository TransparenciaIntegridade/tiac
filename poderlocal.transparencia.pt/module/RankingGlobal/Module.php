<?php

namespace RankingGlobal;


use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Cartaz\Model\Cartaz;
use Cartaz\Model\CartazTable;



class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Cartaz\Model\CartazTable' => function($sm) {
                	$tableGateway = $sm->get('CartazTableGateway');
                	$table = new CartazTable($tableGateway);
                	return $table;
                },
                'CartazTableGateway' => function ($sm) {
                	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                	$resultSetPrototype = new ResultSet();
                	$resultSetPrototype->setArrayObjectPrototype(new Cartaz());
                	return new TableGateway('cartaz', $dbAdapter, null, $resultSetPrototype);
                },
                
                
                
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}