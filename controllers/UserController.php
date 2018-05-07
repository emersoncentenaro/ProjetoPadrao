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
class UserController extends Controller {
    
    
    public function __construct($UsaSession = TRUE) {
        parent::__construct($UsaSession);
    }
    
    public function index() {
        
        $this->loadTemplate('users',array());
    }
    
    public function create() {
        $user = new User;
        $dados  =  $user->create($_POST);
        $json_retorno = array();
        if($dados > 0):
           $json_retorno['cadastro'] = TRUE; 
           $json_retorno['id'] = $dados;
        else:
           $json_retorno['cadastro'] = FALSE; 
           $json_retorno['id'] = 0; 
        endif;
        
        echo json_encode($json_retorno);
        
    }
    
    
}
