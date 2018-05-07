<?php

/**
 * Description of Create
 *
 * @author PHK
 */
class Delete {

    private $Table;
    private $Query;
    private $Termos;
    private $Places;
    private $Result;
    private $Data;

    /** @var PDO * */
    private $Conexao;

    /** @var PDOStatement Description * */
    private $Dataset;

    public function exeDelete($Table,$Termos,$ParseString) {
        $this->Table = (string) $Table;
        $this->Termos = (string) $Termos;
        parse_str($ParseString, $this->Places);
        
        $this->getSyntax();
        $this->execute();
    }

    public function getResult() {
        return $this->Result;
    }
    public function getRowcount() {
        return $this->Dataset->rowCount();
    }
    public function setPlaces($ParseString) {
        parse_str($ParseString, $this->Places);
        $this->getSyntax();
        $this->execute();
    }
    
    private function getConexao() {
        $this->Conexao = Conexao::getConexao();
        $this->Dataset = $this->Conexao->prepare($this->Query);
        
    }

    private function getSyntax() {
        
        $this->Query = "DELETE FROM  {$this->Table}  {$this->Termos}";
    }

    private function execute() {
        $this->getConexao();
        try {
            $this->Dataset->execute($this->Places);
            $this->Result = TRUE;
        } catch (PDOException $PdoErro) {
            $this->Result = FALSE;
            echo $PdoErro->getTraceAsString();
        }
        
    }

}
