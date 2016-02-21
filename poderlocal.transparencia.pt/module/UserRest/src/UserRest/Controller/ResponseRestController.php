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
    	 
    	 
    	$query = $em->createQuery("SELECT u.idCamara as value ,u.municipios as label, u.dimensaoA as dimensaoA, u.dimensaoB as dimensaoB ,u.dimensaoC as dimensaoC , u.dimensaoD as dimensaoD , u.dimensaoE as dimensaoE , u.dimensaoF as dimensaoF , u.dimensaoG as dimensaoG ,  u.dimensaoA_2014 as dimensaoA_2014 , u.dimensaoB_2014 as dimensaoB_2014 , u.dimensaoC_2014 as dimensaoC_2014 , u.dimensaoD_2014 as dimensaoD_2014 , u.dimensaoE_2014 as dimensaoE_2014 , u.dimensaoF_2014 as dimensaoF_2014 , u.dimensaoG_2014 as dimensaoG_2014 , u.dimensaoA_2015 as dimensaoA_2015 , u.dimensaoB_2015 as dimensaoB_2015 , u.dimensaoC_2015 as dimensaoC_2015 , u.dimensaoD_2015 as dimensaoD_2015 , u.dimensaoE_2015 as dimensaoE_2015 , u.dimensaoF_2015 as dimensaoF_2015 , u.dimensaoG_2015 as dimensaoG_2015  FROM Application\Entity\Ranking u WHERE u.idCamara = :nome ");
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
        $rankings[7] = array(
                 
                'state' => '',
                'value7'=> $ranking[0]['dimensaoA_2014'],
                
        );
          $rankings[8] = array(
                 
                'state' => '',
                'value8'=> $ranking[0]['dimensaoB_2014'],
                
        );
          $rankings[9] = array(
                 
                'state' => '',
                'value9'=> $ranking[0]['dimensaoC_2014'],
                
        );
          $rankings[10] = array(
                 
                'state' => '',
                'value10'=> $ranking[0]['dimensaoD_2014'],
                
        );
          $rankings[11] = array(
                 
                'state' => '',
                'value11'=> $ranking[0]['dimensaoE_2014'],
                
        );
    	$rankings[12] = array(
                 
                'state' => '',
                'value12'=> $ranking[0]['dimensaoF_2014'],
                
        );
    	$rankings[13] = array(
                 
                'state' => '',
                'value13'=> $ranking[0]['dimensaoG_2014'],
                
        );
    	
    	$rankings[14] = array(
                 
                'state' => '',
                'value14'=> $ranking[0]['dimensaoA_2015'],
                
        );
          $rankings[15] = array(
                 
                'state' => '',
                'value15'=> $ranking[0]['dimensaoB_2015'],
                
        );
          $rankings[16] = array(
                 
                'state' => '',
                'value16'=> $ranking[0]['dimensaoC_2015'],
                
        );
          $rankings[17] = array(
                 
                'state' => '',
                'value17'=> $ranking[0]['dimensaoD_2015'],
                
        );
          $rankings[18] = array(
                 
                'state' => '',
                'value18'=> $ranking[0]['dimensaoE_2015'],
                
        );
        $rankings[19] = array(
                 
                'state' => '',
                'value19'=> $ranking[0]['dimensaoF_2015'],
                
        );
        $rankings[20] = array(
                 
                'state' => '',
                'value20'=> $ranking[0]['dimensaoG_2015'],
                
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
    	
    	
    	
    	
    	
    	
    	
    	return new JsonModel(array('range' =>$result,'ranking'=>$rankings,'data'=>$data,'data2'=>$data2,'data3'=>$data3,'data4'=>$data4));
    	
    	
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