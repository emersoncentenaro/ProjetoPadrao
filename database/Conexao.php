<?php



/**
 * Conexao com o banco de dados  Conexao
 * Classe Abstrata de Conexão. Padrão SingleTon
 * @copyright (c) 2018, Karvat 
 * @author Karvat
 */
class Conexao {
   
    private static $Host = HOST;
    private static $User = USER;
    private static $Pass = PASS;
    private static $Dbsa = DBSA;
    private static $Options = null;
    
   
    /** * * @var PDO  */
    private static $Conexao = null;
    private static function conectar() {
        try{  
            if(self::$Conexao == null):
                $dsn = 'mysql:host='.self::$Host.';dbname='.self::$Dbsa;
                $Options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
                self::$Conexao = new PDO($dsn, self::$User,self::$Pass,$Options);
            endif;
            
        } catch (PDOException $PdoErro) {
            echo $PdoErro->getMessage();
        }
        self::$Conexao->setAttribute(pdo::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
        return self::$Conexao;
    }
    
    /**
     * <b>Retorna um Pdo, que contem a Conexão com o banco de dados<b>
     * @return PDO
     */
    public static function getConexao() {
        return self::conectar();
    }
    
    
    
    
    
    
}
