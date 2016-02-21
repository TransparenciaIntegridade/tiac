<?php

namespace PostCartaz\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Cartaz\Model\Cartaz;
use Cartaz\Form\CartazForm;
use Zend\Authentication\AuthenticationService;
use HighRoller\PieChart;
use HighRoller\SeriesData;
use GoogleMaps;
use Application\View\Helper;



/**
 * DistritoController
 *
 * @author
 *
 * @version
 *
 */
class PostCartazController extends AbstractActionController {  
	/**
	 * The default action - show the home page
	 */
	protected $cartazTable;
	protected $postCartazTable;
	protected $camaraTable;
	protected $distritoTable;
	protected $candidaturaTable;
	protected $imagineService;
	
	
	public function addAction() {
		
		/*what i need - cor_x
					  - cor_y
		  Protecção contra ID_lista que não existe 
		*/
		
		// Instanciando o Date Format do Zend para pegar o timezone atual
		$date =  new \DateTime("now", new \DateTimeZone('Europe/London'));
		//$date= date("Y-m-d H:i:s", $date->getTimestamp());	
		
		
		$id_lista = ( int ) $this->params ()->fromRoute ( 'id', 1 );
		$auth = new AuthenticationService();
		
		$identity = null;
		if ($auth->hasIdentity()) {
			// Identity exists; get it
			$identity = $auth->getIdentity();
			$id_user = $identity->ID_user;
		}
		
		$id_camara = $this->getCandidaturaTable()->getCamaraByListaID($id_lista);
		$cidade = $this->getCamaraTable()->getCamara($id_camara->camara);
		$cidade = $cidade->nome;
		$id_camara=$id_camara->camara;
		
		
		$form = new CartazForm();
		$option_for_select = $this->getCartazTable()->getCartazes();
		
		
		$form->add(array(
				'name' => 'nome',
				'type' => 'Zend\Form\Element\Select',
				'attributes' => array(
						'options' => $option_for_select,
				),
				'options' => array(
						'label' => 'Seleciona tamanho do cartaz:',
				),
		));
		$form->add(array(
				'name' => 'morada',
				'attributes' => array(
						'type'  => 'text',
						'required' => 'required',
						'placeholder' => 'Introduza uma morada'
				),
				'options' => array(
						'label' => 'Morada',
				),
		));
		$form->add(array(
				'name' => 'fileupload',
				'attributes' => array(
						'type'  => 'file',
				),
				'options' => array(
						'label' => 'Upload do Cartaz',
				),
		));
		$form->add(array(
				'name' => 'submit',
				'attributes' => array(
						'type'  => 'submit',
						'value' => 'Enviar', 
						'id' => 'submitbutton',
				),
		));
		
		$request = $this->getRequest();
		if ($request->isPost()) {
			 
			$profile = new Cartaz();
			$form->setInputFilter($profile->getInputFilter());
			 
			$nonFile = $request->getPost()->toArray();
			
			
			$geoCode = $this->getGeolocation($nonFile['morada'],$cidade);
			$File = $this->params()->fromFiles('fileupload');
			$data = null;
			
			
			if($geoCode['status']=='OK'){
			$nonFile['morada']=	$nonFile['morada'].', '.$cidade;
				
			$data = array_merge(
					$nonFile,
					array('fileupload'=> $File['name'],
						  'cor_x' => $geoCode['results']['lat'],
						  'cor_y' => $geoCode['results']['lng'], 
						)					
			);
			$form->setData($data);
			
			
			if ($form->isValid()) {
			
			
					
				$adapter = new \Zend\File\Transfer\Adapter\Http();
				$adapter->addValidator('Extension', false, array('jpg', 'png'));
			
					
				if (!$adapter->isValid()){
					$dataError = $adapter->getMessages();
					$error = array();
					foreach($dataError as $key=>$row)
					{
						$error[] = $row;
					}
					$form->setMessages(array('fileupload'=>$error ));
				} else {
					$adapter->setDestination('public/assets/cartaz/');
						
						
						
						
					$folder = 'public/assets/cartaz/';
					$originalFileName = $File['name'];
			
					if ($adapter->receive($File['name'])) {
						rename($folder.$File['name'], $folder .$date->getTimestamp().$File['name']);
						
						$em = $this->getServiceLocator()
						->get('doctrine.entitymanager.orm_default');
						$cartazes = $em->getRepository('Application\Entity\PostCartaz')->findAll();
						$proximity=0;
						foreach ($cartazes as $cartaz)
						{
							
							
						if($cartaz->getIdLista()->getIdLista()==$id_lista){
						
							$start = array($data['cor_x'],$data['cor_y']);
							$finish = array((float)$cartaz->getCorX(),(float)$cartaz->getCorY());
							
							$theta = $start[1] - $finish[1];
							$distance = (sin(deg2rad($start[0])) * sin(deg2rad($finish[0]))) + (cos(deg2rad($start[0])) * cos(deg2rad($finish[0])) * cos(deg2rad($theta)));
							$distance = acos($distance);
							$distance = rad2deg($distance);
							$distance = $distance * 60 * 1.1515;
							$distance = round($distance, 2);
							 
							$distance = $distance * 1.609344;
							
								if($distance<=0.05){
									$proximity=1;
								}
							}
						
						}
			
						$this->getPostCartazTable()->saveCartaz($data, $id_user, $id_lista, $date,$proximity);
						$imagine = $this->getImagineService();
						$size = new \Imagine\Image\Box(512, 512);
						$mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
						
						$image = $imagine->open($folder .$date->getTimestamp().$File['name']);
						$image->thumbnail($size, $mode)->save($folder .'/thumbs/'.$date->getTimestamp().$File['name']);
						
					}
						
					$this->flashMessenger()->addSuccessMessage("O cartaz foi enviado com sucesso. Ap&oacute;s ser aprovado, o mesmo ser&aacute; publicado.");
					return $this->redirect()->toUrl("/post-cartaz/global");
						
					}
				}
			
			
			}else{
				
				//Error Messages
				$this->flashMessenger()->addErrorMessage('Morada Invalida');
			}
			
			//set data post and file ...
			
			
			
			
		}
		
		
		
		return new ViewModel (array (
				'cartaz' => $this->getCartazTable()->fetchAll(), 
				'form' =>$form,
				'id' =>$id_lista,
				'camara'=>$id_camara,
				'identity' => $identity,
				'flashSucess' => $this->flashMessenger()->getSuccessMessages(),
				'flashError' => $this->flashMessenger()->getErrorMessages(),
				
				));
	}
	
	
	
