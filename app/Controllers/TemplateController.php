<?php

include '../../autoload.php';

/**
 * 
 */
class TemplateController extends Controller {
    public function getTemplates() {
        $result = $this->template->get();

        return json_encode($result);
    }

    public function createTemplate() {
        $data = $_POST['data'];


        $this->template->create([
            "name" => $data["template_name"][0],
            "message" => $data["message"][0]
        ]);

        $last_id = $this->template->get('ORDER BY id DESC LIMIT 1')[0]['id'];

        for($i = 0; $i < count($data['params']); $i++) {
            $this->param->create([
                "template" => $last_id,
                "type" => $data['type'][$i],
                "name" => $data['name'][$i],
                "options" => $data['options'][$i],
                "label" => $data['name'][$i]
            ]);
        }        
    }
}

$template = new TemplateController();
$result = $template->$_POST['function']();
var_dump($result);
