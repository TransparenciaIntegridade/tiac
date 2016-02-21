<?php

namespace Distrito\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;



/**
 * DistritoController
 *
 * @author
 *
 * @version
 *
 */
class DistritoController extends AbstractActionController {
	/**
	 * The default action - show the home page
	 */
	protected $distritoTable;
	
	public function indexAction() {
		
		return new ViewModel (array (
				'distrito' => $this->getDistritoTable()->fetchAll(),
				));
	}
	
	
	public function getDistritoTable() {
		if (! $this->distritoTable) {
			$sm = $this->getServiceLocator ();
			$this->distritoTable = $sm->get ( 'Distrito\Model\DistritoTable' );
		}
		return $this->distritoTable;
	}
}