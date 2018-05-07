<?php

/**
 * Description of Create
 *
 * @author PHK
 */
class Update {

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

    public function exeUpdate($Table, array $Data,$Termos,$ParseString) {
        $this->Table = (string) $Table;
        $this->Data = $Data;
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
        foreach($this->Data as $Key => $Value):
            $Places[] = $Key . ' = :'. $Key;
        endforeach;
        $Places = implode(', ', $Places);
        $this->Query = "UPDATE {$this->Table} SET {$Places} {$this->Termos}";
    }

    private function execute() {
        $this->getConexao();
        try {
            $this->Dataset->execute(array_merge($this->Data, $this->Places));
            $this->Result = TRUE;
        } catch (PDOException $PdoErro) {
            $this->Result = FALSE;
            echo $PdoErro->getTraceAsString();
        }
        
    }

}
