<?php

/**
 * Description of Create
 *
 * @author PHK
 */
class Create {

    private $Table;
    private $Query;
    private $Result;
    private $Data;

    /** @var PDO * */
    private $Conexao;

    /** @var PDOStatement Description * */
    private $Dataset;

    public function exeCreate($Table, array $Data) {
        $this->Table = (string) $Table;
        $this->Data = $Data;
        $this->getSyntax();
        $this->execute();
    }

    public function getResult() {
        return $this->Result;
    }

    private function getConexao() {
        $this->Conexao = Conexao::getConexao();
        $this->Dataset = $this->Conexao->prepare($this->Query);
        
    }

    private function getSyntax() {
        $Fields = implode(', ', array_keys($this->Data));
        $Params = ':' . implode(', :', array_keys($this->Data));
        $this->Query = "INSERT INTO {$this->Table}({$Fields}) VALUES ({$Params})";
    }

    private function execute() {
        $this->getConexao();
        try {
            $this->Dataset->execute($this->Data);
            $this->Result = $this->Conexao->lastInsertId();
        } catch (PDOException $PdoErro) {
            echo $PdoErro->getMessage();
        }
    }

}
