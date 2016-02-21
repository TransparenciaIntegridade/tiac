<?php

namespace UserRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;

use User\Model\User;         
use User\Form\LoginForm;       
use User\Form\RegistoForm;
use User\Model\UserTable;     
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;
use Zend\Authentication\Result as Result;
use Zend\View\Model\JsonModel;
use Doctrine\ORM\EntityManager;
use Application\Entity\PostCartaz;
use GoogleMaps;

class CartazRestController extends AbstractRestfulController
{ 
	protected $imagineService;
    
    public function getList()
    {
    	
    	$em = $this->getServiceLocator()
    	->get('doctrine.entitymanager.orm_default');
    	$cartazes = $em->getRepository('Application\Entity\Cartaz')->findAll();
    	
    	$results = array();
    	$i=0;
    	
    	foreach ($cartazes as $cartaz){
    		
    		$results[$i++]=array(
    			'IdCartaz'=> $cartaz->getIdCartaz(),
    			'Tamanho' => $cartaz->getTamanho(),
    			'Preco'=> $cartaz->getPreco(),
    				
    		);
    	}
    	
    	return new JsonModel(array(
    			
    			 'Result' => $results,
    	));

    	
    }

    public function get($id)
    {
    	
    	$em = $this->getServiceLocator()
    	->get('doctrine.entitymanager.orm_default');
    	$cartaz = $em->getRepository('Application\Entity\Cartaz')->find($id);
    	
    	
    	return new JsonModel(array(
    			 
    			'IdCartaz'=> $cartaz->getIdCartaz(),
    			'Tamanho' => $cartaz->getTamanho(),
    			'Preco'=> $cartaz->getPreco(),
    	));
    	 
    	
    	
    }

    public function create($datas)
    {
    	$em = $this->getServiceLocator()
    	->get('doctrine.entitymanager.orm_default');
    	
    	//$data = 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAUDBAQEAwUEBAQFBQUGBwwIBwcHBw8LCwkMEQ8SEhEPERETFhwXExQaFRERGCEYGh0dHx8fExciJCIeJBweHx7/2wBDAQUFBQcGBw4ICA4eFBEUHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh7/wAARCADIASwDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwDQooor8CP6FCiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAo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Ba5ais8Tmnt8BSwfJbkvrfe7fS2m/c0w2T+wzKrjue/OkrW2sore+vw9uoV9JeEb6LTPhnYahOGMVvYiRwo5wBk4r5tr6Bg/5Ig3/YIb/wBBNe3wpVlRpYqpHdRv91zweMqaqTw0JbOTX5GZqPgHwr4xY61oOqfZvPO6QQqHTceuU4Kn1GfwrQ0Pwv4U+H8TarqF+rXIUhZ7ggEeojQc5+mTXgsE81u++CaSJv7yMVP6Uk0sszmSaR5HPVmYk1zw4gwlGXtqOFSq976J90v8rep1T4cxdWH1epi26Xa2tuzf9LyOm+JPiyTxXrQmjVorG3BS2jbrg9WPuePyFctRRXzdevUxFSVWo7yerPp8LhqeFpRo0laK2CiiisTcKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAK9Qj+Ieir8Oj4cNrqH2s2Jt9/lp5e4gjOd2cfhXl9Fd2DzGthIVIUtpqz9Nf8zzsdldDHShKtf3Hda/12CiiiuE9EKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigD/9k=';
		$data = $_POST['img_full'];	
		$corX = $_POST['latitude'];
		$corY = $_POST['longitude'];
		$concelho = $_POST['concelho'];
		$partido = $_POST['partido'];
		$distrito = $_POST['distrito'];
		
		
		
		$camaras = $em->getRepository('Application\Entity\Camara')->findBy(array('idDistrito'=>$distrito));
			
		
		$lista = $em->getRepository('Application\Entity\Lista')->findOneBy(array('idCamara'=>$camaras[$concelho]->getIdCamara(),'nome'=>$partido,));
		
		if($lista==null)
			return new JsonModel(array('SUCCESS'=>'FAIL','MESSAGE'=>'idLista Nao encontrado'));
		
		
		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);
		$data = base64_decode($data);
		
		
		$date =  new \DateTime("now", new \DateTimeZone('Europe/London'));
		$date = $date->getTimestamp();
		
		$sucess = file_put_contents('public/assets/cartaz/'.$date.'-cartaz.jpg', $data);
    	if($sucess){
    		$u = $em->getRepository('Application\Entity\User')->find((int)$_POST['idUser']);
    		$l = $em->getRepository('Application\Entity\Lista')->find($lista->getIdLista());
    		$c = $em->getRepository('Application\Entity\Cartaz')->find((int)$_POST['idCartaz']);
    		
    		if($u==null)
    			return new JsonModel(array('SUCCESS'=>'FAIL','MESSAGE'=>'idUser Nao encontrado'));
    		
    		if($l==null)
    			return new JsonModel(array('SUCCESS'=>'FAIL','MESSAGE'=>'idLista Nao encontrado'));
    		
    		if($c==null)
    			return new JsonModel(array('SUCCESS'=>'FAIL','MESSAGE'=>'idCartaz Nao encontrado'));
    		
    		$folder = 'public/assets/cartaz/';
    		$imagine = $this->getImagineService();
    		$size = new \Imagine\Image\Box(512, 512);
    		$mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
    		
    		$image = $imagine->open($folder.$date.'-cartaz.jpg');
    		$image->thumbnail($size, $mode)->save($folder .'/thumbs/'.$date.'-cartaz.jpg');
    		
    		$cartaz = new PostCartaz();
    		$cartaz->setIdUser($u);
    		$cartaz->setIdLista($l);
    		$cartaz->setIdCartaz($c);
    		$cartaz->setData($date);
    		$cartaz->setImage($date.'-cartaz.jpg');
    		$cartaz->setCorX($corX);
    		$cartaz->setCorY($corY);
    		$cartaz->setMorada($this->getAdress($corX, $corY));
    		$cartaz->setActive(0);
    		$cartaz->setProximity(0);
    		$em->persist($cartaz);
    		
    		$em->flush();
    		
    		return new JsonModel(array('SUCCESS'=>'OK',
    				'MESSAGE'=> 'inserido na BD'));
    		
    	}
    	
    	return new JsonModel(array('SUCCESS'=>'OK',
    								'MESSAGE'=>$_POST['img_full']));
    	
    	
    }

    public function update($id, $data)
    {
    	
    	return new JsonModel(array('result'=>'update'));
    }

    public function delete($id)
    {
        
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