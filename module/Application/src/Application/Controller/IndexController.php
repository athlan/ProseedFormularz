<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\InputFilter\RegisterInputFilter;

use Application\Form\RegisterForm;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $view = new ViewModel();
        
//         $view->setTemplate('application/index/indexSuccess');
        
        $form = new RegisterForm();
        
        $form->setInputFilter(new RegisterInputFilter());
        
        $request = $this->getRequest();
        
        if($request->isPost()) {
            $formData = $request->getPost();
            $form->setData($formData);
        
            if($form->isValid()) {
                $dataInput = $form->getData();
                
                $dataInput['ip'] = $_SERVER['REMOTE_ADDR'];
                
                $this->getModelRegister()->register($dataInput);
                
//                 $this->flashMessenger()->addMessage(new FlashMessengerMessage("Changes has been saved successfully.", FlashMessengerMessage::TYPE_SUCCESS));
                
                $view->setTemplate('application/index/indexSuccess');
                
                //return $this->redirect()->toRoute('home');
            }
            else {
                $form->setData($form->getData());
            }
        }
        
        $view->form = $form;
        
        return $view;
    }
    
    /**
     * @return \Application\Model\RegisterModel
     */
    public function getModelRegister()
    {
        if (!$this->modelRegister)
            $this->modelRegister = $this->getServiceLocator()->get('Application\Model\Register');
    
        return $this->modelRegister;
    }
    
    private $modelRegister;
}
