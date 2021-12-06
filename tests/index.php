<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

    <title>Templates</title>
</head>
<body>
    <header><h1>Templates</h1></header>

    <div class="content">
        <button id="send">SEND</button>

        <h1 id="page">Page</h1>

        

    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>

        const page = document.getElementById('page');
        const send = document.getElementById('send');
        send.addEventListener('click', function() {
            $.ajax({
                url: "route.php",
                type: "POST",
                data: "page=home",
                dataType: "html"
    
            }).done(function(resposta) {
                page.innerText = resposta

            }).fail(function(jqXHR, textStatus ) {
                console.log("Request failed: " + textStatus)

            }).always(function() {
                console.log("completou")
            })
        })

    </script>
</body>
</html>
