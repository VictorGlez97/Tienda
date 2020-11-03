<?php

    function controllers_autoload($clases){
         include 'controllers/'.$clases.'.php';
    }
    
    spl_autoload_register('controllers_autoload');
