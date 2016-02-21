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
        
        $query = $em->createQuery('SELECT u.idCamara,u.municipios,u.itm_2015,u.ranking_2015,u.icone,u.url FROM Application\Entity\Ranking u WHERE u.itm_2015 >= 81.19 ORDER BY u.itm_2015 DESC,u.ranking_2015 ASC');
        /*$query->setParameter(1, 72.11);
        $query->setParameter(2, 99.51);*/
        $melhores = $query->getResult();
        
        $query = $em->createQuery('SELECT u.idCamara,u.municipios,u.itm_2015,u.ranking_2015,u.icone,u.url FROM Application\Entity\Ranking u WHERE u.itm_2015 > 6 AND u.itm_2015 < 15 ORDER BY u.ranking_2015 DESC,u.municipios ASC');
        /*$query->setParameter(1, 72.11);
         $query->setParameter(2, 99.51);*/
        $piores = $query->getResult();
        
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
        		
        		'flashMessages' => $this->flashMessenger()->getCurrentMessages(),
        		
        		
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
        		'melhores' => $melhores,
        		'piores' => $piores,
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

    public function faqsAction() {}


	
}