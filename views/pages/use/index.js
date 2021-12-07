


function backend(props) {
    return $.ajax({
        url: `http://localhost/template/app/Controllers/${props.controller}Controller.php`,
        type: 'GET',
        data: {
            "function": props.function,
            "data": props.data
        }
    })
}

function loadPage() {
    var id = window.location.href.toString().split('/')[5]

    var templates = backend({
        controller: 'Template',
        function: 'getTemplates',
        data: id
    })

    templates.then(response => {
        var template = JSON.parse(response)[0]
        constructPage(template.name)
    })


    var params = backend({
        controller: 'Param',
        function: 'getParams',
        data: id
    })

    params.then(response => {
        var param = JSON.parse(response)

        param.map((data) => {
            
            test({
                name: data.name,
                type: data.type
            })
        })
    })
}

function constructPage(data) {
    document.querySelector('#template_name').innerText = 'Template de ' + data
}

function test(data) {
    var div = document.createElement('div')
    div.className = 'param'

    var name = document.createElement('p')
    name.innerText = data.name

    var input = document.createElement('input')
    input.type = data.type
    input.name = data.name.toLowerCase()
    input.placeholder = 'Digite'

    div.appendChild(name)
    div.appendChild(input)

    document.querySelector('.params').appendChild(div)
}

// test({
//     name: 'E-mail',
//     type: 'email'
// })