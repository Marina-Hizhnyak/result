<?php
function requiredMethod($fieldValue, $ruleValue) {
    if ($fieldValue != '') {
       return true; 
    }

    return false;
 }

 function emailMethod($fieldValue, $ruleValue)
 {
     return ($fieldValue ? filter_var($fieldValue, \FILTER_VALIDATE_EMAIL) !== false : true);
 } 

 function minMethod($fieldValue, $ruleValue)
 {
     return ($fieldValue ? strlen($fieldValue) >= $ruleValue : true);
 }
 
 function maxMethod($fieldValue, $ruleValue)
 {
    return ($fieldValue ? strlen($fieldValue) <= $ruleValue : true);
 }  
?>
