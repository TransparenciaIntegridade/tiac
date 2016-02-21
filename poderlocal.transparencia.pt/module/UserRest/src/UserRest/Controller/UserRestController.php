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

class UserRestController extends AbstractRestfulController
{ 
    protected $userTable;

    public function getList()
    {
    	return new JsonModel(array('results'=> 'Get List'));
    	
    }

    public function get($id)
    {
    	/*
		$imagedata = file_get_contents("http://zf.localhost/images/thumb1.jpg");
		$base64 = base64_encode($imagedata);
		
		
		$result = json_encode(array('results'=> array(
							'image'=> 'data:image/jpeg;charset=utf8;base64,'.$base64)));
		
		return new JsonModel(array('results'=> array(
							'image'=> 'data:image/jpeg;charset=utf8;base64,'.$base64)));
    	*/
    	




    	return new JsonModel(array('results'=> 'Get ID'));
    	//echo $result;
    	
    	
    }

    public function create($data)
    {
    	
    	$post = $_POST;
    	if(sizeof($post)==0)
    		return new JsonModel(array(
    				'status'=> 0,
    				'MSGR'=>'Não foi recebido dados',
    		));
    	
    	if(isset($_POST['email'])){
    		
    		$em = $this->getServiceLocator()
    		->get('doctrine.entitymanager.orm_default');
    		
    		$username = $_POST["username"];
    		$password = $_POST["password"];
    		$email = $_POST['email'];
    		
    		$user = $em->getRepository('Application\Entity\User')->findOneBy(array('username'=>$username));
    		if($user!=null)
    			return new JsonModel(array('Status'=> 0,'MSGR' => 'Utilizador ja existe !',));
    		
    		$user = $em->getRepository('Application\Entity\User')->findOneBy(array('email'=>$email));
    		if($user!=null)
    			return new JsonModel(array('Status'=> 0,'MSGR' => 'Email ja existe',));
    		
    		if($user==null){
    		$user = new \Application\Entity\User();
    		$user->setUsername($username);
    		$user->setPassword($password);
    		$user->setEmail($email);
    		$user->setUserGroup(0);
    		$user->setActive(0);
    		$user->setToken(0);
    		$em->persist($user);
			$em->flush();
    		
			$user = $em->getRepository('Application\Entity\User')->findOneBy(array('username'=>$username));
			
    		return new JsonModel(array(
    				'Status'=> 1,
    				'IdUser'=>$user->getIdUser(),
    				'Username'=>$user->getUsername(),
    				'Email'=>$user->getEmail(),
    				'MSGR' => 'Registo efectuado. Efectue login.',
    				));
    		
    		}
    		
    	
    	}else{ 
    	$username = $_POST["username"];
    	$password = $_POST["password"];
    	 
    	/*return new JsonModel(array(
    			'FirstName' => $firstname,
    			'LastName' => $lastname,
    			'Age' => '40',
    			'Points' => '69',
    	));
    	
    	*/
    	
    	
    	
    	
    	// get the db adapter
    	$sm = $this->getServiceLocator();
    	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    	 
    	// create auth adapter
    	$authAdapter = new AuthAdapter($dbAdapter);
    	 
    	// configure auth adapter
    	$authAdapter->setTableName('user')
    	->setIdentityColumn('username')
    	->setCredentialColumn('password');
    	 
    	
    	
    	// pass authentication information to auth adapter
    	$authAdapter->setIdentity($username)
    	->setCredential($password);
    	 
    	// create auth service and set adapter
    	// auth services provides storage after authenticate
    	$authService = new AuthenticationService();
    	$authService->setAdapter($authAdapter);
    	 
    	// authenticate
    	$result = $authService->authenticate();
    	 
    	 
    	// check if authentication was successful
    	// if authentication was successful, user information is stored automatically by adapter
    	if ($result->isValid()) {
    		// redirect to user index page
    		$resultSet = $authAdapter->getResultRowObject(array('ID_user' , 'username','email'));
    		
    		return new JsonModel(
    				array(
    				'Status' => 1,
    				'IdUser' => $resultSet->ID_user,
    				'Username' => $resultSet->username,
    				'Email' => $resultSet->email,
    				'MSG' => 'Autenticado',		
    				
    				   				
    		));
    	} else {
    		switch ($result->getCode()) {
    			case Result::FAILURE_IDENTITY_NOT_FOUND:
    				return new JsonModel(array(
    				'Status'=> 0,
    				'MSGR' => 'Utilizador nao registado',
    				));
    				break;
    				 
    			case Result::FAILURE_CREDENTIAL_INVALID:
    				return new JsonModel(array(
    				'Status'=> 0,
    				'MSGR' => 'Utilizador ou palavra passe incorretos',
    				));
    				break;
    				 
    			case Result::SUCCESS:
    					
    					
    					
    				break;
    				 
    			default:
    				/** do stuff for other failure **/
    				break;
    	
    			}	 
    		}
    	}
        
    }

    public function update($id, $data)
    {
    }

    public function delete($id)
    {
        
    }

    public function getUserTable()
    {
        if (!$this->userTable) {
			$sm = $this->getServiceLocator();
			$this->userTable = $sm->get('User\Model\UserTable');
		}
		return $this->userTable;
    }
    
    public function haversine($start, $finish) {
    
    	$theta = $start[1] - $finish[1];
    	$distance = (sin(deg2rad($start[0])) * sin(deg2rad($finish[0]))) + (cos(deg2rad($start[0])) * cos(deg2rad($finish[0])) * cos(deg2rad($theta)));
    	$distance = acos($distance);
    	$distance = rad2deg($distance);
    	$distance = $distance * 60 * 1.1515;
    
    	return round($distance, 2);
    
    }
}