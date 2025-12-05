<?php 
include 'conexion.php';

$nom = $conexion->real_escape_string($_POST['nombre']);
$pre = $_POST['precio'];
$stock = $_POST['stock'];
$talla = $_POST['talla'];
$id_tipo = $_POST['id_tipo'];
$detalle = $conexion->real_escape_string($_POST['detalle']);

$img = addslashes(file_get_contents($_FILES['img']['tmp_name']));

$sql = "INSERT INTO inv_calzado (Nombre, Precio, Stock, Talla, Id_Tipo, Detalle, Imagen) 
        VALUES ('$nom', $pre, $stock, $talla, $id_tipo, '$detalle', '$img')";

if($conexion->query($sql)) {
    header("Location: admin.php");
} else {
    echo "Error al guardar: " . $conexion->error;
    echo "<br>SQL: " . $sql;
}
?>