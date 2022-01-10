<?php

include '../../autoload.php';

class ParamController extends Controller {
    public function getParams() {
        $id = $_GET['data'];

        if($id) {
            $result = $this->param->get("WHERE template = $id");
            echo $result;

        } else {
            $result = $this->param->get();
    
            for($i = 0; $i < count($result); $i++) {
                echo $result;
            }
        }
    }
}

if(isset($_POST['function'])) {
    $param = new ParamController();
    $result = $param->$_POST['function']();
    
} elseif (isset($_GET['function'])) {
    $param = new ParamController();
    $result = $param->$_GET['function']();
}
