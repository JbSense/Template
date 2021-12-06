<?php

include '../../autoload.php';

/**
 * 
 */
class ParamController extends Controller {
    public function getTemplates() {
        
    }

    public function createTemplate() {
        
    }
}

$template = new TemplateController();
$result = $template->$_POST['function']();
