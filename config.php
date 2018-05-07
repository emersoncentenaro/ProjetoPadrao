<?php

define('PATH_CONTROLLER','./controllers/');
define('PATH_VIEWS','./views/');

define('PATH_MODELS','./models/');
define('PATH_CORE','./core/');
define('PATH_DATABASE','./database/');
define('LOCALHOST', 'http://localhost/CONTA_AZUL/');
define('TEMPLATE_RESOURCES', 'http://localhost/CONTA_AZUL/resources/template/');
define('TEMPLATE','template.php');


/* Configurações do banco de dados*/
define('HOST', 'LOCALHOST');
define('USER', 'root');
define('PASS', '');
define('DBSA', 'contaazul');


spl_autoload_register(function ($Class){
  
    if(strpos($Class, 'Controller') > -1):
       if(file_exists(PATH_CONTROLLER.$Class.'.php')):
           require_once(PATH_CONTROLLER.$Class.'.php');
        endif;
    elseif(file_exists(PATH_MODELS.$Class.'.php')):
        require_once(PATH_MODELS.$Class.'.php');
    elseif(file_exists(PATH_DATABASE.$Class.'.php')):
        require_once(PATH_DATABASE.$Class.'.php');    
    else:
        require_once(PATH_CORE.$Class.'.php'); 
    endif;
});



