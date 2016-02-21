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
	
	public function indexAction() {
		//$this->layout('layout/empty');
	    $id = ( int ) $this->params ()->fromRoute ('id', null);
		

		$em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
		$infografia_municipal = $this->params()->fromRoute('id',1);
		/*$contraditorio_2013 = $em->getRepository('Application\Entity\Contraditorio')->findBy(array('idCamara'=>$infografia_municipal));*/
		//$contraditorio = $em->getRepository('Application\Entity\Contraditorio')->findBy(array('idCamara'=>$infografia_municipal));
		$infografia = $em->getRepository('Application\Entity\Camara')->findBy(array('idCamara'=>$infografia_municipal));
		$populacao = $em->getRepository('Application\Entity\Populacao')->findBy(array('idCamara'=>$infografia_municipal));
		$qualidade_vida = $em->getRepository('Application\Entity\QualidadeVida')->findBy(array('idCamara'=>$infografia_municipal));
		$partidos = $em->getRepository('Application\Entity\Lista')->findBy(array('idCamara'=>$infografia_municipal,'anoFinalPoder' => 2017));
		$itm = $em->getRepository('Application\Entity\Ranking')->findBy(array('idCamara'=>$infografia_municipal));
		$partidosM = $em->getRepository('Application\Entity\Lista')->findBy(array('idCamara'=>$infografia_municipal));
		$listas = $em->getRepository('Application\Entity\Lista')->findBy(array('idCamara'=>$infografia_municipal));
		$query = $em->createQuery('SELECT u.nome,u.anoInicialPoder,u.cor,u.anoFinalPoder FROM Application\Entity\Lista u WHERE u.idCamara='.$infografia_municipal);
		/*$query->setParameter(1, 72.11);
		 $query->setParameter(2, 99.51);*/
		$melhores = $query->getResult();

		$pu=array();
		$i=0;
		foreach($listas as $l)
		{
			$pu[$i++]=$l->getNome();
		}
		$pu = array_unique($pu);
		return array(
				'infografia' => $infografia,
				'populacao' => $populacao,
				'qualidade_vida' => $qualidade_vida,
				'partidos' => $partidos,
				'partidosM' => $pu,
				'id' =>$id,
				'melhores' => $melhores,
				'itm' => $itm,
				'contraditorio' => $contraditorio,
				/*'contraditorio_2014' => $contraditorio_2014,*/
		); 
		
	}

	public function pdfAction()
	{
		$this->layout('layout/empty');
		$id = ( int ) $this->params ()->fromRoute ('id', null);
		
		
		$em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
		$infografia_municipal = $this->params()->fromRoute('id',1);
		/*$contraditorio_2013 = $em->getRepository('Application\Entity\Contraditorio')->findBy(array('idCamara'=>$infografia_municipal));*/
		//$contraditorio = $em->getRepository('Application\Entity\Contraditorio')->findBy(array('idCamara'=>$infografia_municipal));
		$infografia = $em->getRepository('Application\Entity\Camara')->findBy(array('idCamara'=>$infografia_municipal));
		$populacao = $em->getRepository('Application\Entity\Populacao')->findBy(array('idCamara'=>$infografia_municipal));
		$qualidade_vida = $em->getRepository('Application\Entity\QualidadeVida')->findBy(array('idCamara'=>$infografia_municipal));
		$partidos = $em->getRepository('Application\Entity\Lista')->findBy(array('idCamara'=>$infografia_municipal,'anoFinalPoder' => 2017));
		$itm = $em->getRepository('Application\Entity\Ranking')->findBy(array('idCamara'=>$infografia_municipal));
		$partidosM = $em->getRepository('Application\Entity\Lista')->findBy(array('idCamara'=>$infografia_municipal));
		$listas = $em->getRepository('Application\Entity\Lista')->findBy(array('idCamara'=>$infografia_municipal));
		$query = $em->createQuery('SELECT u.nome,u.anoInicialPoder,u.cor,u.anoFinalPoder FROM Application\Entity\Lista u WHERE u.idCamara='.$infografia_municipal);
		/*$query->setParameter(1, 72.11);
		 $query->setParameter(2, 99.51);*/
		$melhores = $query->getResult();
		
		$pu=array();
		$i=0;
		foreach($listas as $l)
		{
			$pu[$i++]=$l->getNome();
		}
		$pu = array_unique($pu);
		return array(
				'infografia' => $infografia,
				'populacao' => $populacao,
				'qualidade_vida' => $qualidade_vida,
				'partidos' => $partidos,
				'partidosM' => $pu,
				'id' =>$id,
				'melhores' => $melhores,
				'itm' => $itm,
				'contraditorio' => $contraditorio,
				/*'contraditorio_2014' => $contraditorio_2014,*/

		);
		
	}
	
	public function pdf2Action(){
	    $id = ( int ) $this->params ()->fromRoute ('id', null);

		return array(
				'id' =>$id,
				
		);
		
	}
	  
}