<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author PHK
 */
class LoginController extends Controller {

    public function __construct() {
        parent::__construct(FALSE);
    }

    public function index() {
        $mgs = array();
        $mgs['classe'] = 'inativo';
        $mgs['mensagem'] = 'Usuario Invalido';
        $this->loadView('login', $mgs);
    }

    public function logar($usuario = array()) {
        $User = new User;
        $mgs = array();
        $mgs['classe'] = 'active';
        $mgs['mensagem'] = 'Usuario Invalido';

        $this->loadView('login', $mgs);
    }

    public function logoff() {
        session_destroy();
        header('Location: ' . LOCALHOST . 'login');
    }

    public function autenticar() {


        if ($_POST['email'] == 'paulo.pb@viasoft.com' and $_POST['password'] == '123'):
            $_SESSION['system_user'] = array('nome' => 'paulo.pb@viasoft.com', 'id' => 266, 'hour' => date('d/m/Y:h'));
            header('Location: ' . LOCALHOST . 'home');
        else:
            header('Location: ' . LOCALHOST . 'login');
        endif;
    }
    
    public function ver() {
        $json_resposta = array();
        
        $Usuario = new Read;
        $Usuario->exeRead('users','where email=:email','email='.$_POST['email']);
        
        if($Usuario->getResult()): 
            $json_resposta['autenticado'] = TRUE;
            $json_resposta['mensagem'] = 'Bem Vindo';
            $_SESSION['system_user'] = array('nome' => 'paulo.pb@viasoft.com', 'id' => 266, 'hour' => date('d/m/Y:h'));
        else:
            $json_resposta['autenticado'] = FALSE;
            $json_resposta['mensagem'] = 'Login Invalido';
        endif;
       
        echo json_encode($json_resposta);
        exit();
    }
    function islogin() {
        echo json_encode(array('valor' => TRUE));
    }

}
