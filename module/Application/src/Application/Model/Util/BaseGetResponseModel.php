<?php
namespace Application\Model\Util;

use Zend\ServiceManager\ServiceLocatorAwareInterface;

use Zend\ServiceManager\ServiceLocatorInterface;

class BaseGetResponseModel implements ServiceLocatorAwareInterface
{
    private $serviceLocator;
    
    /**
     * (non-PHPdoc)
     * @see Zend\ServiceManager.ServiceLocatorAwareInterface::setServiceLocator()
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
        $this->serviceLocator = $serviceLocator;
    }
    
    /**
     * (non-PHPdoc)
     * @see Zend\ServiceManager.ServiceLocatorAwareInterface::getServiceLocator()
     */
    public function getServiceLocator() {
        return $this->serviceLocator;
    }
    
    /**
     * @return array
     */
    public function getConfig() {
        return $this->getServiceLocator()->get('Config');
    }
    
    /**
     * @return array
     */
    public function getConfigApi() {
        $config = $this->getConfig();
        return $config['ApiGetResponse'];
    }
    
    /**
     * @return \Application\Util\jsonRPCClient
     */
    public function getRequest() {
        $config = $this->getConfigApi();
        return new \Application\Util\jsonRPCClient($config['api_url']);
    }
    
    /**
     * 
     * @return string
     */
    public function getApiKey() {
        $config = $this->getConfigApi();
        return $config['api_key'];
    }
}
