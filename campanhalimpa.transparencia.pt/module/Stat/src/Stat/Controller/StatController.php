<?php

namespace Stat\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use HighRoller\PieChart;
use HighRoller\SeriesData;

/**
 * StatController
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
class StatController extends AbstractActionController {
	public function indexAction() {
	}
	public function globalAction() {
		return array ();
	}
	public function distritoAction() {
		$partido = $this->params ()->fromRoute ( 'partido', null );
		if ($partido == null)
			return $this->redirect ()->toUrl ( '/stat/global' );
		
		return array (
				'partido' => $partido 
		);
	}
	public function camaraAction() {
		$distrito = $this->params ()->fromRoute ( 'id', null );
		$partido = $this->params ()->fromRoute ( 'partido', null );
		if ($partido == null || $distrito == null)
			return $this->redirect ()->toUrl ( '/stat/global' );
		
		return array (
				
				'distrito' => $distrito,
				'partido' => $partido 
		);
	}
	public function camaratodosAction() {
		$camara = $this->params ()->fromRoute ( 'id', null );
		if ($camara == null)
			return $this->redirect ()->toUrl ( '/stat/global' );
		
		return array (
				
				'camara' => $camara 
		);
	}
	
	
	public function cartazAction() {
		
		$em = $this->getServiceLocator()
		->get('doctrine.entitymanager.orm_default');
		
		$cartazes =	$em->getRepository('Application\Entity\PostCartaz')
		->findBy(array('active'=>1));
		
		$orca = array();
		
		
		foreach ($cartazes as $cartaz){
			if(($cartaz->getIdLista()->getNome()=='PS')||($cartaz->getIdLista()->getNome()=='PSD')||($cartaz->getIdLista()->getNome()=='CDU')||($cartaz->getIdLista()->getNome()=='BE')||($cartaz->getIdLista()->getNome()=='CDS-PP')||($cartaz->getIdLista()->getNome()=='PSD/CDS-PP')){
				if(!isset($orca[$cartaz->getIdLista()->getNome()]['y'])){
					$orca[$cartaz->getIdLista()->getNome()]['name']=$cartaz->getIdLista()->getNome();
					$orca[$cartaz->getIdLista()->getNome()]['y']=0;
					$orca[$cartaz->getIdLista()->getNome()]['color']=$cartaz->getIdLista()->getCor();
				}
		
			}
			$orca[$cartaz->getIdLista()->getNome()]['y']+= $cartaz->getIdCartaz()->getPreco();
		}
		
		
		$result = new ViewModel( array (
		
				'cartaz' => $orca
		));
		$this->layout('layout/empty');
		
		return $result;
	}
	
}