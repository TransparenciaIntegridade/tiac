<?php

namespace Candidatura\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Candidatura\Form\CandidaturaForm;
use Candidatura\Model\Candidatura;
use Candidatura\Form\IndependenteForm;
use Zend\Paginator\Paginator;
use Doctrine\ORM\Tools\Pagination\Paginator as DoctrinePaginator;
use Doctrine\ORM\EntityManager;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as PaginatorAdapter;
use Zend\Authentication\AuthenticationService;



/**
 * CandidaturaController
 *
 * @author
 *
 *
 *
 * @version
 *
 *
 *
 */
class CandidaturaController extends AbstractActionController {
	
	protected $candidaturaTable;
	protected $camaraTable;
	protected $distritoTable;
	protected $postCartazTable;
	
	public function indexAction() {
		$identity = null;
		$auth = new AuthenticationService();
		if ($auth->hasIdentity()) {
			// Identity exists; get it
			$identity = $auth->getIdentity();
		}
		$query = array ();
		$i = 0;
		$id = ( int ) $this->params ()->fromRoute ( 'id', 1 );
		$candidaturas = $this->getCandidaturaTable ()->getCandidaturaByCamaraID ( $id );
		
		if ($candidaturas != null) {
			foreach ( $candidaturas as $candidatura ) {
				$camara = $this->getCamaraTable ()->getCamara ( $candidatura->camara );
				$query [$i ++] = array (
						'id' => $candidatura->id,
						'camara' => $camara->nome,
						'nome' => $candidatura->nome,
						'cor' => $candidatura->cor 
				);
			}
		}
		$camara = $this->getCamaraTable ()->getCamara ( $id );
		
		
		return new ViewModel ( array ( 
				'candidatura' => $query,
				'identity' => $identity,
				'camera' => $camara->nome,
				'id' => $camara->distrito,
		) );
	}
	
	 
	
	public function addAction() {
		$id = ( int ) $this->params ()->fromRoute ( 'id', 1 );
		$form = new CandidaturaForm();   
		$form->get ( 'submit' )->setValue ( 'Addicionar' );
		
		$request = $this->getRequest ();
		if ($request->isPost ()) {
			$candidatura = new Candidatura();
			$form->setInputFilter ( $candidatura->getInputFilter () );
			$form->setData ( $request->getPost () );
			
			
			if ($form->isValid ()) {
				$candidatura->exchangeArray ( $form->getData () );
				$color=$this->getColor($form->getData());
				
				
				$this->getCandidaturaTable()->saveCandidatura($candidatura, $id ,$color);
				
				// Redirect to list of albums
				//return $this->redirect ()->toUrl('/candidatura/add/'.$id);
			}
			
			
		
		}
		
		$distrito=$this->getCamaraTable()->getDistritoID($id);
		$distrito=$distrito->distrito;
		
		return array (
				'form' => $form,
				'id' =>$id,
				'distrito'=>$distrito,
		);
	}
	
	
	
	public function todasAction()
	{
		$auth = new AuthenticationService();
		$identity = null;
		if ($auth->hasIdentity()) {
			// Identity exists; get it
			$identity = $auth->getIdentity();
		}else{
			return $this->redirect ()->toUrl('/user/login/1');
		}
		
		return new ViewModel ( array (
				
				'flashMessages'=>$this->flashMessenger()->getCurrentMessages(),
				
		
		
		) );
		
	}
	 
	public function IndependenteAction() {
		$id = ( int ) $this->params ()->fromRoute ( 'id', 1 );
		$form = new IndependenteForm();
		$form->get ( 'submit' )->setValue ( 'Addicionar' );
	
		$request = $this->getRequest ();
		if ($request->isPost ()) {
			$independente = new Candidatura();
			$form->setInputFilter ( $independente->getInputFilter () );
			$form->setData ( $request->getPost () );
				
				
			if ($form->isValid ()) {
				$independente->exchangeArray ( $form->getData () );
				$color=$this->getColor($form->getData());
				
				$this->getCandidaturaTable()->saveCandidatura($independente, $id,$color);
	
				// Redirect to list of albums
				return $this->redirect ()->toUrl('/candidatura/independente/'.$id);
			}
				
	
			
			
		}
		$distrito=$this->getCamaraTable()->getDistritoID($id);
		$distrito=$distrito->distrito;
		
		return array (
				'form' => $form,
				'id' =>$id,
				'distrito'=>$distrito,
		);
	}
	
