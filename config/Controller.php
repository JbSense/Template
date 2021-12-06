<?php

include '../../autoload.php';

class Controller {
    public function __construct() {
        $array = str_split(get_class($this));

        for($x = 0; $x < 10; $x++) {
            array_pop($array);
        }
        
        $array = implode(',', $array);
        $model = str_replace(',', '', $array);

        $this->template = new Template;
        $this->param = new Param;
    }
}
