<?php 
namespace Application\View\Helper;
 

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceManager,
Doctrine\ORM\EntityManager;








 
class CamaraTodos extends AbstractHelper
{
	
	

	protected $orm;
	
	public function __construct(EntityManager $orm)
	{
		$this->orm = $orm;
	}
	
 
    public function __invoke($camara)
    {
    	
    	
    	$em = $this->orm;	
    	
    	$cartazes = $em->getRepository('Application\Entity\PostCartaz')->findBy(array('active'=>1));
		
		$gasto = array();
		
		foreach ($cartazes as $cartaz)
		{
				
			if($cartaz->getIdLista()->getIdCamara()->getIdCamara() == $camara){
				
				if(!isset($gasto[$cartaz->getIdLista()->getIdCamara()->getNome()]['y'])){
					$gasto[$cartaz->getIdLista()->getNome()]['name']=$cartaz->getIdLista()->getNome();
					$gasto[$cartaz->getIdLista()->getNome()]['y']=0;
					$gasto[$cartaz->getIdLista()->getNome()]['color']=$cartaz->getIdLista()->getCor();
					$gasto[$cartaz->getIdLista()->getNome()]['url']= '/stat/distrito/'.$cartaz->getIdLista()->getIdLista();
		
				}
				$gasto[$cartaz->getIdLista()->getNome()]['y']+= $cartaz->getIdCartaz()->getPreco();
			}
				
		}
    	
    	$out = "";
    	 foreach ( $gasto as $value ){
    		if($value['y']>0){
    			$out.=  '{'.'name:'."'".$value['name']."',".'color:'."'".$value['color']."',".'url:'."'".$value['url']."',".'y:'.$value['y'].",".'},';
    			
    		}
    			
    	 }
    	 
    	 
    	 
    	 return $out;
    	 
    }

}