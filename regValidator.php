<?php
session_start();

require 'formRules.php';
require 'formRulesMethods.php';


var_dump($_POST);

setSessionFieldsValue($_POST);

if (count($errors = validate($_POST))) {
    foreach ($errors as $key => $error) {
       $_SESSION[$key]['message'] = $error;
    }  

    header('location:registration.php');
} else {
    $_SESSION['success'] = true;

    header('location:registration.php');    

}

function setSessionFieldsValue($values) {
    foreach ($values as $key => $value) {
       $_SESSION[$key]['value'] = $_POST[$key]; 
    } 
}

function validate($values) {
   $resultValidate = [];

   foreach ($values as $key => $value) {
      if (isset(getRules()[$key])) {
        foreach (getRules()[$key] as $k => $rule) {
            $methodValidate = $rule['rule'] . 'Method';
            if (! $methodValidate($value, $rule['value'])) {
               $resultValidate[$key] = $rule['message'];
               break;	
            }
        }
      }
   }
echo $resultValidate;
   return $resultValidate;
} 
?>