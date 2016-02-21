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
use Application\Entity\QualidadeVida;


class StatRestController extends AbstractRestfulController
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
    	
    	
    	
    	
    	$query = $em->createQuery("SELECT u.idCamara,u.nome,u.numeroEleitores as eleitores FROM Application\Entity\Camara u WHERE u.nome LIKE :nome ");
    	$query->setParameter('nome', '%'.$u.'%');
    	 
    	
    	$camaras = $query->getResult();
    	$result=array();
    	
    	$i=0;
    	foreach ($camaras as $camara)
    	{
    		$desemprego = $em->getRepository('Application\Entity\Desemprego')->find($camara['idCamara']);
    		$ensino = $em->getRepository('Application\Entity\EnsinoSuperior')->find($camara['idCamara']);
    		$population = $em->getRepository('Application\Entity\Populacao')->find($camara['idCamara']);
    		$qualidade = $em->getRepository('Application\Entity\QualidadeVida')->find($camara['idCamara']);
    		$endividamento = $em->getRepository('Application\Entity\Endividamento')->find($camara['idCamara']);
    		$envelhecimento = $em->getRepository('Application\Entity\Envelhecimento')->find($camara['idCamara']);
    		$independencia = $em->getRepository('Application\Entity\Indepedencia')->find($camara['idCamara']);
    		$passivo = $em->getRepository('Application\Entity\Passivo')->find($camara['idCamara']);
    		$prazo = $em->getRepository('Application\Entity\PrazoPagamento')->find($camara['idCamara']);
    		$result[$i++] = array(
    				'value'=>$camara['idCamara'],
    				'label'=>$camara['nome'],
    				'eleitores'=>$camara['eleitores'],
    				'desemprego'=>$desemprego->getAno2012()*100,
    				'ensino'=>$ensino->getAno2011(),
    				'population' => $population->getAno2012(),
    				'qualidade' => $qualidade->getAno2009()*100,
    				'envelhecimento' => $envelhecimento->getAno2012()*100,
    				'endividamento' => array(
    						'ano2010'=>(int)$endividamento->getAno2010(),
    						'ano2011'=>(int)$endividamento->getAno2011(),
    						'ano2012'=>(int)$endividamento->getAno2012(),
					), 
    				'independencia' => array(
    						'ano2010'=>round($independencia->getAno2010()*100, 2),
    						'ano2011'=>round($independencia->getAno2011()*100, 2),
    						'ano2012'=>round($independencia->getAno2012()*100, 2),
    				),
    				'passivo' => array(
    						'ano2011'=>round((float)$passivo->getAno2011(), 2),
    						'ano2012'=>round((float)$passivo->getAno2012(), 2),
    						'ano2013'=>round((float)$passivo->getAno2013(), 2),
    				),
    				'prazo' => array(
    						'ano2010'=>(int)$prazo->getAno2010(),
    						'ano2011'=>(int)$prazo->getAno2011(),
    						'ano2012'=>(int)$prazo->getAno2012(),
    				),
    				
    				
    		);
    	}
    	
    	
    	
    	//return new JsonModel(array('city' =>$camaras));
    	
    	//$camaras = $camaras + $desemprego;
    	
    	
    	
    	return new JsonModel(array('city' =>$result));
    	
    }

    public function get($id)
    {
    	
    	$em = $this->getServiceLocator()
    	->get('doctrine.entitymanager.orm_default');
    	
    	$u = $id = ( int ) $this->params ()->fromRoute ('id', 0);
    	
    	
    	if($u==0)
    		return new JsonModel(null);
    	
    	$query = $em->createQuery("SELECT u.idCamara,u.nome,u.numeroEleitores as eleitores FROM Application\Entity\Camara u WHERE u.idCamara LIKE :nome ");
    	$query->setParameter('nome', $u);
    	 
    	
    	$camaras = $query->getResult();
    	$result=array();
    	
    	$i=0;
    	foreach ($camaras as $camara)
    	{
    		$desemprego = $em->getRepository('Application\Entity\Desemprego')->find($camara['idCamara']);
    		$ensino = $em->getRepository('Application\Entity\EnsinoSuperior')->find($camara['idCamara']);
    		$population = $em->getRepository('Application\Entity\Populacao')->find($camara['idCamara']);
    		$qualidade = $em->getRepository('Application\Entity\QualidadeVida')->find($camara['idCamara']);
    		$endividamento = $em->getRepository('Application\Entity\Endividamento')->find($camara['idCamara']);
    		$envelhecimento = $em->getRepository('Application\Entity\Envelhecimento')->find($camara['idCamara']);
    		$independencia = $em->getRepository('Application\Entity\Indepedencia')->find($camara['idCamara']);
    		$passivo = $em->getRepository('Application\Entity\Passivo')->find($camara['idCamara']);
    		$prazo = $em->getRepository('Application\Entity\PrazoPagamento')->find($camara['idCamara']);
    		
    		
    		$pessoas = array(
    				
    				'state'=>$camara['nome'],
    				'eleitores'=>$camara['eleitores'],
    				'population' => $population->getAno2012(),
    				'ensino'=>$ensino->getAno2011(),
    		);
    		
    		$percent = array(
    				'state'=>$camara['nome'],
    				'desemprego'=>$desemprego->getAno2012()*100,
    				'qualidade' => $qualidade->getAno2009()*100,
    				'envelhecimento' => $envelhecimento->getAno2012()*100,
    				'a2010'=>round($independencia->getAno2010()*100, 2),
    				'a2011'=>round($independencia->getAno2011()*100, 2),
    				'a2012'=>round($independencia->getAno2012()*100, 2),
    				
    		);
    		
    		$dinheiro = array(
    				'state'=>$camara['nome'],
    			    'a2010'=>(int)$endividamento->getAno2010(),
    				'a2011'=>(int)$endividamento->getAno2011(),
    				'a2012'=>(int)$endividamento->getAno2012(),    				
    				'b2011'=>round((float)$passivo->getAno2011(), 2),
    				'b2012'=>round((float)$passivo->getAno2012(), 2),
    				'b2013'=>round((float)$passivo->getAno2013(), 2),
    				
    				
    		);
    		
    		$dias = array(
    				
    				'state'=>$camara['nome'],
    				'a2010'=>(int)$prazo->getAno2010(),
    				'a2011'=>(int)$prazo->getAno2011(),
    				'a2012'=>(int)$prazo->getAno2012(),   				
    		);
    	
    	}
    	
    	return new JsonModel(array(
    			'pessoas'=>$pessoas,
    			'percent'=>$percent,
    			'dinheiro'=>$dinheiro,
    			'dias'=>$dias,
    		));
    	
    	
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