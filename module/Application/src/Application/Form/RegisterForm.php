<?php
namespace Application\Form;

use Zend\Form\Form;

class RegisterForm extends Form
{
    public function __construct()
    {
        parent::__construct();

        $this->add([
            'name' => 'person_firstname',
            'options' => [
                'label' => 'Imię',
            ],
        ]);
        
        $this->add([
            'name' => 'person_lastname',
            'options' => [
                'label' => 'Nazwisko',
            ],
        ]);
        
        $this->add([
            'name' => 'compay_name',
            'options' => [
                'label' => 'Nazwa firmy',
            ],
        ]);
        
        $this->add([
            'name' => 'person_position',
            'options' => [
                'label' => 'Stanowisko',
            ],
        ]);
        
        $this->add([
            'name' => 'person_email',
            'type' => 'Zend\Form\Element\Email',
            'options' => [
                'label' => 'E-mail',
            ],
        ]);
        
        $this->add([
            'name' => 'person_phone',
            'options' => [
                'label' => 'Telefon bezpośredni',
            ],
        ]);
        
        $this->add(array(
            'type'  => 'Zend\Form\Element\Csrf',
            'name' => 'csrf',
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Zapisz się',
                'id' => 'submitbutton',
                'class' => '',
            ),
        ));
    }
}
