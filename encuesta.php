<?php
require('conexion.php');
$id = $_GET['id'];
if (!isset($_GET['id'])) {
    header('location: index.php');
}

if (isset($_POST['votar'])) {

    if (isset($_POST['valor'])) {
        $opciones = $_POST['valor'];
        $mod = mysqli_query($conex, "SELECT * FROM opciones WHERE id = " . $opciones);
        while ($result = mysqli_fetch_object($mod)) {
            $valor = $result->valor + 1; // obtenemos el valor de 'valor' y le añadimos 1 unidad
            mysqli_query($conex, "UPDATE opciones SET valor =  '" . $valor . "' WHERE id = " . $opciones); // luego ejecutamos el query SQL
        }
        header('location: resultado.php?id=' . $id); // Por ultimo lo redireccionamos a la encuestas mostrando los resultados.
    }
}
?>
<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <title>Sistema de encuestas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body background="fondo.jpg">
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">Encuesta de Ingenieria de sistemas</span>
    </nav>
    <div style="padding: 25px; margin: 0 auto; width: 385px;background: white;border-radius: 4px;margin-top: 70px;border: 1px solid white;">

        <form action="" method="post">
            <?php
            $aux = 0;
            $sql = "SELECT a.titulo as titulo, a.fecha as fecha, b.id as id, b.nombre as nombre, b.valor as valor FROM encuestas a INNER JOIN opciones b ON a.id = b.id_encuesta WHERE a.id = " . $id;
            $req = mysqli_query($conex, $sql);

            while ($result = mysqli_fetch_object($req)) {

                if ($aux == 0) {
                    echo '<h1 style="margin-bottom: 20px;
                    font-size: 21px;
                    border-bottom: 1px solid white;
                    padding-bottom: 15px;
                    text-align: center;">' . $result->titulo . '</h1>';

                    echo '<ul class="list-group">';
                    $aux = 1;
                }

                echo '<li class="list-group-item"><label><input name="valor" type="radio" value="' . $result->id . '"><span>' . $result->nombre . '</span></label></li>';
            }
            echo '</ul>';

            if (!isset($_POST['valor'])) {
                echo "<div class='error'>Selecciona una opcion.</div>";
            }

            echo '<input class="btn btn-primary" name="votar" type="submit" value="Votar" class="votar">';
            echo '<a class="btn btn-success" href="resultado.php?id=' . $id . '" class="resultado">Ver Resultados</a>';
            echo '<a class="btn btn-outline-secondary" href="index.php" class="volver">← Volver</a>';

            ?>

        </form>
    </div>

</body>

</html>