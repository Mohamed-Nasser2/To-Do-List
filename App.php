<?php

require_once 'inc/connection.php';

// require_once "handle/addToDo.php";

require_once "classes/request.php";
require_once "classes/session.php";
require_once "classes/validation/validator.php";
require_once "classes/validation/required.php";
require_once "classes/validation/str.php";
require_once "classes/validation/validation.php";

use classes\Request;
use classes\Session;
use classes\validation\Validator;
use classes\validation\Required;
use classes\validation\Str;
use classes\validation\Validation;



$request = new Request();
$session = new Session(); 

$validation = new Validation();