<?php

namespace Camara\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * CamaraController
 *
 * @author
 *
 *
 * @version
 *
 *
 */
class CamaraController extends AbstractActionController {
	protected $camaraTable;
	protected $distritoTable;
	public function indexAction() {
		$id = ( int ) $this->params ()->fromRoute ( 'id', 1 );
		$query = array ();
		$i = 0;
		$camaras = $this->getCamaraTable ()->getCamaraByDistrito ( $id );
		foreach ( $camaras as $camara ) {
			$distrito = $this->getDistritoTable ()->getDistrito ( $camara->distrito );
			$query [$i ++] = array (
					'id' => $camara->id,
					'distrito' => $distrito->distrito,
					'camara' => $camara->nome 
			)
			;
		}
		
		return new ViewModel ( array (
				'camara' => $query ,
				'id'=>$id,
		)
		 );
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
}