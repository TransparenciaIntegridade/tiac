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


class ResponseRestController extends AbstractRestfulController
{ 
	
    public function getList()
    {

    	
    }

    public function get($id)
    {
    	$em = $this->getServiceLocator()
    	->get('doctrine.entitymanager.orm_default');
    	 
    	$id = ( int ) $this->params ()->fromRoute ('id', null);
    	 
    	$result=array();
    	$i=0;
    	if($id!=null){
    	
    		$listas = $em->getRepository('Application\Entity\Lista')->findBy(array('idCamara'=>$id),array('anoInicialPoder'=>'ASC'));
    	}
    	 
    	foreach ($listas as $lista)
    	{	/*
    		$date =  new \DateTime($lista->getAnoInicialPoder());
    		$date = $date->getTimestamp();
    		$date2 =  new \DateTime($lista->getAnoFinalPoder());
    		$date2 = $date2->getTimestamp();
    		*/
    		$result[$i++]= array(
    			'name' => $lista->getNome(),
    			
    				
    			'startValue' => $lista->getAnoInicialPoder(),
    			'endValue' => $lista->getAnoFinalPoder(),
    			'color' => $lista->getCor(),	
    				
    		);
    	} 
    	
    	
    	
    	$u = $id; 	 
    	 



    	 
    	$query = $em->createQuery("SELECT u.idCamara as value ,u.municipios as label, u.dimensaoA as dimensaoA, u.dimensaoB as dimensaoB ,u.dimensaoC as dimensaoC , u.dimensaoD as dimensaoD , u.dimensaoE as dimensaoE , u.dimensaoF as dimensaoF , u.dimensaoG as dimensaoG  FROM Application\Entity\Ranking u WHERE u.idCamara = :nome ");
    	$query->setParameter('nome', $u);
    	
    	 
    	$ranking = $query->getResult();
    	
    	
    	$rankings[0] = array(
    	  			
    			'state' => '',
    			'value'=> $ranking[0]['dimensaoA'],
    			
    	);
    	$rankings[1] = array(
    	
    			'state' => '',
    			'value1'=> $ranking[0]['dimensaoB'],
    			
    	);
    	$rankings[2] = array(
    	
    			'state' => '',
    			'value2'=> $ranking[0]['dimensaoC'],
    			
    	);
    	$rankings[3] = array(
    	
    			'state' => '',
    			'value3'=> $ranking[0]['dimensaoD'],
    			
    	);
    	$rankings[4] = array(
    	
    			'state' => '',
    			'value4'=> $ranking[0]['dimensaoE'],
    			
    	);
    	$rankings[5] = array(
    	
    			'state' => '',
    			'value5'=> $ranking[0]['dimensaoF'],
    			
    	);
    	$rankings[6] = array(
    			 
    			'state' => '',
    			'value6'=> $ranking[0]['dimensaoG'],
    			
    	);
    	
    	
    	
    	
    	
    	
    	
    	
    	
    	
    	
    	
    	$camara = $em->getRepository('Application\Entity\Camara')->find($id);
    	$desemprego = $em->getRepository('Application\Entity\Desemprego')->find($id);
    	$ensino = $em->getRepository('Application\Entity\EnsinoSuperior')->find($id);
    	$population = $em->getRepository('Application\Entity\Populacao')->find($id);
    	$qualidade = $em->getRepository('Application\Entity\QualidadeVida')->find($id);
    	$endividamento = $em->getRepository('Application\Entity\Endividamento')->find($id);
    	$envelhecimento = $em->getRepository('Application\Entity\Envelhecimento')->find($id);
    	$independencia = $em->getRepository('Application\Entity\Indepedencia')->find($id);
    	$passivo = $em->getRepository('Application\Entity\Passivo')->find($id);
    	$prazo = $em->getRepository('Application\Entity\PrazoPagamento')->find($id);
        $ranking_2014 = $em->getRepository('Application\Entity\Ranking_2014')->find($id);

    	
    	
    	
    	
    	$data[0] = array(    		
    			'state'=>'',
    			'value'=>$camara->getNumeroEleitores(),    //pessoas			
    	);
    	
    	$data[1] = array(
    			'state'=>'',
    			'value1'=>$ensino->getAno2011(), // pessoas
    	);
    	$data[2] = array(
    			'state'=>'',
    			'value2' => $population->getAno2012(), // pessoas
    	);
    	$data2[0] = array(
    			'state'=>'',
    			'value' => $qualidade->getAno2009()*100, // %
    	);
    	$data2[1] = array(
    			'state'=>'',
    			'value1' => $envelhecimento->getAno2012()*100, // %
    	);
    	$data3[0] = array(
    			'state'=>'',
    			'value' => (int)$endividamento->getAno2013(), // €   		
    	);
    	$data2[2] = array(
    			'state'=>'',
    			'value2' => $camara->getTaxaDesemprego(),  // %
    	);
    	$data3[1] = array(
    			'state'=>'',
    			'value1' => round((float)$passivo->getAno2013(), 2),  // €	
    	);
    	$data4[0] = array(
    			
    			//'value'=> (int)$prazo->getAno2012(), // dias
    			
    		
    		'value'=>$camara->getTaxaDesemprego(), // %
    			
    	);
    	/*$data5[0] = array(
                
          
                'state'=>'',
                'value' => $ranking_2014-> getDimensaoA(), // %
        );*/
                
       
    	
    	
    	
    	
    	
    	return new JsonModel(array('range' =>$result,'ranking'=>$rankings,'data'=>$data,'data2'=>$data2,'data3'=>$data3,'data4'=>$data4, 'data5'=>$data5));
    	
    	
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