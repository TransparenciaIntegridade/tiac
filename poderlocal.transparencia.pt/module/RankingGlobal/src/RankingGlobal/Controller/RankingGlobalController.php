<?php

namespace RankingGlobal\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * RankingGlobalController
 *
 * @author
 *
 * @version
 *
 */
class RankingGlobalController extends AbstractActionController { 
	
	public function indexAction() {
		$em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');		
		$ranking_global = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($em->getRepository('Application\Entity\Ranking')->findBy(array(), array('ranking_2015'=>'ASC','municipios'=>'ASC'))));
		$ranking_global->setCurrentPageNumber($this->params()->fromRoute('page',1));
		$ranking_global->setItemCountPerPage(30);

		return array(
				'ranking_2015' => $ranking_global,
		);
		
	}

	

}