<?php
namespace Application\Filter;

use Zend\Filter\AbstractFilter;

class PhoneFilter extends AbstractFilter
{
    public function filter($value)
    {
        $value = preg_replace('#[^0-9]#', '', $value);
        return $value;
    }
}
