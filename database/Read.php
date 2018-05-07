<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Read
 *
 * @author PHK
 */
class Read {
    
    private $Query;
    private $Places;
    private $Result;
    
    /**   @var PDO  */
    private $Conexao;
    
    /** @var PDOStatement */
    private $Dataset;
    
    public function exeRead($Tabela,$Termo = null,$ParseString = null) {
        if(!empty($ParseString)):
            parse_str($ParseString, $this->Places);
        endif;
        
        $this->Query = "SELECT * FROM {$Tabela} {$Termo}";
        
        $this->execute();
    }

    public function getResult() {
        return $this->Result;
    }
    public function getRowCount() {
        return $this->Dataset->rowCount();
    }


    private function getConexao() {
        $this->Conexao = Conexao::getConexao();
        $this->Dataset = $this->Conexao->prepare($this->Query);
        $this->Dataset->setFetchMode(pdo::FETCH_ASSOC);
    }
    
    private function getSyntax() {
        if($this->Places):
            foreach ($this->Places as $Key => $Value):
                $this->Dataset->bindParam(':'.$Key, $Value);    
            endforeach;
        endif;
    }
    
    public function fullRead($Query, $ParseString) {
        $this->Query =  $Query;
        if(!empty($ParseString)):
            parse_str($ParseString, $this->Places);
        endif;
        $this->execute();
    }
    
    public function setPlaces($ParseString) {
        parse_str($ParseString, $this->Places);
        $this->execute();
    }
    private function execute() {
        $this->getConexao();
        try {
            $this->getSyntax();
            $this->Dataset->execute();
            $this->Result = $this->Dataset->fetchAll();
        } catch (PDOExceptionException $PdoErro) {
            echo $PdoErro->getTraceAsString();
        }
    
    }        
    
}
