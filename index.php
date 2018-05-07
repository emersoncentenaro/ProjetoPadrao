<?php
session_start();

require_once('./config.php');

 $Usuario = new Read;
        $Usuario->exeRead('users','where email= :email','email=admin@contaazul.com.br');
//        var_dump($Usuario);
//        echo json_encode($Usuario->getResult()[0]);
$json_resposta = array();
$json_resposta['autenticado'] = FALSE;
$json_resposta['mensagem'] = 'Login Invalido';
///echo json_encode($json_resposta);

$home = new Core();
$home->run();







    