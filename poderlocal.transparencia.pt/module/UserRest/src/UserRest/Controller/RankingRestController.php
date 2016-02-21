<?php

namespace UserRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
    
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;
use Zend\Authentication\Result as Result;
use Zend\View\Model\JsonModel;
use Doctrine\ORM\EntityManager;
use Application\Entity\PostCartaz;
use GoogleMaps;
use Application\Entity\PostBrinde;
use Application;


class RankingRestController extends AbstractRestfulController
{ 
	
    public function getList()
    {
    	
    	$em = $this->getServiceLocator()
    	->get('doctrine.entitymanager.orm_default');
    	   	
    	/*
    	$camaras=array();
    	$i=0; 
    	foreach ($camara as $cam){
    		$camaras[$i]['value'] = $cam->getIdCamara();    
    		$camaras[$i++]['label']= $cam->getNome();
    	}
    	return new JsonModel($camaras);
    	
    	*/
    	$u = $_GET['q'];
    	
    	
    	
    	
    	$query = $em->createQuery("SELECT u.idCamara as value ,u.municipios as label, u.dimensaoA_2015 as dimensaoA, u.dimensaoB_2015 as dimensaoB ,u.dimensaoC_2015 as dimensaoC , u.dimensaoD_2015 as dimensaoD , u.dimensaoE_2015 as dimensaoE , u.dimensaoF_2015 as dimensaoF , u.dimensaoG_2015 as dimensaoG, u.itm_2015 as itm, u.ranking_2015 as ranking, u.icone as icone, u.url as url  FROM Application\Entity\Ranking u WHERE u.municipios LIKE :nome ");
    	$query->setParameter('nome', '%'.$u.'%');
    	 
    	
    	
    	
    	
    	
    	
    	$camaras = $query->getResult();
    	
    	
    	
    	
    	return new JsonModel(array('city' =>$camaras));
    	
    }

    public function get($id)
    {
    	$em = $this->getServiceLocator()
    	->get('doctrine.entitymanager.orm_default');
    	$u=$id;
    	if($id==0)
    		return new JsonModel(null);
    	$query = $em->createQuery("SELECT u.dimensaoA_2015 as A, u.dimensaoB_2015 as B ,u.dimensaoC_2015 as C , u.dimensaoD_2015 as D , u.dimensaoE_2015 as E , u.dimensaoF_2015 as F , u.dimensaoG_2015 as G , u.municipios as state  FROM Application\Entity\Ranking u WHERE u.idCamara LIKE :nome ");
    	$query->setParameter('nome', $u);
    	
    	$camara = $query->getResult();
    	
    	return new JsonModel($camara[0]);
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