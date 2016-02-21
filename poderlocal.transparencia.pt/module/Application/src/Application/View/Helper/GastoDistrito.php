<?php 
namespace Application\View\Helper;
 

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceManager,
Doctrine\ORM\EntityManager;








 
class GastoDistrito extends AbstractHelper
{
	
	

	protected $orm;
	
	public function __construct(EntityManager $orm)
	{
		$this->orm = $orm;
	}
	
 
    public function __invoke($partido)
    {
    	
    	
    	$em = $this->orm;	
    	
   		$cartazes = $em->getRepository('Application\Entity\PostCartaz')->findBy(array('active'=>1));
		$distritos = $em->getRepository('Application\Entity\Distrito')->findAll();
		$partido = $em->getRepository('Application\Entity\Lista')->find($partido);
		
		$gasto = array();
		
		foreach ($distritos as $distrito)
		{
			
			foreach ($cartazes as $cartaz)
			{
				if($cartaz->getIdLista()->getNome()==$partido->getNome()){
					if($distrito->getIdDistrito() == $cartaz->getIdLista()->getIdCamara()->getIdDistrito()->getIdDistrito())
					{
						if(!isset($gasto[$distrito->getNome()]['y'])){
							$gasto[$distrito->getNome()]['name']=$distrito->getNome();
							$gasto[$distrito->getNome()]['y']=0;
							$gasto[$distrito->getNome()]['color']=$cartaz->getIdLista()->getCor();
							$gasto[$distrito->getNome()]['url']= '/stat/camara/'.$distrito->getIdDistrito().'/'.$partido->getIdLista();
							
						}
						$gasto[$distrito->getNome()]['y']+= $cartaz->getIdCartaz()->getPreco();
					}
					
					
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