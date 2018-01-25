<?php

/*
 * Validate a color
 */
function validColor($color){
    global $f3;
    return in_array($color, $f3->get('colors'));
}

function validString($string) {
    if(!empty($string) && ctype_alpha($string)) {
        return true;
    }
}

$errors = array();

if(!validColor($color)){
    $errors['color'] = "Please enter a valid choice.";
}

$success = sizeof($errors) == 0;