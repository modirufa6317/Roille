<?php

// cette functions de supprimes tout les caracteres spéciaux
function clean($string) 
{
    // Les espaces sont remplacés par des tirets
    $string = str_replace(' ', '-', $string);        
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); 
}

// Cette function permet de debuger et de print un tableau proprement 
function pre($val)
{
    echo '<pre>';
        print_r($val);
    echo '</pre>';
}

?>