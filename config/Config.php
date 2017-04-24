<?php

define('SERVER', 'localhost');
define('USER','root');
define('PASSWORD', '');
define('DB','warszawa');

function __autoload($classPupa){ // funkcja zaczytuje klasy zaczytuje pliki 

    require 'class/'.$classPupa.'.php';
    
}