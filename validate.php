<?php
require_once 'formRules.php';

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
// echo $resultValidate;
   return $resultValidate;
} 