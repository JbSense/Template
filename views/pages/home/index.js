

var template = document.getElementById('template')

function changeLink(data = null) {
    if(data) {
        document.getElementById('template-link').href = `use/${data}`
    } else {
        document.getElementById('template-link').href = `use/${template.value}`
    }
}


function loadPage() {
    $.ajax({
        url: 'http://localhost/template/app/Controllers/TemplateController.php',
        type: 'GET',
        data: {
            "function": "getTemplates",
            "data": ''
        },
        success: function(result){
            data = JSON.parse(result)
            
            for(var i = 0; i < data.length; i++) {
                createOptions(data[i])
            }
            changeLink(data[0].id)
        },
        error: function(jqXHR, textStatus, errorThrown) {
          // Retorno caso algum erro ocorra
          console.log('f')
        }
    })
}

function createOptions(data) {
    var option = document.createElement('option')
    option.setAttribute('value', data.id)
    option.innerText = `Template de ${data.name}`

    document.querySelector('#template').appendChild(option)
}


function useTemplate() {
    $.ajax({
        url: 'http://localhost/template/app/Controllers/TemplateController.php',
        type: 'GET',
        data: {
            "function": "useTemplate",
            "data": template.value
        },
        success: function(result){
            data = JSON.parse(result)
            
            for(var i = 0; i < data.length; i++) {
                createOptions(data[i])
            }
            changeLink(data[0].id)
        },
        error: function(jqXHR, textStatus, errorThrown) {
          // Retorno caso algum erro ocorra
          console.log('f')
        }
    })
}