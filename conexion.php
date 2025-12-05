<?php
$conexion = new mysqli("localhost","root","","tienda_calzado");
if($conexion->connect_error){ die("Error DB: ".$conexion->connect_error); }
?>