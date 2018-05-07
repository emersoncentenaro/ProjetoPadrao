<?php

/**
 * Description of Core
 *
 * @author PHK
 */
class Core {

    private $Params = array();
    private $ControllerAction = array();
    private $Controller;
    private $Action;
    private $Url;

    public function __construct() {
        $this->setUrl();
        $this->setControllerAction();
        $this->setController();
        $this->setAction();
        $this->setParams();
    }

    private function setUrl() {
        $this->Url = filter_input(INPUT_GET, 'url');
        $this->Url = !isset($this->Url) || $this->Url == NULL ? 'Home/index' : $this->Url;
    }

    private function setControllerAction() {
        $this->ControllerAction = explode('/', $this->Url);
    }

    private function setController() {
        $this->Controller = $this->ControllerAction[0] . 'Controller';
    }

    private function setAction() {
        $this->Action = !isset($this->ControllerAction[1]) || $this->ControllerAction[1] == null ? 'index' : $this->ControllerAction[1];
    }

    private function setParams() {
        unset($this->ControllerAction[0]);
        unset($this->ControllerAction[1]);

        if (empty(end($this->ControllerAction))):
            array_pop($this->ControllerAction);
        endif;

        foreach ($this->ControllerAction as $Key => $Value):
            $this->Params[$Value] = $Value;
        endforeach;
    }

    public function run() {

            call_user_func_array(array(new $this->Controller,
                $this->Action), array($this->Params));  
    }

}
