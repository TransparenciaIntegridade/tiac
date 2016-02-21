<?php 
namespace Application\View\Helper;
 

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceManager,
Doctrine\ORM\EntityManager;








 
class GastoCamara extends AbstractHelper
{
	
	

	protected $orm;
	
	public function __construct(EntityManager $orm)
	{
		$this->orm = $orm;
	}
	
 
    public function __invoke($distrito,$partido)
    {
    	
    	
    	$em = $this->orm;	
    	
    	
		if($partido==null||$distrito==null)
			return $this->redirect ()->toUrl('/stat/global');
		
		
		
		$cartazes = $em->getRepository('Application\Entity\PostCartaz')->findBy(array('active'=>1));
		$partido = $em->getRepository('Application\Entity\Lista')->find($partido);
		
		
		$gasto = array();
		
		foreach ($cartazes as $cartaz)
		{
			
			if($cartaz->getIdLista()->getIdCamara()->getIdDistrito()->getIdDistrito() == $distrito){
				//var_dump($cartaz->getIdLista());
				if($cartaz->getIdLista()->getNome()==$partido->getNome()){
					if(!isset($gasto[$cartaz->getIdLista()->getIdCamara()->getNome()]['y'])){
						$gasto[$cartaz->getIdLista()->getIdCamara()->getNome()]['name']=$cartaz->getIdLista()->getIdCamara()->getNome();
						$gasto[$cartaz->getIdLista()->getIdCamara()->getNome()]['y']=0;
						$gasto[$cartaz->getIdLista()->getIdCamara()->getNome()]['color']=$cartaz->getIdLista()->getCor();
						$gasto[$cartaz->getIdLista()->getIdCamara()->getNome()]['url']= '/stat/camaratodos/'.$cartaz->getIdLista()->getIdCamara()->getIdCamara();
							
					}
					$gasto[$cartaz->getIdLista()->getIdCamara()->getNome()]['y']+= $cartaz->getIdCartaz()->getPreco();
				}
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