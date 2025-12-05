<!DOCTYPE html><html><head><meta charset="UTF-8"><link rel="stylesheet" href="estilos.css"></head>
<body>
<header class="main-header">
    <h1>TIENDA DEMETRI - ADMIN</h1>
    <nav>
        <a href="admin.php">← Volver</a>
    </nav>
</header>

<div class="login-box" style="margin-top: 30px; max-width: 600px;">
    <h2>Nuevo Producto</h2>
    
    <form action="crear_guardar.php" method="POST" enctype="multipart/form-data">
        <label for="nombre" style="display: block; margin-top: 10px; font-weight: bold;">Nombre:</label>
        <input type="text" name="nombre" placeholder="Nombre del producto" required>
        
        <label for="precio" style="display: block; margin-top: 15px; font-weight: bold;">Precio (BS):</label>
        <input type="number" name="precio" placeholder="Precio" step="0.01" required>
        
        <label for="stock" style="display: block; margin-top: 15px; font-weight: bold;">Stock:</label>
        <input type="number" name="stock" placeholder="Stock disponible" required>
        
        <label for="talla" style="display: block; margin-top: 15px; font-weight: bold;">Talla:</label>
        <input type="number" name="talla" placeholder="Talla" required>
        
        <label for="id_tipo" style="display: block; margin-top: 15px; font-weight: bold;">Tipo de Calzado:</label>
        <select name="id_tipo" required style="width: 100%; padding: 10px; margin: 5px 0 20px; border: 1px solid #ccc; border-radius: 7px;">
            <option value="">Seleccione tipo de calzado</option>
            <?php
            include 'conexion.php';
            $tipos = $conexion->query("SELECT * FROM tipocalzado");
            while($tipo = $tipos->fetch_assoc()) {
                echo "<option value='{$tipo['ID']}'>{$tipo['tipo']}</option>";
            }
            ?>
        </select>
        
        <label for="detalle" style="display: block; margin-top: 5px; font-weight: bold;">Descripción:</label>
        <textarea name="detalle" placeholder="Descripción del producto" rows="3" style="width: 100%; padding: 10px; margin: 5px 0 20px; border: 1px solid #ccc; border-radius: 7px;"></textarea>
        
        <label for="img" style="display: block; margin-top: 5px; font-weight: bold;">Imagen del producto:</label>
        <input type="file" name="img" accept="image/*" required style="margin-bottom: 20px;">
        
        <button class="btn-orange" type="submit" style="margin-top: 20px;">Guardar Producto</button>
    </form>
</div>
</body></html>