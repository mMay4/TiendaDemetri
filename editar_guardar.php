<?php 
include 'conexion.php';

$id = $_POST['id'];
$n = $conexion->real_escape_string($_POST['nombre']);
$p = $_POST['precio'];
$stock = $_POST['stock'];
$talla = $_POST['talla'];
$id_tipo = $_POST['id_tipo'];
$detalle = $conexion->real_escape_string($_POST['detalle']);

$sql = "UPDATE inv_calzado 
        SET Nombre='$n', 
            Precio=$p, 
            Stock=$stock, 
            Talla=$talla, 
            Id_Tipo=$id_tipo, 
            Detalle='$detalle'";

if(isset($_FILES['img']) && $_FILES['img']['error'] == 0 && $_FILES['img']['size'] > 0) {
    $img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
    $sql .= ", Imagen='$img'";
}

$sql .= " WHERE Id_Calzado=$id";

if($conexion->query($sql)) {
    header("Location: admin.php");
} else {
    echo "Error al actualizar: " . $conexion->error;
    echo "<br>SQL: " . $sql;
}
?>