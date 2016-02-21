<?php

namespace Festa\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application;
use Application\Entity\RatingBrinde;
use Application\Entity\PostBrinde, PostBrinde\Form\PostBrindeForm, Zend\Authentication\AuthenticationService, Imagine\Gd, Doctrine\ORM\EntityManager;
use Festa\Form\FestaForm;
use Application\Entity\Festa;
use Application\Entity\FestaImg;
use GoogleMaps;
use Application\Entity\RatingFesta;

/**
 * PostBrindeController
 *
 * @author
 *
 *
 * @version
 *
 *
 */
class FestaController extends AbstractActionController {
	/**
	 * The default action - show the home page
	 */
	protected $imagineService;
	
	public function indexAction(){}
	public function addAction() {
		$auth = new AuthenticationService ();
		$identity = null;
		if ($auth->hasIdentity ()) {
			// Identity exists; get it
			$identity = $auth->getIdentity ();
			$id_user = $identity->ID_user;
		}
		
		$idLista = ( int ) $this->params ()->fromRoute ( 'id', 1 );
		
		$em = $this->getServiceLocator ()->get ( 'doctrine.entitymanager.orm_default' );
		$exFesta = $em->getRepository('Application\Entity\Festa')->findBy(array('idLista'=>$idLista));
		$user = $em->getRepository('Application\Entity\User')->find($id_user);
		$date = new \DateTime ( "now", new \DateTimeZone ( 'Europe/London' ) );
		$date = $date->getTimestamp ();
		
		
		
		$form = new FestaForm ();
		$form->get ( 'submit' )->setAttribute ( 'label', 'Enviar' );
		
		$request = $this->getRequest ();
		if ($request->isPost ()) {
			$arr=array();
			$i=0;
			
			if($exFesta!=null){
				foreach ($exFesta as $festa){
					$arr[$i][0] = date('His', $date)-date('His', $festa->getData());
					$arr[$i++][1] = $festa->getIdFesta();
					
				}
			
			}
			$flag=0;
			$i=0;			
			foreach ($arr as $dates)
			{
				if($dates[0] < 24000){
					$flag=1;
					$festa = $em->find('Application\Entity\Festa',$dates[1]);					
				}
					
			}
				
			
			
			if($flag==0){
			
			
			$postFesta = new Festa ();
			$lista = $em->find ( 'Application\Entity\Lista', $idLista );
			
			$form->setData ( $request->getpost () );
			
			if ($form->isValid ()) {
				$data = $request->getpost ();
				$files = $this->request->getFiles ();
				$morada = $data ['morada'];
				$cidade = $lista->getIdCamara ()->getNome ();
				$id_user = $em->find ( 'Application\Entity\User', $id_user );
				
				$geoCode = $this->getGeolocation ( $morada, $cidade );
				
				if ($geoCode ['status'] == 'OK') {
					
					$postFesta->setNome ( $data ['nome'] )
							  ->setMorada ( $data ['morada'] . ', ' . $cidade )
							  ->setGmaps($geoCode['morada'])
						      ->setData ( $date )->setActive ( 0 )
							  ->setCorX ( $geoCode ['results'] ['lat'] )
						      ->setCorY ( $geoCode ['results'] ['lng'] )
						      ->setDescricao($data['descricao'])
							  ->setIdLista ( $lista )
							  ->setIdUser($user)
							  ->setNewimg(1);
					
					$em->persist ( $postFesta );
					$em->flush ();
					
					$festa = $em->getRepository ( 'Application\Entity\Festa' )->findOneBy ( array (
							'idLista' => $idLista,
							'data' => $date 
					) );
					
					$adapter = new \Zend\File\Transfer\Adapter\Http ();
					$adapter->addValidator ( 'Extension', false, array (
							'jpg',
							'png' 
					) );
					
					foreach ( $adapter->getFileInfo () as $info ) {
						
						$festaImage = new FestaImg ();
						
						if (! $adapter->isValid ()) {
							$dataError = $adapter->getMessages ();
							$error = array ();
							foreach ( $dataError as $key => $row ) {
								$error [] = $row;
							}
							$form->setMessages ( array (
									'image' => $error 
							) );
						} else {
							$adapter->setDestination ( 'public/assets/festa/' );
							
							$folder = 'public/assets/festa/';
							$originalFileName = $info ['name'];
							
							if ($adapter->receive ( $info ['name'] )) {
								rename ( $folder . $info ['name'], $folder . $id_user->getUsername () . $info ['name'] );
								
								$imagine = $this->getImagineService ();
								$size = new \Imagine\Image\Box ( 512, 512 );
								$mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
								
								$image = $imagine->open ( $folder . $id_user->getUsername () . $info ['name'] );
								$image->thumbnail ( $size, $mode )->save ( $folder . '/thumbs/' . $id_user->getUsername () . $info ['name'] );
								
								$festaImage->setIdFesta ( $festa );
								$festaImage->setImagem ( $id_user->getUsername () . $info ['name'] );
								$festaImage->setActive(0);
								$em->persist ( $festaImage );
								$em->flush ();
								
								
							}
						}
					}
				} else {
					
					$this->flashMessenger ()->addMessage ( "Aconteceu um problema" );
					return $this->redirect ()->toUrl ( '/festa/add/' . $idLista );
				}
				
				$this->flashMessenger ()->addMessage ( "A foto da Festa / Com&iacute;cio foi enviado com sucesso. Ap&oacute;s ser aprovado, o mesmo ser&aacute; publicado." );
				return $this->redirect ()->toRoute ( "home" );
			}
				
			}else{
				$form->setData ( $request->getpost () );
				if ($form->isValid ()) {
					
					$data = $request->getpost ();
					$files = $this->request->getFiles ();
					$id_user = $em->find ( 'Application\Entity\User', $id_user );
					
					$festa->setNewimg(1);
					$em->persist ( $festa );
					$em->flush ();
				
				$adapter = new \Zend\File\Transfer\Adapter\Http ();
				$adapter->addValidator ( 'Extension', false, array (
						'jpg',
						'png'
				) );
					
				foreach ( $adapter->getFileInfo () as $info ) {
				
					$festaImage = new FestaImg ();
				
					if (! $adapter->isValid ()) {
						$dataError = $adapter->getMessages ();
						$error = array ();
						foreach ( $dataError as $key => $row ) {
							$error [] = $row;
						}
						$form->setMessages ( array (
								'image' => $error
						) );
					} else {
						$adapter->setDestination ( 'public/assets/festa/' );
							
						$folder = 'public/assets/festa/';
						$originalFileName = $info ['name'];
						
						if ($adapter->receive ( $info ['name'] )) {
							rename ( $folder . $info ['name'], $folder . $id_user->getUsername () . $info ['name'] );
				
							$imagine = $this->getImagineService ();
							$size = new \Imagine\Image\Box ( 512, 512 );
							$mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
				
							$image = $imagine->open ( $folder . $id_user->getUsername () . $info ['name'] );
							$image->thumbnail ( $size, $mode )->save ( $folder . '/thumbs/' . $id_user->getUsername () . $info ['name'] );
				
							$festaImage->setIdFesta ( $festa );
							$festaImage->setImagem ( $id_user->getUsername () . $info ['name'] );
							$festaImage->setActive(0);
							$em->persist ( $festaImage );
							$em->flush ();
							$this->flashMessenger ()->addMessage ( "A foto da Festa / Com&iacute;cio foi enviado com sucesso. Ap&oacute;s ser aprovado, o mesmo ser&aacute; publicado." );
							return $this->redirect ()->toRoute ( "home" );
						}
					}
				}
				
				
				$this->flashMessenger ()->addMessage ( "A foto da Festa / Com&iacute;cio foi enviado com sucesso. Ap&oacute;s ser aprovado, o mesmo ser&aacute; publicado." );
				//return $this->redirect ()->toRoute ( "home" );
			}
				
				
				
			}
		
		} 
		
		return new ViewModel ( array (
				'form' => $form,
				'id' => $idLista,
				'identity' => $identity 
		) );
	}
	
	
	
