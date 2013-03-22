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
            'filters' => [
                new \Application\Filter\PhoneFilter(),
            ],
            'validators'  => [
                ['name' => 'NotEmpty', 'options' => ['messages' => ['isEmpty' => 'Niepoprawny numer telefonu']], 'break_chain_on_failure' => true],
                ['name' => 'Digits', 'options' => ['messages' => ['notDigits' => 'Niepoprawny numer telefonu']], 'break_chain_on_failure' => true],
                ['name' => 'StringLength', 'options' => ['min' => 6], 'break_chain_on_failure' => true],
            ],
        ]));

    }
}
