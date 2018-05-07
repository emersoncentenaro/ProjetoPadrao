<?php

/**
 * Description of User
 *
 * @author PHK
 */
class User {
    

    public function create(array $Dados) {
        
        $create = new Create;
        $create->exeCreate('user', $Dados);
        
        sleep(3);
        return $create->getResult();
        
    }
   
}
