<?php

require('conexion.php');

if (!isset($_GET['id'])) {
    header('location: index.php');
}

$suma = 0;
$id = $_GET['id'];
$mod = mysqli_query($conex, "SELECT SUM(valor) as valor FROM opciones WHERE id_encuesta = " . $id);
while ($result = mysqli_fetch_object($mod)) {
    $suma = $result->valor;
}

?>
<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <style type="text/css">
        .barra {
            background: #0062cc;
            clear: both;
            height: 23px;
            color: white;
            font-weight: bold;
            text-align: right;
            padding: 2px;
            border-radius: 4px;
            max-width: 356px;
            min-width: 28px;
        }
    </style>
    <meta charset="UTF-8">
    <title>Sistema de Encuestas</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body background="fondo.jpg">
<nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">Encuesta de Ingenieria de sistemas</span>
    </nav>
    <div style="padding: 14px; margin: 0 auto; width: 388px;background: white;border-radius: 4px;margin-top: 41px;border: 1px solid white;">
        <form action="" method="post">
            <?php
            $aux = 0;
            $sql = "SELECT a.titulo as titulo, a.fecha as fecha, b.id as id, b.nombre as nombre, b.valor as valor FROM encuestas a INNER JOIN opciones b ON a.id = b.id_encuesta WHERE a.id = " . $id;
            $req = mysqli_query($conex, $sql);

            while ($result = mysqli_fetch_object($req)) {
                if ($aux == 0) {
                    echo "<h1 style='margin-bottom: 20px;
                    font-size: 21px;
                    border-bottom: 1px solid #DDD;
                    padding-bottom: 15px;
                    text-align: center;'>" . $result->titulo . "</h1>";
                    echo "<ul  class='list-group'>";
                    $aux = 1;
                }
                echo '<li class="list-group-item" style="float: left;
                margin-left: 10px;
                margin-top: 7px;
                color: black;"><div style=" float: left;">' . $result->nombre . '</div><div style="float: right;">Votos: ' . $result->valor . '</div>';
                if ($suma == 0) {
                    echo '<div class="barra cero" style="width:0%;"></div></li>';
                } else {
                    echo '<div class="barra" style="width:' . ($result->valor * 100 / $suma) . '%;">' . round($result->valor * 100 / $suma) . '%</div></li>';
                }
            }
            echo '</ul>';

            if (isset($aux)) {
                echo '<span style="float: right;">Total: ' . $suma . '</span>';
                echo '<a class="btn btn-outline-secondary" href="encuesta.php?id=' . $id . '"" class="volver">← Volver</a>';
            }

            ?>
            </ul>
        </form>
    </div>
</body>

</html>