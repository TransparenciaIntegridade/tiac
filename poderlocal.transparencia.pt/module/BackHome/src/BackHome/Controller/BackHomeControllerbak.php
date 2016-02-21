<?php

namespace BackHome\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Authentication\AuthenticationService;
//use GMaps\Service\GoogleMap;

mb_internal_encoding("UTF-8"); 

use HighRoller\PieChart;
use HighRoller\SeriesData;
use GoogleMaps;


/**
 * NewZendController
 *
 * @author
 *
 * @version
 *
 */
class BackHomeController extends AbstractActionController {
	/**
	 * The default action - show the home page
	 */
	public function indexAction() {
		
		//TODO user check system wide
		//TODO user group system wide
		//TODO Post_cartaz views
		//TODO listas,cartaz - delete
		//TODO calcular despesa - partidos
		//TODO Brindes
		//TODO activate User
		//TODO Moderate Cartaz - brindes
		//TODO Graph - camara - distrito - global
		
		
		
		$auth = new AuthenticationService(); 

        $identity = null;
        if ($auth->hasIdentity()) {
            // Identity exists; get it
            $identity = $auth->getIdentity();
            
                     
        }
        
        $em = $this->getServiceLocator()
        ->get('doctrine.entitymanager.orm_default');
        
        $cartazes =	$em->getRepository('Application\Entity\PostCartaz')
        ->findBy(array('active'=>1));
        
        $listas  =	$em->getRepository('Application\Entity\Lista')
        ->findBy(array(), array('nome'=>'ASC'));
        
               
       $orca = array();
       $sec = array();
       $ter = array();
        
        foreach ($listas as $lista){
        	if(($lista->getNome()=='PS')||($lista->getNome()=='PSD')||($lista->getNome()=='CDU')||($lista->getNome()=='BE')||($lista->getNome()=='CDS-PP')||($lista->getNome()=='PSD/CDS-PP')){
	        	if(!isset($orca[$lista->getNome()]['y'])){
	        		$orca[$lista->getNome()]['name']=$lista->getNome();
	        		$orca[$lista->getNome()]['y']=0;
	        		$orca[$lista->getNome()]['color']=$lista->getCor();
	        	}
        	$orca[$lista->getNome()]['y']+= $lista->getOrcamento();
        	}elseif((strpos($lista->getNome(), 'PSD') !== FALSE)){
        			if(!isset($sec[$lista->getNome()]['y'])){
        				$sec[$lista->getNome()]['name']=$lista->getNome();
        				$sec[$lista->getNome()]['y']=0;
        				$sec[$lista->getNome()]['color']=$lista->getCor();
        			}
        				$sec[$lista->getNome()]['y']+= $lista->getOrcamento();
        		
        	}else {
        		
        		if(!isset($ter[$lista->getNome()]['y'])){
        			$ter[$lista->getNome()]['name']=$lista->getNome();
        			$ter[$lista->getNome()]['y']=0;
        			$ter[$lista->getNome()]['color']=$lista->getCor();
        			}
        		$ter[$lista->getNome()]['y']+= $lista->getOrcamento();
        	}
        	        	
        }
        
        
       
        ////////////////////////////////////////////
        //brinde mais votado
        
        $ratings = $em->getRepository('Application\Entity\RatingBrinde')
        ->findAll();
        
        $maior = array(0,0);
        
        $arr = array();
        
        foreach ($ratings as $rating){
        	if(!isset($arr[$rating->getIdBrinde()->getIdBrinde()])){
        
        		 
        		$arr[$rating->getIdBrinde()->getIdBrinde()]['idBrinde']=$rating->getIdBrinde()->getIdBrinde();
        		$arr[$rating->getIdBrinde()->getIdBrinde()]['votes']=0;
        		 
        	}
        	 
        	$arr[$rating->getIdBrinde()->getIdBrinde()]['votes']+=$rating->getRating();
        }
        
        
        
        foreach ($arr as $brinde){
        	if($brinde['votes']>$maior[1]){
        		$maior[0]=$brinde['idBrinde'];
        		$maior[1]=$brinde['votes'];
        	}
        }
        
        
        
        
        $brinde = $em->getRepository('Application\Entity\PostBrinde')
        ->find($maior[0]);
        
        if($brinde!=null)
        	$brinde = $brinde->getImage();
         
        //////////////////////////////////////////////////////////////////////////
        
        //////////////////////////////////////////////////////////////////////////
        ///////////////// Festa + votado /////////////////////////////////////////
        
        
        $ratings = $em->getRepository('Application\Entity\RatingFesta')
        ->findAll();
        $festa = $em->getRepository('Application\Entity\Festa')
        ->findby(array('active'=>1));
        
        $arr=array();
        $i=0;
        foreach ($ratings as $rate)
        {
        	foreach ($festa as $f)
        	if($rate->getIdFesta()->getIdFesta()==$f->getIdFesta())
        	$arr[$i++]=$rate;
        }
        $ratings=$arr;
        
        $maior = array(0,0);
        
        $arr = array();
        
        foreach ($ratings as $rating){
        	if(!isset($arr[$rating->getIdFesta()->getIdFesta()])){
        
        		 
        		$arr[$rating->getIdFesta()->getIdFesta()]['idFesta']=$rating->getIdFesta()->getIdFesta();
        		$arr[$rating->getIdFesta()->getIdFesta()]['votes']=0;
        		
        		
        		 
        	}
        
        	$arr[$rating->getIdFesta()->getIdFesta()]['votes']+=$rating->getRating();
        }
        
        
        
        foreach ($arr as $festa){
        	if($festa['votes']>$maior[1]){
        		$maior[0]=$festa['idFesta'];
        		$maior[1]=$festa['votes'];
        	}
        }
        
        
       
        
        $festa = $em->getRepository('Application\Entity\Festa')
        ->find($maior[0]);
       if($festa!=null)
        $festa = $em->getRepository('Application\Entity\FestaImg')->findOneBy(array('idFesta'=>$festa->getIdFesta()));
       
        
        
        if($festa!=null)
        	$festa = $festa->getImagem();
        
        
        
        
        
        
        
        
        
        /////////////////////////////////////////////////////////////////////////
        
        //graph
        
        $line = new PieChart();
        $line->title->text = 'Orçamento por Partido';
        
        $serie = new SeriesData();
        
        
        
        $chartData = $orca;
        
        foreach ( $chartData as $value ){
        	if($value['y']>0)
        		$serie->addData ( $value );
        		
        }
        
        
        $line->addSeries ( $serie );
        
        ////////////////////////////////////////////////////////
        
        $line2 = new PieChart();
        $line2->title->text = 'Orcamento';
        
        $serie2 = new SeriesData();
        
        
        
        $chartData = $sec;
        
        foreach ( $chartData as $value ){
        	if($value['y']>0)
        		$serie2->addData ( $value );
        
        }
        
        
        $line2->addSeries ( $serie2 );
        
        //////////////////////////////////////////////////////////
        
        
        
        $line3 = new PieChart();
        $line3->title->text = 'Or';
        
        $serie3 = new SeriesData();
        
        
        
        $chartData = $ter;
        
        foreach ( $chartData as $value ){
        	if($value['y']>0)
        		$serie3->addData ( $value );
        
        }
        
        
        $line3->addSeries ( $serie3 );
        
        $markers=array(); 
        foreach ($cartazes as $cartaz){
        	$markers= array_merge(array($cartaz->getMorada()=>$cartaz->getCorX().','.$cartaz->getCorY()),$markers);
        	
        }
               
        //var_dump($orca);
       
        $config = array(
        		'sensor' => 'true',         //true or false
        		'div_id' => 'map',          //div id of the google map
        		'div_class' => 'gmaps1',    //div class of the google map
        		'zoom' => 7,                //zoom level
        		'width' => "450px",         //width of the div
        		'height' => "700px",        //height of the div
        		'lat' => 39.55488306,         //lattitude
        		'lon' => -8.08593750,         //longitude
        		'animation' => 'none',      //animation of the marker
        		'markers' => $markers       //loading the array of markers
        );
        $map = new googlemaps\GoogleMap('AIzaSyDtjpPSAY925Ecdb7R3pA-GMhCcczIYtHg');
        //$map = $this->getServiceLocator()->get('GMaps\Service\GoogleMap'); //getting the google map object using service manager
        $map->initialize($config);                                         //loading the config
        $html = $map->generate();                                          //genrating the html map content
                         //passing it to the view
        
        $distritos_acores = $this->params()->fromRoute('id',1);
        $distritos_aveiro = $this->params()->fromRoute('id',2);
        $distritos_beja = $this->params()->fromRoute('id',3);
        $distritos_braga = $this->params()->fromRoute('id',4);        
        $distritos_braganca = $this->params()->fromRoute('id',5);
        $distritos_castelo_branco = $this->params()->fromRoute('id',6);
        $distritos_coimbra = $this->params()->fromRoute('id',7);
        $distritos_evora = $this->params()->fromRoute('id',8);
        $distritos_faro = $this->params()->fromRoute('id',9);
        $distritos_guarda = $this->params()->fromRoute('id',10);
        $distritos_leiria = $this->params()->fromRoute('id',11);
        $distritos_lisboa = $this->params()->fromRoute('id',12);
        $distritos_madeira = $this->params()->fromRoute('id',13); 
        $distritos_portalegre = $this->params()->fromRoute('id',14);
        $distritos_porto = $this->params()->fromRoute('id',15);
        $distritos_santarem = $this->params()->fromRoute('id',16);
        $distritos_setubal = $this->params()->fromRoute('id',17);
        $distritos_viana_do_castelo = $this->params()->fromRoute('id',18);
        $distritos_vila_real = $this->params()->fromRoute('id',19);
        $distritos_viseu = $this->params()->fromRoute('id',20);
        
        $distrito = $em->getRepository('Application\Entity\Distrito')->findall();
        $camara_acores = $em->getRepository('Application\Entity\Camara')->findBy(array('idDistrito'=>$distritos_acores));
        $camara_aveiro = $em->getRepository('Application\Entity\Camara')->findBy(array('idDistrito'=>$distritos_aveiro));
        $camara_beja = $em->getRepository('Application\Entity\Camara')->findBy(array('idDistrito'=>$distritos_beja));
        $camara_braga= $em->getRepository('Application\Entity\Camara')->findBy(array('idDistrito'=>$distritos_braga));
        $camara_braganca = $em->getRepository('Application\Entity\Camara')->findBy(array('idDistrito'=>$distritos_braganca));
        $camara_castelo_branco= $em->getRepository('Application\Entity\Camara')->findBy(array('idDistrito'=>$distritos_castelo_branco));
        $camara_coimbra= $em->getRepository('Application\Entity\Camara')->findBy(array('idDistrito'=>$distritos_coimbra));
        $camara_evora= $em->getRepository('Application\Entity\Camara')->findBy(array('idDistrito'=>$distritos_evora));
        $camara_faro= $em->getRepository('Application\Entity\Camara')->findBy(array('idDistrito'=>$distritos_faro));
        $camara_guarda= $em->getRepository('Application\Entity\Camara')->findBy(array('idDistrito'=>$distritos_guarda));
        $camara_leiria= $em->getRepository('Application\Entity\Camara')->findBy(array('idDistrito'=>$distritos_leiria));
        $camara_lisboa= $em->getRepository('Application\Entity\Camara')->findBy(array('idDistrito'=>$distritos_lisboa));
        $camara_madeira = $em->getRepository('Application\Entity\Camara')->findBy(array('idDistrito'=>$distritos_madeira));
        $camara_portalegre= $em->getRepository('Application\Entity\Camara')->findBy(array('idDistrito'=>$distritos_portalegre));
        $camara_porto= $em->getRepository('Application\Entity\Camara')->findBy(array('idDistrito'=>$distritos_porto));
        $camara_santarem= $em->getRepository('Application\Entity\Camara')->findBy(array('idDistrito'=>$distritos_santarem));
        $camara_setubal= $em->getRepository('Application\Entity\Camara')->findBy(array('idDistrito'=>$distritos_setubal));
        $camara_viana_do_castelo= $em->getRepository('Application\Entity\Camara')->findBy(array('idDistrito'=>$distritos_viana_do_castelo));
        $camara_vila_real= $em->getRepository('Application\Entity\Camara')->findBy(array('idDistrito'=>$distritos_vila_real));
        $camara_viseu= $em->getRepository('Application\Entity\Camara')->findBy(array('idDistrito'=>$distritos_viseu));
        
        
        
        return array(
            	'identity' => $identity,
        		'map_html' => $html,
        		'flashMessages' => $this->flashMessenger()->getCurrentMessages(),
        		'brinde' => $brinde,
        		'festa' => $festa,
        		'highroller' => $line,
        		'highroller2' => $line2,
        		'highroller3' => $line3,
        		'distritos'=>$distrito,
        		'camaras_acores' => $camara_acores,
        		'camaras_aveiros' => $camara_aveiro,
        		'camaras_bejas' => $camara_beja,
        		'camaras_bragas' => $camara_braga,
        		'camaras_bragancas' => $camara_braganca,
        		'camaras_castelos_brancos' => $camara_castelo_branco,
        		'camaras_coimbras' => $camara_coimbra,
        		'camaras_evoras' => $camara_evora,
        		'camaras_faros' => $camara_faro,
        		'camaras_guardas' => $camara_guarda,
        		'camaras_leirias' => $camara_leiria,
        		'camaras_lisboas' => $camara_lisboa,
        		'camaras_madeiras' => $camara_madeira,
        		'camaras_portalegres' => $camara_portalegre,
        		'camaras_portos' => $camara_porto,
        		'camaras_santarens' => $camara_santarem,
        		'camaras_setubals' => $camara_setubal,
        		'camaras_viana_dos_castelos' => $camara_viana_do_castelo,
        		'camaras_vila_reais' => $camara_vila_real,   
        		'camaras_viseus' => $camara_viseu,
       		
        );
	}
	
	
	public function getAdress($lat,$lng)
	{
		$request = new GoogleMaps\Request();
		$request->setLatLng($lat . ',' . $lng);
		$proxy = new GoogleMaps\Geocoder();
		$response = $proxy->geocode($request);
		
		return $response->rawBody['results'][0]['formatted_address'];
	}
	
}