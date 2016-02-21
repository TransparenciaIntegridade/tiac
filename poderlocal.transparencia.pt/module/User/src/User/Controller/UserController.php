<?php

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;
use Zend\View\Model\ViewModel;
use Zend\Authentication\Result as Result;
use User\Form\LoginForm;
use User\Form\RegistoForm;
use User\Model\User;
use Zend\Session\Container;
use Zend\Authentication\Storage\Session;
use Zend\Mail;
use Zend\Mime\Part as MimePart;
use Zend\Mime\Message as MimeMessage;


class UserController extends AbstractActionController 
{
	protected $userTable;
	protected $storage;
	protected $authservice;
	
    public function indexAction()
    {
        $auth = new AuthenticationService();

        $identity = null;
        if ($auth->hasIdentity()) {
            // Identity exists; get it
            $identity = $auth->getIdentity();
        }
        
        return array(
            'identity' => $identity,
        );
    }

    public function loginAction()
    {
    	$id = (int)$this->getEvent()->getRouteMatch()->getParam('id',0);
    	$id2 = (int)$this->getEvent()->getRouteMatch()->getParam('id2',0);
        $form = new LoginForm();

        $request = $this->getRequest();
        if ($request->isPost()) {
            // get post data
            $post = $request->getPost();

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
            $authAdapter->setIdentity($post->get('username'))
                    ->setCredential(md5($post->get('password')));

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
            	
            	$authNamespace = new Container(Session::NAMESPACE_DEFAULT);
            	$authNamespace->getManager()->rememberMe(1209600);
            	$storage = $authService->getStorage();
            	$admin = $storage->write($authAdapter->getResultRowObject(array('ID_user' , 'username','email','user_group','active')));
            	$this->flashMessenger()->addMessage("O login foi efetuado com sucesso");
            	
            	if($id==0)
            		return $this->redirect()->toRoute('home');
            	if($id==1)
            		return $this->redirect ()->toUrl('/candidatura/todas');
            	if($id==2)
            		return $this->redirect ()->toUrl('/post-brinde');
            	if($id==3)
            		return $this->redirect ()->toUrl('/post-brinde/distrito/'.$id2);
            	if($id==4)
            		return $this->redirect ()->toUrl('/post-brinde/camara/'.$id2);
            	if($id==5)
            		return $this->redirect ()->toUrl('/festa/distrito/'.$id2);
            	if($id==6)
            		return $this->redirect ()->toUrl('/festa/camara/'.$id2);
            	if($id==7)
            		return $this->redirect()->toUrl('/post-cartaz/add/'.$id2);
            } else {
            	$this->flashMessenger()->addErrorMessage("Username/Password inv&aacute;lidos");
            	return $this->redirect()->toUrl("/user/login");
            	 
            }
        }

        return array('form' => $form,'flashError' => $this->flashMessenger()->getErrorMessages(),'id'=>$id,'id2'=>$id2);
    }
    
    public function logoutAction()
    {
        $auth = new AuthenticationService();
        $auth->clearIdentity();
        
        return $this->redirect()->toRoute('home');
    }
    
    public function registoAction()
    {
    	$form = new RegistoForm();
    	$form->get('submit')->setValue('Registo');
    	
    	$request = $this->getRequest();
    	if ($request->isPost()) {
    		$Registo = new User();
    		$form->setInputFilter($Registo->getInputFilter());
    		$form->setData($request->getPost());
    	
    		if ($form->isValid()) {
    			$Registo->exchangeArray($form->getData());
    			$this->getUserTable()->addUser($Registo);
    	
    			$this->flashMessenger()->addMessage("O seu registo foi efetuado com sucesso");
    			return $this->redirect()->toRoute('home');
    		}
    	}
    	
    	
    	return array('form' => $form);
    }
    
    public function passwordAction()
    {
    	
    	$em = $this->getServiceLocator()
    	->get('doctrine.entitymanager.orm_default');
    	
    	$request = $this->getRequest();
    	if ($request->isPost()) {
    		
    			$user = $em->getRepository('Application\Entity\User')->findOneBy(array('email'=>$_POST['email']));
    			if($user!=null){
    			$token = $this->getToken(30);
    			$user->setToken(md5($token));
    			
    			
    			// setup SMTP options
    			$options = new Mail\Transport\SmtpOptions(array(
    					'name' => 'localhost',
    					'host' => 'smtp.gmail.com',
    					'port'=> 587,
    					'connection_class' => 'login',
    					'connection_config' => array(
    							'username' => 'celso.rodrigues@transparencia.pt',
    							'password' => 'Tiac2013',
    							'ssl'=> 'tls',
    					),
    			));
    			 
    			$this->renderer = $this->getServiceLocator()->get('ViewRenderer');
    			$content = $this->renderer->render('user/tpl/template', array('token'=>md5($token)));
    			
    			// make a header as html
    			$html = new MimePart($content);
    			$html->type = "text/html";
    			$body = new MimeMessage();
    			$body->setParts(array($html,));
    			
    			// instance mail
    			$mail = new Mail\Message();
    			$mail->setBody($body); // will generate our code html from template.phtml
    			$mail->setFrom('Campanha-Limpa','celso.rodrigues@transparencia.pt');
    			$mail->setTo($user->getEmail());
    			$mail->setSubject('Reposição de password');
    			
    			$transport = new Mail\Transport\Smtp($options);
    			$transport->send($mail);
    			
    			
    			
    			
    			var_dump(md5($token));
    			$em->persist($user);
    			$em->flush();
    			}
    			
    		
    	}
    }
    
    
    public function usersAction()
    {
    	$auth = new AuthenticationService();
    	$identity = null;
    	if ($auth->hasIdentity()) {
    		$identity = $auth->getIdentity();
    		$id_user = $identity->ID_user;
    	}
    	
    	$em = $this->getServiceLocator()
    	->get('doctrine.entitymanager.orm_default');
    	$data = $em->getRepository('Application\Entity\User')->findAll();
    	
    	 return new ViewModel ( array ('users'=>$data,'identity'=>$identity));
    	
    }
    
    public function getUserTable()
    {
    	if (!$this->userTable) {
    		$sm = $this->getServiceLocator();
    		$this->userTable = $sm->get('User\Model\UserTable');
    	}
    	return $this->userTable;
    }
    
    function crypto_rand_secure($min, $max) {
    	$range = $max - $min;
    	if ($range < 0) return $min; // not so random...
    	$log = log($range, 2);
    	$bytes = (int) ($log / 8) + 1; // length in bytes
    	$bits = (int) $log + 1; // length in bits
    	$filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    	do {
    		$rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
    		$rnd = $rnd & $filter; // discard irrelevant bits
    	} while ($rnd >= $range);
    	return $min + $rnd;
    }
    
    function getToken($length){
    	$token = "";
    	$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    	$codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    	$codeAlphabet.= "0123456789";
    	for($i=0;$i<$length;$i++){
    		$token .= $codeAlphabet[$this->crypto_rand_secure(0,strlen($codeAlphabet))];
    	}
    	return $token;
    }

}