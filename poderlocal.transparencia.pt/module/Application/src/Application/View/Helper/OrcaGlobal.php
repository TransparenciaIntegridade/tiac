<?php 
namespace Application\View\Helper;
 

use Zend\View\Helper\AbstractHelper;
use Zend\ServiceManager\ServiceManager,
Doctrine\ORM\EntityManager;

class OrcaGlobal extends AbstractHelper
{
	
	

	protected $orm;
	
	public function __construct(EntityManager $orm)
	{
		$this->orm = $orm;
	}
	
 
    public function __invoke()
    {
    	
    	
    	$em = $this->orm;	
    	
    	$cartazes =	$em->getRepository('Application\Entity\PostCartaz')
    	->findBy(array('active'=>1));
    	
    	$listas  =	$em->getRepository('Application\Entity\Lista')
    	->findBy(array());
    	
    	 
    	$orca = array();
    	
    	
    	foreach ($listas as $lista){
    		if(($lista->getNome()=='PS')||($lista->getNome()=='PSD')||($lista->getNome()=='CDU')||($lista->getNome()=='BE')||($lista->getNome()=='CDS-PP')||($lista->getNome()=='PSD/CDS-PP')){
    			if(!isset($orca[$lista->getNome()]['y'])){
    				$orca[$lista->getNome()]['name']=$lista->getNome();
    				$orca[$lista->getNome()]['y']=0;
    				$orca[$lista->getNome()]['color']=$lista->getCor();
    				$orca[$lista->getNome()]['url']= '/stat/distrito/'.$lista->getIdLista();
    			}
    			$orca[$lista->getNome()]['y']+= $lista->getOrcamento();
    		}
    	}
    	
    	$out = "";
    	 foreach ( $orca as $value ){
    		if($value['y']>0){
    			$out.=  '{'.'name:'."'".$value['name']."',".'color:'."'".$value['color']."',".'url:'."'".$value['url']."',".'y:'.$value['y'].",".'},';
    			
    		}
    			
    	 }
    	 
    	 
    	 
    	 return $out;
    	 
    }

}