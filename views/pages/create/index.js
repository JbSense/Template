

// Abre o elemento add param
function openAddParam() {
    document.querySelector('#add-param').style.display = 'flex'
    typeParam()
}


// Fecha o elemento add param
function closeAddParam() {
    removeOptions()
    document.querySelector('#add-param').style.display = 'none'
}


// Faz modificações dependendo do tipo do parâmetro
function typeParam() {
    const type = document.querySelector('#type')

    const paramWithOption = [
        "select",
        "checkbox",
        "radio"
    ]

    if(paramWithOption.includes(type.value)) {
        document.querySelector('#options').style.display = 'grid'

        if(document.querySelector('.option')) return
        return addOption()

    } else {
        document.querySelector('#options').style.display = 'none'
        return removeOptions()
    }
}


// Adiociona uma nova opção
function addOption() {
    const div = document.createElement('div')
    div.className = 'input-param option'

    const p = document.createElement('p')
    p.innerText = 'Opção'

    const input = document.createElement('input')
    input.setAttribute('type', 'text')
    input.setAttribute('name', 'option')
    input.placeholder = 'Digite...'

    div.appendChild(p)
    div.appendChild(input)

    document.querySelector('#options').insertBefore(div, document.querySelector('#add-option'))
}


// Remove as opções
function removeOptions() {
    const options = document.querySelectorAll('.option')

    for(var i = 0; i < options.length; i++) {
        options[i].remove()
    }
}


// Salva um parâmetro no front
function addParam() {
    const optionsArray = []

    if(document.querySelectorAll('.option > input')) {
        const opts = document.querySelectorAll('.option > input')

        for(var i = 0; i < opts.length; i++) {
            optionsArray.push(opts[i].value)
        }
        
   } else {
       const opts = ''
   }

    const data = [
        document.querySelector('#type-param > select').value,
        document.querySelector('#name-param > input').value,
        optionsArray
    ]

    const div = document.createElement('div')
    div.className = 'param'

    const h2 = document.createElement('h2')
    h2.innerText = data[1]

    // Cria o input responsável por conter os valores do parâmetro
    const name = document.createElement('input')
    name.setAttribute('type', 'hidden')
    name.setAttribute('name', 'name')
    name.value = data[1]
    
    const p = document.createElement('p')
    p.innerText = data[0]

    const type = document.createElement('input')
    type.setAttribute('type', 'hidden')
    type.setAttribute('name', 'type')
    type.value = data[0]
    
    const options = document.createElement('input')
    options.setAttribute('type', 'hidden')
    options.setAttribute('name', 'options')
    options.value = data[2]

    div.appendChild(h2)
    div.appendChild(name)
    div.appendChild(p)
    div.appendChild(type)
    div.appendChild(options)

    document.querySelector('#name-param > input').value = ''

    document.querySelector('#added-params').insertBefore(div, document.querySelector('#btn-add-param'))
    closeAddParam()
}


// Área para testes
function getValues() {

    var form = new FormData(document.querySelector('form'))

    var params = []


    // Monta uma array com todas as opções
    for(var i = 0; i < form.getAll('name').length; i++) {
        var option = {
            "name": form.getAll('name')[i],
            "type": form.getAll('type')[i],
            "options": form.getAll('options')[i]
        }

        params.push(option)
    }

    var data = {
        "template_name": form.getAll('template_name'),
        "message": form.getAll('message'),
        "params": params
    }

    return data
}

function sendForm() {

    event.preventDefault() // Cancela o envio do formulário

    $.ajax({
        url: 'http://localhost/template/app/Controllers/TemplateController.php',
        type: 'POST',
        data: {
            "function": "createTemplate",
            "data": getValues()
        },
        success: function(result){

            console.log(result);

        },
        error: function(jqXHR, textStatus, errorThrown) {
          // Retorno caso algum erro ocorra
          console.log('f')
        }
    })
}