	public function moderateAction()
	{
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
				($em->getRepository('Application\Entity\Festa')
				->findAll()));
		
		$images = $em->getRepository('Application\Entity\FestaImg')
						->findBy(array('active'=>0));
		
		
		$paginator->setCurrentPageNumber($this->params()->fromRoute('page',1));
		$paginator->setItemCountPerPage(10);
		
		
		return new ViewModel(array('festas'=> $paginator,
									'images' => $images));
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
		$festa = $em->find('Application\Entity\Festa',$id);
	
		
	
		$form = new FestaForm();
		$form->remove('image-file');
		$form->setValidationGroup('nome', 'morada');
	
		$form->setBindOnValidate(false);
		$form->bind($festa);
	
	
		$request = $this->getRequest();
		if ($request->isPost()) {
	
				
				
	
			$nonFile = $request->getPost()->toArray();
	
	
			$geoCode = $this->getGeolocationEdit($nonFile['morada']);
			
			$data = null;
			
	
			if($geoCode['status']=='OK'){
	
				//SET Entity VALUES
				$festa->setCorX($geoCode['results']['lat']);
				$festa->setCorY($geoCode['results']['lng']);
				$festa->setNome($nonFile['nome']);
				$festa->setDescricao($nonFile['descricao']);
				$festa->setMorada($nonFile['morada']);
				$festa->setGmaps($geoCode['morada']);
			
				
				
				$form->setData($nonFile);
					
				if ($form->isValid()) {
					$em->persist($festa);
					$em->flush();
						
					// Redirect to moderate festas
					return $this->redirect ()->toUrl('/festa/moderate');
	
	
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
	
	
	
	public function activateAction()
	{
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
		
		$id = (int)$this->getEvent()->getRouteMatch()->getParam('id',1);
		
		$festa = $em->find('Application\Entity\Festa',$id);
		$festa->setActive(1);
		$em->persist($festa);
		$em->flush();
	
	
			
		return $this->redirect()->toRoute('festa',array('action'=>'moderateimg','id'=>$id));
			
	}
	
	public function moderateimgAction()
	{
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
	
		$id = (int)$this->getEvent()->getRouteMatch()->getParam('id',1);
	
		$festa = $em->find('Application\Entity\Festa',$id);
		
		$images = $em->getRepository('Application\Entity\FestaImg')
						->findBy(array('idFesta'=>$id,'active'=>0));
		
		$imagesAct =  $em->getRepository('Application\Entity\FestaImg')
						->findBy(array('idFesta'=>$id,'active'=>1));
		
		$imgArr=array();
		
		$request = $this->getRequest ();
		if ($request->isPost ()) {
			
			
			foreach ($images as $img){
				
				if(isset($_POST[$img->getIdImage()])){
					$image = $em->find('Application\Entity\FestaImg',$img->getIdImage());
					$image->setActive(1);
					$em->persist($image);
					$em->flush();
					
					
				}else{
					
					
					
					
					
					$image = $em->find('Application\Entity\FestaImg',$img->getIdImage());
					$em->remove($image);
					$em->flush();
					$file = "public/assets/festa/".$img->getImagem();
					$file2 = "public/assets/festa/thumbs/".$img->getImagem();
					unlink($file);
					unlink($file2);
					
				}
			}
			
			$festa->setNewimg(0);
			$em->persist($festa);
			$em->flush();
			
			//return $this->redirect()->toRoute('deleteimg',array('action'=>'deleteimg','file1' => $imgArr));
			return $this->redirect()->toRoute('festamoderate',array('action'=>'moderate'));
		}
		
		
		
		
		return new ViewModel(array('festas'=> $festa,
				'images' => $images,
				'imagesact'=> $imagesAct));
	
			
		
		
		
		
			
	}
	
	public function upVoteAction()
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
		$distrito = (int)$this->getEvent()->getRouteMatch()->getParam('distrito',1);
		$rating = new RatingFesta();
		$idUser = $em->find('Application\Entity\User', $id_user);
		$idFesta = $em->find('Application\Entity\Festa',$id);
		$isRated = $em->getRepository('Application\Entity\RatingFesta')->find(array('idFesta'=>$id,'idUser'=>$id_user));
	
		if(sizeof($isRated)==0)
		{
			$rating->setIdFesta($idFesta)->setIdUser($idUser)->setRating(1);
			$em->persist($rating);
			$em->flush();
		}else {
			$isRated->setRating(1);
			$em->persist($isRated);
			$em->flush();
		}
	
			
		return $this->redirect ()->toUrl ( '/festa/distrito/' . $distrito );
	
	}
	
	
	
	public function downVoteAction()
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
		$distrito = (int)$this->getEvent()->getRouteMatch()->getParam('distrito',1);
		$rating = new RatingFesta();
		$idUser = $em->find('Application\Entity\User', $id_user);
		$idFesta = $em->find('Application\Entity\Festa',$id);
		$isRated = $em->getRepository('Application\Entity\RatingFesta')
					  ->find(array('idFesta'=>$id,'idUser'=>$id_user));
	
		if(sizeof($isRated)==0)
		{
			$rating->setIdFesta($idFesta)->setIdUser($idUser)->setRating(-1);
			$em->persist($rating);
			$em->flush();
		}else {
			$isRated->setRating(0);
			$em->persist($isRated);
			$em->flush();
		}
	
			
		return $this->redirect ()->toUrl ( '/festa/distrito/' . $distrito );
	}
	
	
	
	
	
	
	public function upVotecAction()
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
		$id2 = (int)$this->getEvent()->getRouteMatch()->getParam('id',2);
		$camara = (int)$this->getEvent()->getRouteMatch()->getParam('camara',1);
		$rating = new RatingFesta();
		$idUser = $em->find('Application\Entity\User', $id_user);
		$idFesta = $em->find('Application\Entity\Festa',$id);
		$isRated = $em->getRepository('Application\Entity\RatingFesta')->find(array('idFesta'=>$id,'idUser'=>$id_user));
	
		if(sizeof($isRated)==0)
		{
			$rating->setIdFesta($idFesta)->setIdUser($idUser)->setRating(1);
			$em->persist($rating);
			$em->flush();
		}else {
			$isRated->setRating(1);
			$em->persist($isRated);
			$em->flush();
		}
	
				
		return $this->redirect ()->toUrl ( '/festa/camara/' . $camara );
	
	}
	
	
	
