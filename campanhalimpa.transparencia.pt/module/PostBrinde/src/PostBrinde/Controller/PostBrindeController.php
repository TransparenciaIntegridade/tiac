<?php

namespace PostBrinde\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application;
use Application\Entity\RatingBrinde;
use Application\Entity\PostBrinde,
 	PostBrinde\Form\PostBrindeForm,
	Zend\Authentication\AuthenticationService,
	Imagine\Gd,
    Doctrine\ORM\EntityManager;


    
 
/**
 * PostBrindeController
 *
 * @author
 *
 * @version
 *
 */
class PostBrindeController extends AbstractActionController { 
	/**
	 * The default action - show the home page
	 */
	
	protected $imagineService;
	
	public function indexAction() {
		
		$auth = new AuthenticationService();
		$identity = null;
		if ($auth->hasIdentity()) {
			$identity = $auth->getIdentity();
			$id_user = $identity->ID_user;
		}
		
		$em = $this->getServiceLocator()
		->get('doctrine.entitymanager.orm_default');
		$data = $em->getRepository('Application\Entity\PostBrinde')->findBy(array('active'=>1),array('idBrinde'=>'DESC'));
		$votes = $em->getRepository('Application\Entity\RatingBrinde')->findall();
		 
		$paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($data));
		$paginator->setCurrentPageNumber($this->params()->fromRoute('page'));
		$paginator->setItemCountPerPage(30);
		return new ViewModel ( array (
				'brinde' => $paginator,
				'votes' => $votes,
				'flashMessages'=>$this->flashMessenger()->getCurrentMessages(),
				'identity' => $identity,
				
		
		) );
	}
	
	public function camaraAction()
	{
		$auth = new AuthenticationService();
		$identity = null;
		if ($auth->hasIdentity()) {
			// Identity exists; get it
			$identity = $auth->getIdentity();
		}
		$id = ( int ) $this->params ()->fromRoute ( 'id', 1 );
		$em = $this->getServiceLocator()
		->get('doctrine.entitymanager.orm_default');
		$data = $em->getRepository('Application\Entity\PostBrinde')->findBy(array('active'=>1),array('idBrinde'=>'DESC'));
		$votes = $em->getRepository('Application\Entity\RatingBrinde')->findall();
		
		$brindes = array();
		$i=0;
		foreach ($data as $brinde){
			if($brinde->getIdLista()->getIdcamara()->getIdCamara() == $id){
				$brindes[$i++] = $brinde; }}	
					
		$camara = $em->getRepository('Application\Entity\Camara')->find($id);
		$distrito = $camara->getIdDistrito()->getIdDistrito();
		$camaras = $em->getRepository('Application\Entity\Camara')->findBy(array(
				'idDistrito'=>$camara->getIdDistrito()->getIdDistrito()));
		
		
		$paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($brindes));
		$paginator->setCurrentPageNumber($this->params()->fromRoute('page'));
		$paginator->setItemCountPerPage(10);
		
		return new ViewModel ( array (
					'id'=>$id,
					'brinde' => $paginator,
					'camara' => $camara,
					'camaras' => $camaras,
					'distrito' => $distrito,
					'votes' => $votes,
					'flashMessages'=>$this->flashMessenger()->getCurrentMessages(),
				    'identity' => $identity,
		));
	}
	
	public function distritoAction()
	{
		$auth = new AuthenticationService();
		$identity = null;
		if ($auth->hasIdentity()) {
			// Identity exists; get it
			$identity = $auth->getIdentity();
		}
		$id = ( int ) $this->params ()->fromRoute ( 'id', 1 );
		$em = $this->getServiceLocator()
		->get('doctrine.entitymanager.orm_default');
		$data = $em->getRepository('Application\Entity\PostBrinde')->findBy(array('active'=>1),array('idBrinde'=>'DESC'));
		$votes = $em->getRepository('Application\Entity\RatingBrinde')->findall();
			
		$camaras = $em->getRepository('Application\Entity\Camara')->findBy(array('idDistrito'=>$id));
		$distrito = $em->getRepository('Application\Entity\Distrito')->find($id);
		
		
		
		$brindes = array();
		$i=0;
		foreach ($data as $brinde){
			if($brinde->getIdLista()->getIdcamara()->getIdDistrito()->getIdDistrito() == $id){
				$brindes[$i++] = $brinde; }}
				
		$paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($brindes));
		$paginator->setCurrentPageNumber($this->params()->fromRoute('page'));
		$paginator->setItemCountPerPage(20);
		return new ViewModel ( array (
				'brinde' => $paginator,
				'votes' => $votes,
				'distrito' => $distrito,
				'id'=> $id,
				'camaras'=>$camaras,
				'flashMessages'=>$this->flashMessenger()->getCurrentMessages(),
				'identity' => $identity,
		
		) ); 
	}
	
	public function addAction()
	{
		$auth = new AuthenticationService();
		$identity = null;
		if ($auth->hasIdentity()) {
			// Identity exists; get it
			$identity = $auth->getIdentity();
			$id_user = $identity->ID_user;
		}
		 
		$id = ( int ) $this->params ()->fromRoute ( 'id', 1 );
		
		$em = $this->getServiceLocator()
		->get('doctrine.entitymanager.orm_default');
		$camara = $em->getRepository('Application\Entity\Lista')->find($id);
		$user = $em->getRepository('Application\Entity\User')->find($id_user);
		$date =  new \DateTime("now", new \DateTimeZone('Europe/London'));
		$date= $date->getTimestamp();
		
		/*$auth = new AuthenticationService();
		$identity = null;
		if ($auth->hasIdentity()) {
			// Identity exists; get it
			$identity = $auth->getIdentity();
			$id_user = $identity->ID_user;
		}*/
		
		
		
		
		$form = new PostBrindeForm();
	
		$form->get('submit')->setAttribute('label', 'Enviar');
		
		$request = $this->getRequest();
		if ($request->isPost()) {
			$postBrinde = new PostBrinde();
			$id_lista = $em->find('Application\Entity\Lista', $id);
			$id_user = $em->find('Application\Entity\User', $id_user);
			//var_dump($id_lista);
			//$form->setInputFilter($postBrinde->getInputFilter());
			$form->setData($request->getpost());
			
			if ($form->isValid()) {
				$data = $request->getpost();
				$File = $this->params()->fromFiles('image');
				
				
				$adapter = new \Zend\File\Transfer\Adapter\Http();
				$adapter->addValidator('Extension', false, array('jpg', 'png'));
				
				if (!$adapter->isValid()){
					$dataError = $adapter->getMessages();
					$error = array();
					foreach($dataError as $key=>$row)
					{
						$error[] = $row;
					}
					$form->setMessages(array('image'=>$error ));
				} else {
					$adapter->setDestination('public/assets/brinde/');
						
						
						
						
					$folder = 'public/assets/brinde/';
					$originalFileName = $File['name'];
						
					if ($adapter->receive($File['name'])) {
						rename($folder.$File['name'], $folder .$id_user->getUsername().$File['name']);
						$postBrinde->setNome($data['nome'])
						->setDescricao($data['descricao'])
						->setImage($id_user->getUsername().$File['name'])
						->setData($date)
						->setActive(0)
						->setIdUser($user)
						->setIdLista($id_lista);
						
						$imagine = $this->getImagineService();
						$size = new \Imagine\Image\Box(512, 512);
						$mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
						
						$image = $imagine->open($folder .$id_user->getUsername().$File['name']);
						$image->thumbnail($size, $mode)->save($folder .'/thumbs/'.$id_user->getUsername().$File['name']);
						
						$em->persist($postBrinde);
						$em->flush();
				
						
					
						
					}
											
					$this->flashMessenger()->addMessage("O brinde foi enviado com sucesso. Ap&oacute;s ser aprovado, o mesmo ser&aacute; publicado.");
					return $this->redirect()->toRoute("home");
				}
				
				
			}
		}
		
		return new ViewModel(array('form' => $form,
									'id' => $id,
									'identity' => $identity,
									'camara' => $camara->getIdCamara()->getIdDistrito()->getIdDistrito(),
		));
	}


	public function ModerateAction()
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
												  ($em->getRepository('Application\Entity\PostBrinde')
				      							    ->findBy(array('active'=>0))));
		$paginator->setCurrentPageNumber($this->params()->fromRoute('page'));
		$paginator->setItemCountPerPage(10);
		
		
		return new ViewModel(array('brinde'=> $paginator)); 
			      
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
		$brinde = $em->find('Application\Entity\PostBrinde',$id);
	
	
	
		$form = new PostBrindeForm();
		$form->remove('image');
		$form->setValidationGroup('nome', 'descricao');
	
		$form->setBindOnValidate(false);
		$form->bind($brinde);
	
	
		$request = $this->getRequest();
		if ($request->isPost()) {
	
	
	
	
			$data = $request->getPost()->toArray();
	
	
				
	
				
	
	
				
	
			//SET Entity VALUES
	
			$brinde->setNome($data['nome']);
			$brinde->setDescricao($data['descricao']);
	
				
	
	
			$form->setData($data);
				
			if ($form->isValid()) {
				$em->persist($brinde);
				$em->flush();
	
				// Redirect to moderate festas
				return $this->redirect ()->toUrl('/post-brinde/moderate');
	
	
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
	
	public function upVoteAction()
	{
		$auth = new AuthenticationService();
		$identity = null;
		if ($auth->hasIdentity()) {
			// Identity exists; get it
			$identity = $auth->getIdentity();
			$id_user = $identity->ID_user;
		}
		$id2 = (int)$this->getEvent()->getRouteMatch()->getParam('id2',0);
		$id3 = (int)$this->getEvent()->getRouteMatch()->getParam('id3',0);
		
		
		$em = $this->getServiceLocator()
		->get('doctrine.entitymanager.orm_default');
		$id = (int)$this->getEvent()->getRouteMatch()->getParam('id',1);
        $rating = new RatingBrinde();
        $idUser = $em->find('Application\Entity\User', $id_user);
        $idBrinde = $em->find('Application\Entity\PostBrinde',$id);
        $isRated = $em->getRepository('Application\Entity\RatingBrinde')->find(array('idBrinde'=>$id,'idUser'=>$id_user));
        
        if(sizeof($isRated)==0)
        {
        	$rating->setIdBrinde($idBrinde)->setIdUser($idUser)->setRating(1);
        	$em->persist($rating);
        	$em->flush();
        }else {
        	$isRated->setRating(1);
        	$em->persist($isRated);
        	$em->flush();
        }
                
 			if($id2==0)
                return $this->redirect()->toRoute('postbrinde');
            if($id2==1)   
            	return $this->redirect ()->toUrl('/post-brinde/distrito/'.$id3);
            if($id2==2)
            	return $this->redirect ()->toUrl('/post-brinde/camara/'.$id3);
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
		$id2 = (int)$this->getEvent()->getRouteMatch()->getParam('id2',0);
		$id3 = (int)$this->getEvent()->getRouteMatch()->getParam('id3',0);
		
		$em = $this->getServiceLocator()
		->get('doctrine.entitymanager.orm_default');
		$id = (int)$this->getEvent()->getRouteMatch()->getParam('id',1);
        $rating = new RatingBrinde(); 
        $idUser = $em->find('Application\Entity\User', $id_user);
        $idBrinde = $em->find('Application\Entity\PostBrinde',$id);
        $isRated = $em->getRepository('Application\Entity\RatingBrinde')
        			  ->find(array('idBrinde'=>$id,'idUser'=>$id_user));
        
        if(sizeof($isRated)==0)
        {
        	$rating->setIdBrinde($idBrinde)->setIdUser($idUser)->setRating(-1);
        	$em->persist($rating);
        	$em->flush();
        }else {
        	$isRated->setRating(0);
        	$em->persist($isRated);
        	$em->flush();
        }
                
 		
                if($id2==0)
                	return $this->redirect()->toRoute('postbrinde');
            	if($id2==1)   
            		return $this->redirect ()->toUrl('/post-brinde/distrito/'.$id3);
            	if($id2==2)
            		return $this->redirect ()->toUrl('/post-brinde/camara/'.$id3);
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
		$brinde = $em->find('Application\Entity\PostBrinde',$id);
			$brinde->setActive(1);
			$em->persist($brinde);
			$em->flush();
		
	
			
		return $this->redirect()->toRoute('postbrinde',array('action'=>'moderate'));
		 
	}
	
	public function deleteAction()
	{
		$view = new ViewModel();
		$view->setTerminal(true);
		$em = $this->getServiceLocator()
		->get('doctrine.entitymanager.orm_default');
		
		$id = (int)$this->getEvent()->getRouteMatch()->getParam('id',1);
		$brinde = $em->find('Application\Entity\PostBrinde',$id);
		$em->remove($brinde);
		$em->flush();
		$file = "public/assets/brinde/".$brinde->getImage();
		unlink($file);
		$file = "public/assets/brinde/thumbs/".$brinde->getImage();
		unlink($file);
		
		
		return $this->redirect()->toRoute('postbrinde',array('action'=>'moderate'));
	}
	
	public function getImagineService()
	{
		if ($this->imagineService === null)
		{
			$this->imagineService = new \Imagine\Gd\Imagine();
		}
		return $this->imagineService;
	}
	
}