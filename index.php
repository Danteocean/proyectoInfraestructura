<?php
require('conexion.php');
$sql = "SELECT * FROM encuestas ORDER BY id DESC";
$req = mysqli_query($conex, $sql);
?>
<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>Encuesta de ingenieria de sistemas</title>
    
</head>

<body background="fondo.jpg">
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">Encuesta de Ingenieria de sistemas</span>
    </nav>
    <div style="padding: 25px; margin: 0 auto; width: 385px;background: white;border-radius: 4px;margin-top: 39px;border: 1px solid white;">
        <h1 style="margin-bottom: 20px;
    font-size: 21px;
    border-bottom: 1px solid white;
    padding-bottom: 15px;
    text-align: center;">Encuestas</h1>
        <ul class="list-group">
            <?php
            while ($result = mysqli_fetch_object($req)) {
                echo '<li class="list-group-item"><a class="btn btn-outline-primary" href="encuesta.php?id=' . $result->id . '">' . $result->titulo . '</a></li>';
            }
            ?>
        </ul>

    </div>
</body>

</html>