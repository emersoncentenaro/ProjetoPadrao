<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author PHK
 */
class Controller {
    
    private $View;
  

    
    private function verificaSession($UsaSession){
        
        if($UsaSession):
            if(!$_SESSION['system_user']):
                header('Location: '.LOCALHOST.'login');
                exit();
            endif;    
        endif;
        
    }
    
    public function __construct($UsaSession = TRUE) {
        $this->verificaSession($UsaSession);
        $this->View = PATH_VIEWS;
       
    }
    public function loadView($viewName, array $viewData = array()) {
    
        include($this->View.$viewName.'.php');        
    }
    
    public function loadTemplate($viewName,$viewData = array()) {
        
        include($this->View.TEMPLATE);
        
    }
    public function loadViewInTemplate($viewName,$viewData = array()) {
           
        
        include($this->View.$viewName.'.php');
        
    }
    
    
    
    
}
