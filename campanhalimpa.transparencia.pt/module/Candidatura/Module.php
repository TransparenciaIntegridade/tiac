<?php

namespace Candidatura;

use Camara\Model\Camara;
use Camara\Model\CamaraTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Candidatura\Model\Candidatura;
use Candidatura\Model\CandidaturaTable;
use Distrito\Model\Distrito;
use Distrito\Model\DistritoTable;
use PostCartaz\Model\PostCartazTable;
use PostCartaz\Model\PostCartaz;


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
                'Candidatura\Model\CandidaturaTable' =>  function($sm) {
                    $tableGateway = $sm->get('CandidaturaTableGateway');
                    $table = new CandidaturaTable($tableGateway);
                    return $table;
                },
                'CandidaturaTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter'); 
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Candidatura());
                    return new TableGateway('lista', $dbAdapter, null, $resultSetPrototype);
                },
                'Camara\Model\CamaraTable' =>  function($sm) {
                	$tableGateway = $sm->get('CamaraTableGateway');
                	$table = new CamaraTable($tableGateway);
                	return $table;
                },
                'CamaraTableGateway' => function ($sm) {
                	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                	$resultSetPrototype = new ResultSet();
                	$resultSetPrototype->setArrayObjectPrototype(new Camara());
                	return new TableGateway('camara', $dbAdapter, null, $resultSetPrototype);
                },
                'PostCartaz\Model\PostCartazTable' => function($sm) {
                	$tableGateway = $sm->get('PostCartazTableGateway');
                	$table = new PostCartazTable($tableGateway);
                	return $table;
                },
                'PostCartazTableGateway' => function ($sm) {
                	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                	$resultSetPrototype = new ResultSet();
                	$resultSetPrototype->setArrayObjectPrototype(new PostCartaz());
                	return new TableGateway('post_cartaz', $dbAdapter, null, $resultSetPrototype);
                },
                'Distrito\Model\DistritoTable' => function($sm) {
                	$tableGateway = $sm->get('DistritoTableGateway');
                	$table = new DistritoTable($tableGateway);
                	return $table;
                },
                'DistritoTableGateway' => function ($sm) {
                	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                	$resultSetPrototype = new ResultSet();
                	$resultSetPrototype->setArrayObjectPrototype(new Distrito());
                	return new TableGateway('distrito', $dbAdapter, null, $resultSetPrototype);
                },
                
                
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}