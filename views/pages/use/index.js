


var messageDefault = ''
var messageIndex = ''

function backend(controller, func, data) {
    return $.ajax({
        url: `http://localhost/template/app/Controllers/${controller}Controller.php`,
        type: 'GET',
        data: {
            "function": func,
            "data": data
        }
    })
}


/**
 * Chamada sempre que a página é carregada
 */
function loadPage() {
    var id = window.location.href.toString().split('/')[5]

    backend('Template', 'getTemplates', id).then(response => {
        
        var template = JSON.parse(response)[0]
        console.log(response)
        constructPage(template)
    })


    backend('Param', 'getParams', id).then(response => {

        console.log(response)
        var param = response

        // param.map((data) => {
            
        //     test({
        //         name: data.name,
        //         type: data.type
        //     })
        // })
    })
}


function constructInput(data) {

}


/**
 * Atualiza a mensagem no frontend
 * 
 * @param {string} message 
 */
function setMessage(message) {

    var messageArray2 = message.split(' ')
    var paramsIndex = []

    for(var i = 0; i < messageArray2.length; i++) {
        
        if(messageArray2[i].includes('{')) {
            paramsIndex[messageArray2[i]] = i
        }
    }

    messageIndex = paramsIndex
}


/**
 * Função que constrói a página
 * 
 * @param {json} data dados do template
 */
function constructPage(data) {
    document.querySelector('#template_name').innerText = 'Template de ' + data.name
    document.querySelector('#message').innerText = data.message
}

function test(data) {
    var div = document.createElement('div')
    div.className = 'param'

    var name = document.createElement('p')
    name.innerText = data.name
    
    var input = document.createElement('input')
    input.setAttribute('oninput', `saveParam('${data.name}')`)
    input.type = data.type
    input.name = data.name.toLowerCase()
    input.placeholder = 'Digite'

    div.appendChild(name)
    div.appendChild(input)

    document.querySelector('.params').appendChild(div)
}


/**
 * Salva um parâmetro na mensagem
 */
function saveParam(name) {
    var name = name.replace('{', '')
    var name = name.replace('}', '')

    var value = document.getElementsByName(name)[0].value
    var messageArray = messageDefault.split(' ')

    for(var i = 0; i < messageIndex.length; i++) {
        if(messageIndex[i].includes(name)) {
            console.log(messageIndex[i])
            messageArray[messageIndex[i]] = value
        }
    }

    document.querySelector('#message').innerText = messageArray.join(' ')
    // messageDefault = messageArray.join(' ')
}
