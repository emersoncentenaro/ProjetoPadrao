<?php

class HomeController extends Controller {
    
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index( array $values = array()){    
        $this->loadTemplate('users',array('nome'=>'henrique'));
    }
    
    public function estoque($param) {
        $this->loadView('login', array());
    }
    public function dashboard($param) {
        $this->loadView('dashboard', array());
    }
}
