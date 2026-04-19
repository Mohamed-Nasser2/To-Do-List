<?php 

namespace classes\validation;
use classes\validation\Validator;

class Required implements Validator{
    public function check($key , $value)
    {
        if(empty($value)){
            return "$key is required";
        }
    }
}