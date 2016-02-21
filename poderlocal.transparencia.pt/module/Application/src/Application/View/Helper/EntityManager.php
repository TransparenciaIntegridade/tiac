<<?php
namespace Application\View\Helper;

use Zend\ServiceManager\ServiceLocatorAwareInterface;  

class HeadScript extends \Zend\View\Helper\MyHelper implements ServiceLocatorAwareInterface
{
    use \Zend\ServiceManager\ServiceLocatorAwareTrait;

    public function __invoke()
    {
        $config = $this->getServiceLocator()->getServiceLocator()->get('Config');
       return $config;
    }

}