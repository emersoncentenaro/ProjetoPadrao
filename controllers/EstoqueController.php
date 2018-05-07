<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author PHK
 */
class EstoqueController extends Controller {
    
    
    public function __construct($UsaSession = TRUE) {
        parent::__construct($UsaSession);
    }
    
    public function index() {
        
        $this->loadTemplate('estoque',array());
    }
    

    
    
}
