<?php include 'conexion.php'; ?>
<!DOCTYPE html><html><head><meta charset="UTF-8"><link rel="stylesheet" href="estilos.css"></head>
<body>
<header class="main-header">
    <h1>TIENDA DEMETRI</h1>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="pago.php">Pago</a>
        <a class="login-btn" href="login.php">Login</a>
    </nav>
</header>

<h2 style="padding: 0 25px; margin-top: 30px;">Catálogo de Productos</h2>
<div class="cards-container">
<?php
$q = $conexion->query("SELECT i.*, t.tipo as nombre_tipo 
            FROM inv_calzado i 
            LEFT JOIN tipocalzado t ON i.Id_Tipo = t.ID 
            ORDER BY i.Id_Calzado");
    
while($p = $q->fetch_assoc()) {
    $img = !empty($p['Imagen']) ? 
        'data:image/png;base64,'.base64_encode($p['Imagen']) : 
        'sin_imagen.png';
    
    $detalle = !empty($p['Detalle']) ? $p['Detalle'] : 'Sin descripción';
    
    echo "<div class='card'>
            <div class='img'><img src='$img'></div>
            <div class='card-info'>
                <h3>{$p['Nombre']}</h3>
                <small>Tipo: {$p['nombre_tipo']}</small>
                <small>Talla: {$p['Talla']}</small>
                <small>Stock: {$p['Stock']} unidades</small>
                <p style='font-size: 14px; color: #666; margin: 8px 0;'>{$detalle}</p>
                <div class='card-price'>{$p['Precio']} BS</div>
            </div>
        </div>";
}
?>
</div>
</body></html>