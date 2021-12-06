<?php

?>

<form method="POST" action="http://localhost/template/app/Controllers/TemplateController.php" class="create">
    <h1 class="title-b">Criar Template</h1>

    <!-- Nome do template -->
    <div class="template-name">
        <h3 class="title-m">Nome do Template</h3>
        <input type="text" name="template_name" placeholder="Digite...">
    </div>


    <!-- Manual de como criar um template -->
    <div class="how-to">
        <h3 class="title-m">Passo a passo</h3>

        <span></span>
    </div>


    <!-- Mensagem do template -->
    <div class="message">
        <h3 class="title-m">Mensagem</h3>
        <textarea name="message" cols="30" rows="10" placeholder="Digite a mensagem"></textarea>
    </div>


    <!-- Parâmetros da mensagem do template -->
    <div class="params">
        <h3 class="title-m">Parâmetros da mensagem</h3>

        <div class="added-params" id="added-params">
            <p class="btn-add-param" id="btn-add-param" onclick="openAddParam()">Adicionar</p>
        </div>
    </div>


    <!-- Salva o template -->
    <button type="submit" class="btn-orange">Salvar</button>
</form>


<!-- Adiciona um novo parâmetro -->
<div class="add-param" id="add-param">
    <div class="container" id="add-param-container">
        <h1 class="title-m">Adicionar um parâmetro</h1>


        <!-- Fecha o elemento add-param -->
        <h1 class="close-add-param" id="close-add-param" onclick="closeAddParam()">X</h1>


        <!-- Tipo do parâmetro -->
        <div class="type input-param" id="type-param">
            <p>Tipo</p>

            <select name="type" id="type" onclick="typeParam()">
                <option value="text">Text</option>
                <option value="numeric">Numeric</option>
                <option value="email">E-mail</option>
                <option value="date">Data</option>
                <option value="select">Select</option>
                <option value="checkbox">Checkbox</option>
                <option value="radio">Radio</option>
                <option value="textarea">Textarea</option>
            </select>
        </div>


        <!-- Nome do parâmetro -->
        <div class="name input-param" id="name-param">
            <p>Nome</p>
            <input type="text" name="name" placeholder="Digite...">
        </div>


        <!-- Opções adicionadas -->
        <div class="options" id="options">
            <h1 class="add-option" id="add-option" onclick="addOption()">+</h1>
        </div>


        <!-- Salva o novo parâmetro -->
        <p class="save-param btn-orange" id="save-param" onclick="addParam()">Salvar</p>
    </div>
</div>