	public function DistritoAction()
	{
		$id = ( int ) $this->params ()->fromRoute ( 'id', 1 );
		$distrito=$this->getDistritoTable()->getDistrito($id);
		
		$distrito=$distrito->distrito;
		$camaras = $this->getCamaraTable()->getCamaraByDistrito($id);
		$i=0;
		
		$query=null;
		if ($camaras != null) {
			foreach ( $camaras as $camara ) {
				$candidaturas = $this->getCandidaturaTable()->getCandidaturaByCamaraID($camara->id);
				foreach ($candidaturas as $candidatura){
				$query [$i ++] = array (
						'id' => $candidatura->id,
						'camara' => $camara->nome,
						'nome' => $candidatura->nome,
												
				);
			}
			
			}
			
		
		
		$camara = $this->getCamaraTable ()->getCamara ( $id );
		$paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($query));
		$paginator->setCurrentPageNumber($this->params()->fromRoute('page'));
		$paginator->setItemCountPerPage(10);
		
		
		return new ViewModel ( array (
				'candidatura' => $paginator,
				'camera' => $camara->nome,
				'id' => $id,
				'distrito'=> $distrito,
				'camaras' => $this->getCamaraTable()->getCamaraByDistrito($id),
		) );
		
	
	}
	
	}
	
	public function searchAction()
	{
		$camara = $_GET["q"];
		$em = $this->getServiceLocator()
		->get('doctrine.entitymanager.orm_default');
		$data = $em->getRepository('Application\Entity\Camara')->
		findOneBy(array('nome'=>$camara));
		if(sizeof($data)>0){
		$candidaturas = $em->getRepository('Application\Entity\Lista')->
		findBy(array('idCamara'=>$data->getIdCamara()));
		
		return new ViewModel ( array ('candidatura'=>$candidaturas));
		}
	}
	
	public function orcaAction()
	{
		$listaId = ( int ) $this->params ()->fromRoute ( 'id');
		$em = $this->getServiceLocator()
		->get('doctrine.entitymanager.orm_default');
		$lista = $em->getRepository('Application\Entity\Lista')->
		find($listaId);
		if((isset($_POST['orca']))){
		$lista->setOrcamento($_POST['orca']);
		$em->persist($lista);
		$em->flush();
		return $this->redirect ()->toUrl('/candidatura/todas');
		}
		
		return array(
				
				'id'=> $listaId,
		);
		
	}
	
	public function deleteTAction()
	{
		$id = ( int ) $this->params ()->fromRoute ( 'id', 1 );
		$camara=$this->getCandidaturaTable()->getCamaraByListaID($id);
		$this->getPostCartazTable()->deleteCartazByIdLista($id);
		$this->getCandidaturaTable()->deleteCandidatura($id);
		return $this->redirect ()->toUrl('/candidatura/'.$camara->camara);
	}
	
	public function deleteAction()
	{
		$id = ( int ) $this->params ()->fromRoute ( 'id', 1 );
		$camara=$this->getCandidaturaTable()->getCamaraByListaID($id);
		$distrito = $this->getCamaraTable()->getDistritoID($camara->camara);
		$this->getPostCartazTable()->deleteCartazByIdLista($id);
		$this->getCandidaturaTable()->deleteCandidatura($id);
		return $this->redirect ()->toUrl('/candidatura/distrito/'.$distrito->distrito);
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
	
	public function getPostCartazTable() {
		if (! $this->postCartazTable) {
			$sm = $this->getServiceLocator ();
			$this->postCartazTable = $sm->get ( 'PostCartaz\Model\PostCartazTable' );
		}
		return $this->postCartazTable;
	}
	
	public function getColor($data)
	{	$color='#90ee90';
	
	$colors = array(
			'PSD'=>'#FF7F00',
			'PS'=>'#ff69b3',
			'CDS-PP'=>'#00bffe',
			'PCP'=>'#dc143b',
			'BE'=>'#fe0000'
			,);
	
		if(isset($colors[$data['nome']]))
		  $color=$colors[$data['nome']];
		
	
	return $color;
	}
	
	

}