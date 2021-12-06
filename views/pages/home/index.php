<?php

$template = new TemplateController();
$data = $template->getTemplates();

$firstTemplate = $data[0]['id'];

?>

<div class="home">
    <div class="select-template">
        <p class="title">Selecionar template</p>

        <select name="template" id="template">
            <?php
                foreach($data as $template) {
                    echo "<option value='$template[id]'>Template de $template[name]</option>";
                }
            ?>
        </select>

        <?php echo "<a href='use/$firstTemplate' id='template-link'>Usar</a>" ?>
    </div>
    
    <div class="create-template">
        <p class="title">Criar template</p>
        
        <a href="create">Criar</a>
    </div>
</div>

<script>
    const template = document.getElementById('template')
    const templateLink = document.getElementById('template-link')
    template.addEventListener('click', () => {
        console.log(template.value);
        templateLink.href = `use/${template.value}`;
    })
</script>