<?php include 'conexion.php';
$id=$_GET['id'];
$conexion->query("DELETE FROM inv_calzado WHERE Id_Calzado=$id");
header("Location: admin.php"); ?>