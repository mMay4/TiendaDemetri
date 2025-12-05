<?php include 'conexion.php'; ?>
<!DOCTYPE html><html><head><meta charset="UTF-8"><link rel="stylesheet" href="estilos.css">
<style>
.admin-table img {
    max-width: 50px;
    max-height: 50px;
    border-radius: 5px;
    object-fit: cover;
    border: 1px solid #ddd;
}
.acciones {
    display: flex;
    gap: 5px;
    flex-wrap: wrap;
}
</style></head>
<body>
<header class="main-header">
    <h1>Tienda demetri - Admin</h1>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="catalogo.php">Catálogo</a>
        <a class="login-btn" href="login.php">Cerrar Sesión</a>
    </nav>
</header>

<div class="admin-container">
    <div class="admin-top">
        <h2>Inventario de Productos</h2>
        <a class="btn-orange" href="crear.php">Nuevo Producto</a>
    </div>
    
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Talla</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $q = $conexion->query("SELECT i.*, t.tipo as nombre_tipo 
            FROM inv_calzado i 
            LEFT JOIN tipocalzado t ON i.Id_Tipo = t.ID 
            ORDER BY i.Id_Calzado DESC");
        
        while($p = $q->fetch_assoc()) {
            $img = !empty($p['Imagen']) ? 
                'data:image/png;base64,'.base64_encode($p['Imagen']) : 
                'sin_imagen.png';

            $stock_class = ($p['Stock'] <= 5) ? 'style="color: red; font-weight: bold;"' : 
                (($p['Stock'] <= 10) ? 'style="color: orange;"' : '');
            
            echo "<tr>
                    <td>{$p['Id_Calzado']}</td>
                    <td><img src='$img' width='50' height='50' title='Click para ver más'></td>
                    <td><strong>{$p['Nombre']}</strong><br>
                        <small style='color: #666;'>{$p['Detalle']}</small>
                    </td>
                    <td><strong>{$p['Precio']} BS</strong></td>
                    <td {$stock_class}>{$p['Stock']}</td>
                    <td>{$p['Talla']}</td>
                    <td>{$p['nombre_tipo']}</td>
                    <td>
                        <div class='acciones'>
                            <a class='btn-edit' href='editar.php?id={$p['Id_Calzado']}'>Editar</a>
                            <a class='btn-delete' href='eliminar.php?id={$p['Id_Calzado']}' 
                            onclick='return confirm(\"¿Eliminar producto {$p['Nombre']}?\")'>Eliminar</a>
                        </div>
                    </td>
                </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body></html>