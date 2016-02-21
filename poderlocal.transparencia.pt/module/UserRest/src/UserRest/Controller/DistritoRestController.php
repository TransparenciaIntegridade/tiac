<?php

namespace UserRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;

    
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;
use Zend\Authentication\Result as Result;
use Zend\View\Model\JsonModel;
use Doctrine\ORM\EntityManager;
use Application\Entity\PostCartaz;


class DistritoRestController extends AbstractRestfulController
{ 
	
    
    public function getList()
    {
    	
    	$em = $this->getServiceLocator()
    	->get('doctrine.entitymanager.orm_default');
    	
    	$distritos = $em->getRepository('Application\Entity\Distrito')->findAll();
    	$i=0;
    	foreach ($distritos as $distrito){
    	
    		$results[$i++]=array(
    				'ID_distrito'=> $distrito->getIdDistrito(),
    				'nome' => $distrito->getNome(),
    				
    	
    		);
    	}
    	
    	
    	return new JsonModel(array(
    			
    			 'Result' => $results,
    	));

    	
    }

    public function get($id)
    {
    	
    	
    }

    public function create($datas)
    {
    	
    	
    }

    public function update($id, $data)
    {
    	
    	return new JsonModel(array('result'=>'update'));
    }

    public function delete($id)
    {
        
    }
    

    
}