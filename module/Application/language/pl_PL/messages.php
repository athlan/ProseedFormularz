<?php

return array_merge(
require 'Zend_Validate.php',
[
    'The form submitted did not originate from the expected site' => 'Prześlij formularz ponownie',
    
    'The input is less than %min% characters long' => 'Wartość posiada mniej %min% niż znaków',
    'The input is more than %max% characters long' => 'Wartość posiada wiecej %max% niż znaków',
]);
