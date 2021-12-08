<?php

include '../../config/Controller.php';

/**
 * 
 */
class TemplateController extends Controller {
    public function getTemplates() {
        $id = $_GET['data'];

        if($id) {
            $result = $this->template->get("WHERE id = '$id'");
            echo $result;

        } else {
            $result = $this->template->get();
    
            for($i = 0; $i < count($result); $i++) {
                echo $result;
            }
        }
    }

    public function createTemplate() {
        $data = $_POST['data'];

        $template_name = $data['template_name'][0];
        $message = $data['message'][0];

        $this->template->create([
            "name" => "'$template_name'",
            "message" => "'$message'"
        ]);

        $last_id = $this->template->get('ORDER BY id DESC LIMIT 1')[0]['id'];

        $params = $data['params'];

        for($i = 0; $i < count($params); $i++) {
            $type = $params[$i]['type'];
            $name = $params[$i]['name'];
            $options = $params[$i]['options'];

            $this->param->create([
                "template" => "'$last_id'",
                "type" => "'$type'",
                "name" => "'$name'",
                "options" => "'$options'",
            ]);
        }
    }

    public function useTemplate() {
        echo $_GET['data'];

        $page = new Routes;

        $page->render();
    }
}

if(isset($_POST['function'])) {
    $template = new TemplateController();
    $result = $template->$_POST['function']();
    
} elseif (isset($_GET['function'])) {
    $template = new TemplateController();
    $result = $template->$_GET['function']();
}
