<?php // datos para la conexion a mysql
define('DB_SERVER','localhost');
define('DB_NAME','encuesta');
define('DB_USER','root');

 
$conex = mysqli_connect(DB_SERVER,DB_USER);
mysqli_select_db($conex, DB_NAME);