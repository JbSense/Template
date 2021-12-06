<?php

class Routes {
    public function __construct() {
        $this->page = explode("/", $_SERVER['REQUEST_URI'])[2];
        if(isset(explode("/", $_SERVER['REQUEST_URI'])[3])) $this->param = explode("/", $_SERVER['REQUEST_URI'][3]);
    }

    public function render() {
        return include "views/pages/$this->page/index.php";
    }
}