<?php 

namespace classes\validation;
use classes\validation\Validator;

class Str implements Validator{
    public function check($key , $value)
    {
        if(is_numeric($value)){
            return "$key must be string";
        }
    }
}