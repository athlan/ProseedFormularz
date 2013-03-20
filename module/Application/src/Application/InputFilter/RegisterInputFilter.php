<?php
namespace Application\InputFilter;

use Zend\InputFilter\BaseInputFilter;

use Zend\InputFilter\Factory as InputFactory;

class RegisterInputFilter extends BaseInputFilter
{
    public function __construct(array $options = [])
    {
        $factory = new InputFactory();
        
        $this->add($factory->createInput([
            'name'     => 'person_firstname',
            'required' => true,
            'validators'  => [
            ],
        ]));
        
        $this->add($factory->createInput([
            'name'     => 'person_lastname',
            'required' => true,
            'validators'  => [
            ],
        ]));
        
        $this->add($factory->createInput([
            'name'     => 'compay_name',
            'required' => true,
            'validators'  => [
            ],
        ]));
        
        $this->add($factory->createInput([
            'name'     => 'person_position',
            'required' => true,
            'validators'  => [
            ],
        ]));
        
        $this->add($factory->createInput([
            'name'     => 'person_email',
            'required' => true,
            'validators'  => [
            ],
        ]));
        
        $this->add($factory->createInput([
            'name'     => 'person_phone',
            'required' => true,
            'validators'  => [
            ],
        ]));

    }
}