	public function downVotecAction()
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
		$camara = (int)$this->getEvent()->getRouteMatch()->getParam('camara',1);
		$rating = new RatingFesta();
		$idUser = $em->find('Application\Entity\User', $id_user);
		$idFesta = $em->find('Application\Entity\Festa',$id);
		$isRated = $em->getRepository('Application\Entity\RatingFesta')
		->find(array('idFesta'=>$id,'idUser'=>$id_user));
	
		if(sizeof($isRated)==0)
		{
			$rating->setIdFesta($idFesta)->setIdUser($idUser)->setRating(-1);
			$em->persist($rating);
			$em->flush();
		}else {
			$isRated->setRating(0);
			$em->persist($isRated);
			$em->flush();
		}
	
			
		return $this->redirect ()->toUrl ( '/festa/camara/' . $camara );
	}
	
	
	
	
	
	
	
	
	public function distritoAction()
	{
		$auth = new AuthenticationService ();
		$identity = null;
		if ($auth->hasIdentity ()) {
			// Identity exists; get it
			$identity = $auth->getIdentity ();
			$id_user = $identity->ID_user;
		}
		
		
		$distrito = $this->params()->fromRoute('id',1);
		
		$em = $this->getServiceLocator()
		->get('doctrine.entitymanager.orm_default');
		
		$festas = $em->getRepository('Application\Entity\Festa')->findBy(array('active'=>1),array('idFesta'=>'DESC'));
		$camaras = $em->getRepository('Application\Entity\Camara')->findBy(array('idDistrito'=>$distrito));
		$votes = $em->getRepository('Application\Entity\RatingFesta')->findall();
				
		$images = $em->getRepository('Application\Entity\FestaImg')
		->findBy(array('active'=>1));
		
		$arr = array();
		$i=0;
		foreach ($festas as $festa)
		{
			
			
			if($distrito == $festa->getIdLista()->getIdCamara()->getIdDistrito()->getIdDistrito())
			$arr[$i++] = $festa;
		}
		
		
		$paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($arr));
		$paginator->setCurrentPageNumber($this->params()->fromRoute('page',1));
		$paginator->setItemCountPerPage(5);
		
		
		return new ViewModel(array(
				'festas' => $paginator,
				'votes' => $votes,
				'camaras' => $camaras,
				'images' => $images,
				'idDistrito'=>$distrito,
				'identity' => $identity,
				'flashMessages'=>$this->flashMessenger()->getCurrentMessages(),
		));
	}
	
	
	public function camaraAction()
	{
		$auth = new AuthenticationService ();
		$identity = null;
		if ($auth->hasIdentity ()) {
			// Identity exists; get it
			$identity = $auth->getIdentity ();
			$id_user = $identity->ID_user;
		}
		$id = ( int ) $this->params ()->fromRoute ( 'id', 1 );
		$em = $this->getServiceLocator()
		->get('doctrine.entitymanager.orm_default');
		$data = $em->getRepository('Application\Entity\Festa')->findBy(array('active'=>1),array('idFesta'=>'DESC'));
		$img = $em->getRepository('Application\Entity\FestaImg')->findBy(array('active' =>1));
		$votes = $em->getRepository('Application\Entity\RatingFesta')->findall();
	
		$festa = array();
		$i=0;
		foreach ($data as $festas){
			if($festas->getIdLista()->getIdcamara()->getIdCamara() == $id){
				$festa[$i++] = $festas; }}
					
				$camara = $em->getRepository('Application\Entity\Camara')->find($id);
				$distrito =$camara->getidDistrito()->getIdDistrito();
				$camaras = $em->getRepository('Application\Entity\Camara')->findBy(array(
						'idDistrito'=>$camara->getIdDistrito()->getIdDistrito()));
	
	
				$paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($festa));
				$paginator->setCurrentPageNumber($this->params()->fromRoute('page'));
				$paginator->setItemCountPerPage(10);
	
				return new ViewModel ( array (
						'id'=>$id,
						'festas' => $paginator,
						'votes' => $votes,
						'camara' => $camara,
						'camaras' => $camaras,	
						'distrito' => $distrito,					
						'images' => $img,
						'identity'=> $identity,
						'flashMessages'=>$this->flashMessenger()->getCurrentMessages(),
							
				));
	}
	
	
	
	public function deleteAction()
	{
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
		
		$view = new ViewModel();
		$view->setTerminal(true);
		$em = $this->getServiceLocator()
		->get('doctrine.entitymanager.orm_default');
		
		$id = (int)$this->getEvent()->getRouteMatch()->getParam('id',1);
		$festa = $em->find('Application\Entity\Festa',$id);
		
		$imagens = $em->getRepository('Application\Entity\FestaImg')->findBy(array('idFesta'=>$id));
		foreach ($imagens as $img){
			$file = "public/assets/festa/".$img->getImagem();
			unlink($file);
			$file = "public/assets/festa/thumbs/".$img->getImagem();
			unlink($file);
		}
		$em->remove($festa);
		$em->flush();
		
		return $this->redirect()->toRoute('festa',array('action'=>'moderate'));
		
		
	}
	
	public function deleteimgAction()
	{
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
	
		$view = new ViewModel();
		$view->setTerminal(true);
		$em = $this->getServiceLocator()
		->get('doctrine.entitymanager.orm_default');
	
		$id = (int)$this->getEvent()->getRouteMatch()->getParam('id',1);
		$image = $em->find('Application\Entity\FestaImg',$id);
	
		
		
			$file = "public/assets/festa/".$image->getImagem();
			unlink($file);
			$file = "public/assets/festa/thumbs/".$image->getImagem();
			unlink($file);
		
		$em->remove($image);
		$em->flush();
		
		
		return $this->redirect()->toRoute('festa',array('action'=>'moderateimg','id'=>$image->getIdFesta()->getIdFesta()));
	
	
	}
	
	
	
	public function getGeolocation($address, $city) {
		$request = new GoogleMaps\Request ();
		$request->setAddress ( $address . ' , ' . $city . ' , portugal' );
		$proxy = new GoogleMaps\Geocoder ();
		$response = $proxy->geocode ( $request );
		if ($response->rawBody ['status'] == 'OK') {
			return array (
					'status' => $response->rawBody ['status'],
					'results' => $response->rawBody ['results'] [0] ['geometry'] ['location'],
					'morada'=>$response->rawBody['results'][0]['formatted_address']
			);
		} else {
			return array (
					'status' => $response->rawBody ['status'],
					'results' => $response->rawBody 
			);
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
					'results' => $response->rawBody['results'][0]['geometry']['location'],
					'morada'=>$response->rawBody['results'][0]['formatted_address']);
		}else{
			return array('status'  => $response->rawBody['status'],
					'results' => $response->rawBody);
		}
	
	}
	
	
	public function getImagineService() {
		if ($this->imagineService === null) {
			$this->imagineService = new \Imagine\Gd\Imagine ();
		}
		return $this->imagineService;
	}
}