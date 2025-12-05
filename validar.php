<?php
include 'conexion.php';
$u=$_POST['usuario']??''; $c=$_POST['clave']??'';
$r=$conexion->query("SELECT * FROM usuario WHERE usuario='$u' AND contraseña='$c'");
if($r && $r->num_rows>0){ header("Location: admin.php"); }
else{ echo "Login incorrecto"; }
?>