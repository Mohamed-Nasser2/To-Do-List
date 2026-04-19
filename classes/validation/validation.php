<?php

namespace classes\validation;

class Validation{
    private $errors=[];
    public function validate($key , $value , $rules){
        
        foreach($rules as $rule){
            $rule= "classes\\validation\\".$rule;
            $object = new $rule;
            $out = $object->check($key , $value);
            if($out != false){
                $this->errors=$out;
            }else{
                return false;
            }
        }
    }

    public function getError(){
        return $this->errors;
    }
}