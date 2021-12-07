<?php

$page = new Routes;
$asset = $page->page;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php 
        if($asset != "use") { 
            echo "<link rel='stylesheet' href='public/index.css'>";
        } else {
            echo "<link rel='stylesheet' href='../public/index.css'>";
        }
    ?>

    <?php 
        if($asset != "use") { 
            echo "<link rel='stylesheet' href='views/pages/$asset/index.css'>";
        } else {
            echo "<link rel='stylesheet' href='../views/pages/$asset/index.css'>";
        }
    ?>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

    <title>Templates</title>
</head>
<body onload="loadPage()">
    <header><a>Templates</a></header>

    <div class="content">
        <?php
            $page->render();
        ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <?php 
        if($asset != "use") { 
            echo "<script src='views/pages/$asset/index.js'></script>";
        } else {
            echo "<script src='../views/pages/$asset/index.js'></script>";
        }
    ?>
</body>
</html>