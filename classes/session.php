<?php

namespace classes;

class Session{
    public function __construct()
    {
        session_start();
    }

    public function set($key,$value){
        $_SESSION[$key] = $value;
    }

    public function get($key){
        return $_SESSION[$key] ?? null;
    }

    public function remove($key){
        unset($_SESSION[$key]);
    }

    public function delete($key){
        session_destroy();
    }
}