	public function ModerateAction()
	{
		//return new ViewModel(array('cartaz'=>$this->getPostCartazTable()->fetchAllInactive()));
		
		$auth = new AuthenticationService();
		$identity = null;
		if ($auth->hasIdentity()) {
			// Identity exists; get it
			$identity = $auth->getIdentity();
			if($identity->user_group==0)
				return $this->redirect()->toRoute('home');
			$id_user = $identity->ID_user;
		}else{
			return $this->redirect()->toRoute('home');
		}
		
		
		$em = $this->getServiceLocator()
		->get('doctrine.entitymanager.orm_default');
		$paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter
				($em->getRepository('Application\Entity\PostCartaz')
						->findBy(array('active'=>0))));
		$paginator->setCurrentPageNumber($this->params()->fromRoute('page',1));
		$paginator->setItemCountPerPage(10);
		
		
		return new ViewModel(array('cartaz'=> $paginator));
		
		
	}
	
	
	public function editAction()
	{
		$auth = new AuthenticationService();
		$identity = null;
		if ($auth->hasIdentity()) {
			// Identity exists; get it
			$identity = $auth->getIdentity();
			$id_user = $identity->ID_user;
		}
		
		$em = $this->getServiceLocator()
		->get('doctrine.entitymanager.orm_default');
		
		
		$id = (int)$this->getEvent()->getRouteMatch()->getParam('id',1);
		$cartaz = $em->find('Application\Entity\PostCartaz',$id);
		$cartazes = $em->getRepository('Application\Entity\PostCartaz')->findAll();
		
		
		$form = new CartazForm();
		$option_for_select = $this->getCartazTable()->getCartazes();
		
		
		$form->add(array(
				'name' => 'nome',
				
				'type' => 'Zend\Form\Element\Select',
				'attributes' => array(
						'options' => $option_for_select,
						'value' =>$cartaz->getIdCartaz()->getIdCartaz(),
				),
				'options' => array(
						'label' => 'Seleciona tamanho do cartaz:',
						
				),
				
		));
		$form->add(array(
				'name' => 'morada',
				'attributes' => array(
						'type'  => 'text',
						'required' => 'required',
						'placeholder' => 'Introduza uma morada'
				),
				'options' => array(
						'label' => 'Morada',
				),
		));
		
		$form->add(array(
				'name' => 'submit',
				'attributes' => array(
						'type'  => 'submit',
						'value' => 'Enviar',
						'id' => 'submitbutton',
				),
		));
		
		$form->setBindOnValidate(false);
		$form->bind($cartaz);
		
		
		$request = $this->getRequest();
		if ($request->isPost()) {
		
			
			
		
			$nonFile = $request->getPost()->toArray();
				
				
			$geoCode = $this->getGeolocationEdit($nonFile['morada']);
			$File = $this->params()->fromFiles('fileupload');
			$data = null;
				
				
			if($geoCode['status']=='OK'){
				
					
					
					
					foreach ($cartazes as $c)
					{
							
						
						if($c->getIdLista()->getNome()==$cartaz->getIdLista()->getNome()){
							
							
							
							$start = array($geoCode['results']['lat'],$geoCode['results']['lng']);
							$finish = array((float)$c->getCorX(),(float)$c->getCorY());
								
							$theta = $start[1] - $finish[1];
							$distance = (sin(deg2rad($start[0])) * sin(deg2rad($finish[0]))) + (cos(deg2rad($start[0])) * cos(deg2rad($finish[0])) * cos(deg2rad($theta)));
							$distance = acos($distance);
							$distance = rad2deg($distance);
							$distance = $distance * 60 * 1.1515;
							$distance = round($distance, 2);
					
							$distance = $distance * 1.609344;
														
							
							
							if($distance<=0.05){
								$cartaz->setProximity(1);
								break;
							}else{
								$cartaz->setProximity(0);
								
							}
							
						}
					
					}	
					$cartaz->setCorX($geoCode['results']['lat']);
					$cartaz->setCorY($geoCode['results']['lng']);
					$cartaz->setIdCartaz($em->find('Application\Entity\Cartaz',$nonFile['nome']));
					$cartaz->setMorada($nonFile['morada']);
				
				
				$form->setData($nonFile);
					
				if ($form->isValid()) {
						$em->persist($cartaz);
        				$em->flush();
					
					// Redirect to list of albums
					return $this->redirect ()->toUrl('/post-cartaz/moderate');
						
						
				}
			}
		}
		
		
		
		return new ViewModel (array (
				
				'form' =>$form,
				'id'=>$id,
				'identity' => $identity,
				'flashSucess' => $this->flashMessenger()->getSuccessMessages(),
				'flashError' => $this->flashMessenger()->getErrorMessages(),
		
		));
		
		
		
	}
	
	
	public function ActivateAction()
	{
		$id = ( int ) $this->params ()->fromRoute ( 'id', 1 );
		$this->getPostCartazTable()->activateCartaz($id);
		return $this->redirect ()->toUrl('/post-cartaz/moderate');
	}
	
	public function deleteAction()
	{ 
		$id = ( int ) $this->params ()->fromRoute ( 'id', 1 );
		$cartaz=$this->getPostCartazTable()->getCartaz($id);
		
		$file = "public/assets/cartaz/".$cartaz->image;
		unlink($file);
		$file = "public/assets/cartaz/thumbs/".$cartaz->image;
		unlink($file);
		$this->getPostCartazTable()->deleteCartaz($id);
		return $this->redirect ()->toUrl('/post-cartaz/moderate');
	}
	
	
	public function cartazAction()
	{
		$id_cartaz = ( int ) $this->params ()->fromRoute ( 'id', 1 );
		$em = $this->getServiceLocator()
		->get('doctrine.entitymanager.orm_default');
		$cartaz = $em->getRepository('Application\Entity\PostCartaz')->find($id_cartaz);
		
		
		
		
			$markers= array($this->getAdress($cartaz->getCorX(), $cartaz->getCorY())=>$cartaz->getCorX().','.$cartaz->getCorY());
		
		 
		
		 
		$config = array(
				'sensor' => 'true',         //true or false
				'div_id' => 'map',          //div id of the google map
				'div_class' => 'gmaps1',    //div class of the google map
				'zoom' => 16,                //zoom level
				'width' => "400px",         //width of the div
				'height' => "400px",        //height of the div
				'lat' => $cartaz->getCorX(),         //lattitude
				'lon' => $cartaz->getCorY(),         //longitude
				'animation' => 'none',      //animation of the marker
				'markers' => $markers       //loading the array of markers
		);
		$map = new googlemaps\GoogleMap('AIzaSyDtjpPSAY925Ecdb7R3pA-GMhCcczIYtHg');
		//$map = $this->getServiceLocator()->get('GMaps\Service\GoogleMap'); //getting the google map object using service manager
		$map->initialize($config);                                         //loading the config
		$html = $map->generate();                                          //genrating the html map content
		//passing it to the view
	
				
		
		
		
		
		
		
		
		
		
		return new ViewModel(array('cartaz'=> $cartaz,'map_html' => $html,));
	}
	
	
	public function camaraAction()
	{
		//TODO calcular despesa a nivel de camara - grafico
		$auth = new AuthenticationService();
		$identity = null;
		if ($auth->hasIdentity()) {
			// Identity exists; get it
			$identity = $auth->getIdentity();
		}
		
		$id_camara = ( int ) $this->params ()->fromRoute ( 'id', 1 );
		$em = $this->getServiceLocator()
		->get('doctrine.entitymanager.orm_default');
		$data = $em->getRepository('Application\Entity\PostCartaz')->findBy(array('active'=>1),array('idPost'=>'DESC'));
		$i=0;
		$Cartazes=array();
		foreach ($data as $cartaz){
			if($id_camara == $cartaz->getIdLista()->getIdCamara()->getIdCamara()){
				$Cartazes[$i++]= $cartaz;}}
		$paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($Cartazes));
		$paginator->setCurrentPageNumber($this->params()->fromRoute('page'));
		$paginator->setItemCountPerPage(10);
		
		$candidaturas  = $this->getCandidaturaTable()->getCandidaturaByCamaraID($id_camara);
		
		$data=array();
		$i=0;
		
		foreach ($candidaturas as $candidatura)
		{
			
			$data[$candidatura->nome]['name']=$candidatura->nome;
			$data[$candidatura->nome]['color']=$candidatura->cor;
			if(!isset($data[$candidatura->nome]['y']))
				$data[$candidatura->nome]['y']=0;
			
			$postCartaz = $this->getPostCartazTable()->getcartazbyIdLista($candidatura->id);
				
				
			foreach ($postCartaz as $cartaz)
			{
				
				if($cartaz->active){
					
				
				$precocartaz = $this->getCartazTable()->getcartazbyId($cartaz->id_cartaz);
		
			
		
				foreach ($precocartaz as $preco)
				{
						
					$data[$candidatura->nome]['y']+=$preco->preco;
						
				}
		
			
			}
			}
				
				
			}
			
		
	    
		//graph
		
		$line = new PieChart();
		$line->title->text = 'Gastos';
		
		$serie = new SeriesData();
		
		$categorie = array ();
		$vendidos = array ();
		$i = 0;
		
		
		$chartData = $data;
		
		foreach ( $chartData as $value ){
			if($value['y']>0)
			$serie->addData ( $value );
			
		}
		
		$line->addSeries ( $serie );
		$line->chart->backgroundColor = '#cccccc';
		
		$candidaturas  = $this->getCandidaturaTable()->getCandidaturaByCamaraID($id_camara);
		$postCartaz=array();
		$i=0;
		foreach ($candidaturas as $candidatura)
		$postCartaz [$i++]= $this->getPostCartazTable()->getcartazbyIdLista($candidatura->id);
		
		
		
		$camara = $em->getRepository('Application\Entity\Camara')->find($id_camara);
		$distrito = $camara->getIdDistrito()->getIdDistrito();
		$camaras = $em->getRepository('Application\Entity\Camara')->findBy(array('idDistrito'=>$camara->getIdDistrito()->getIdDistrito()));
		
		
		
		return new ViewModel ( array ( 
				'id' => $id_camara,
				'camara' => $camara,
				'camaras' => $camaras,
				'highroller' => $line,
				'data' => $postCartaz,
				'cartaz' => $paginator,
				'identity' => $identity,
				'distrito' =>$distrito,
			    
				) );
		
		
		
		
	}	
	
	public function distritoAction()
	{
		$id_distrito = ( int ) $this->params ()->fromRoute ( 'id', 1 );
		$em = $this->getServiceLocator()
		->get('doctrine.entitymanager.orm_default');
		
		$distrito = $em->getRepository('Application\Entity\Distrito')->find($id_distrito);
		
		$auth = new AuthenticationService();
		$identity = null;
		if ($auth->hasIdentity()) {
			// Identity exists; get it
			$identity = $auth->getIdentity();
		}
		
		
		$camaras=$this->getCamaraTable()->getCamaraByDistrito($id_distrito);
		$data=array();
		$i=0;
		$arr = array();
		foreach ($camaras as $camara)
		{
		$candidaturas  = $this->getCandidaturaTable()->getCandidaturaByCamaraID($camara->id);
		
		
		
		foreach ($candidaturas as $candidatura)
		{
			
			$data[$candidatura->nome]['name']=$candidatura->nome;
			$data[$candidatura->nome]['color']=$candidatura->cor;
			if(!isset($data[$candidatura->nome]['y']))
				$data[$candidatura->nome]['y']=0;
			
			$postCartaz = $this->getPostCartazTable()->getcartazbyIdLista($candidatura->id);
				
				
			foreach ($postCartaz as $cartaz)
			{
				$arr[$i++]=$cartaz;
				if($cartaz->active){
		
				$precocartaz = $this->getCartazTable()->getcartazbyId($cartaz->id_cartaz);
		
		
		
				foreach ($precocartaz as $preco)
				{
						
					$data[$candidatura->nome]['y']+=$preco->preco;
						
				}
		
				}
			}
			
				
				
			}
			
		}
		
		
		//graph
		
		$line = new PieChart();
		$line->title->text = 'Gastos'; 
		
		$serie = new SeriesData();
		
		$categorie = array ();
		$vendidos = array ();
		$i = 0;
		
		
		$chartData = $data;
		
		foreach ( $chartData as $value ){
			if($value['y']>0)
			$serie->addData ( $value );
			
		}
		
		$line->addSeries ( $serie );
		$line->chart->backgroundColor = '#cccccc';
		$Cartazes = array();
		$i=0;
		$data = $em->getRepository('Application\Entity\PostCartaz')->findBy(array('active'=>1));
		foreach ($data as $cartaz){
		if($id_distrito == $cartaz->getIdLista()->getIdCamara()->getIdDistrito()->getIdDistrito()){
		$Cartazes[$i++]= $cartaz;}}
		
		$paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($Cartazes));
		$paginator->setCurrentPageNumber($this->params()->fromRoute('page'));
		$paginator->setItemCountPerPage(20);
	
		$camaras=$this->getCamaraTable()->getCamaraByDistrito($id_distrito);
		
		return new ViewModel ( array (
				'highroller' => $line,
				'data' => $paginator,
				'id'=> $id_distrito,
				'distrito' => $distrito,
				'camaras' => $camaras,
				'identity' => $identity,
				
				 
		) );
		
	}
	
	
	public function globalAction()
	{
		$em = $this->getServiceLocator()
		->get('doctrine.entitymanager.orm_default');
		$data = $em->getRepository('Application\Entity\PostCartaz')->findBy(array('active'=>1));
		$paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($data));
		$paginator->setCurrentPageNumber($this->params()->fromRoute('page'));
		$paginator->setItemCountPerPage(30);
		
		$auth = new AuthenticationService();
		$identity = null;
		if ($auth->hasIdentity()) {
			// Identity exists; get it
			$identity = $auth->getIdentity();
		}
		
		$distritos = $this->getDistritoTable()->fetchAll();
		$data=array();
		$i=0;
		$cat=array();
		foreach ($distritos as $distrito){
		$camaras=$this->getCamaraTable()->getCamaraByDistrito($distrito->id);
		
		foreach ($camaras as $camara)
		{
			$candidaturas  = $this->getCandidaturaTable()->getCandidaturaByCamaraID($camara->id);
		
		
		
			foreach ($candidaturas as $candidatura)
			{
					
				$data[$candidatura->nome]['name']=$candidatura->nome;
				$data[$candidatura->nome]['color']=$candidatura->cor;
				if(!isset($data[$candidatura->nome]['y'])){
					$data[$candidatura->nome]['y']=0;
					//$cat[$i++]=$candidatura->nome;
				}
				$postCartaz = $this->getPostCartazTable()->getcartazbyIdLista($candidatura->id);
				
		
				foreach ($postCartaz as $cartaz)
				{
					if($cartaz->active){
		
					$precocartaz = $this->getCartazTable()->getcartazbyId($cartaz->id_cartaz);
		
		
		
					foreach ($precocartaz as $preco)
					{
		
						$data[$candidatura->nome]['y']+=$preco->preco;
		
					}
					
					
					}
		
		
				}
					
		
		
			}
				
		}
		
		}
		
		//graph
		
		$line = new PieChart();
		$line->title->text = 'Gastos';
		
		$serie = new SeriesData();
		
		
		
		$chartData = $data;
		
		foreach ( $chartData as $value ){
			if($value['y']>0)
			$serie->addData ( $value );
			
		}
		
		
		$line->addSeries ( $serie );
		$line->chart->backgroundColor = '#cccccc';
		
		
		
		
		
		return new ViewModel ( array (
				//'albums' => $this->getAlbumTable ()->fetchAll (),
				'highroller' => $line,
				'cartaz' => $paginator,
				'flashSucess' => $this->flashMessenger()->getCurrentSuccessMessages(),
				'identity' => $identity,
					
		) );
		
	}
	
	
	public function getCartazTable() {
		if (! $this->cartazTable) {
			$sm = $this->getServiceLocator ();
			$this->cartazTable = $sm->get ( 'Cartaz\Model\CartazTable' );
		}
		return $this->cartazTable;
	}
	
	public function getPostCartazTable() {
		if (! $this->postCartazTable) {
			$sm = $this->getServiceLocator ();
			$this->postCartazTable = $sm->get ( 'PostCartaz\Model\PostCartazTable' );
		}
		return $this->postCartazTable;
	}
	
	public function getCandidaturaTable() {
		if (! $this->candidaturaTable) {
			$sm = $this->getServiceLocator ();
			$this->candidaturaTable = $sm->get ( 'Candidatura\Model\CandidaturaTable' );
		}
		return $this->candidaturaTable;
	}
	
	public function getCamaraTable() {
		if (! $this->camaraTable) {
			$sm = $this->getServiceLocator ();
			$this->camaraTable = $sm->get ( 'Camara\Model\CamaraTable' );
		}
		return $this->camaraTable;
	}
	
	public function getDistritoTable() {
		if (! $this->distritoTable) {
			$sm = $this->getServiceLocator ();
			$this->distritoTable = $sm->get ( 'Distrito\Model\DistritoTable' );
		}
		return $this->distritoTable;
	}
	
	public function getGeolocation($address,$city)
	{		 
		$request = new GoogleMaps\Request();
		$request->setAddress($address .' , '. $city .' , portugal');
		$proxy = new GoogleMaps\Geocoder();
		$response = $proxy->geocode($request);
		if($response->rawBody['status']=='OK'){
		return array('status'  => $response->rawBody['status'],
					 'results' => $response->rawBody['results'][0]['geometry']['location']);
		}else{
			return array('status'  => $response->rawBody['status'],
					'results' => $response->rawBody);
		}		
		
	}
	
	
	public function getGeolocationEdit($address)
	{
		$request = new GoogleMaps\Request();
		$request->setAddress($address .' , portugal');
		$proxy = new GoogleMaps\Geocoder();
		$response = $proxy->geocode($request);
		if($response->rawBody['status']=='OK'){
			return array('status'  => $response->rawBody['status'],
					'results' => $response->rawBody['results'][0]['geometry']['location']);
		}else{
			return array('status'  => $response->rawBody['status'],
					'results' => $response->rawBody);
		}
	
	}
	
	
	public function getImagineService()
	{
		if ($this->imagineService === null)
		{
			$this->imagineService = new \Imagine\Gd\Imagine();
		}
		return $this->imagineService;
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