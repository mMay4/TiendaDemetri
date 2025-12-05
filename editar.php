<?php 
include 'conexion.php';
$id = $_GET['id'];
$r = $conexion->query("SELECT * FROM inv_calzado WHERE Id_Calzado=$id");
$p = $r->fetch_assoc(); 
?>
<!DOCTYPE html><html><head><meta charset="UTF-8"><link rel="stylesheet" href="estilos.css"></head>
<body>
<header class="main-header">
    <h1>TIENDA DEMETRI - ADMIN</h1>
    <nav>
        <a href="admin.php">← Volver</a>
    </nav>
</header>

<div class="login-box" style="margin-top: 30px; max-width: 600px;">
    <h2>Editar Producto</h2>
    
    <!-- Mostrar imagen actual -->
    <div style="text-align: center; margin-bottom: 20px;">
        <h4>Imagen Actual:</h4>
        <?php 
        if(!empty($p['Imagen'])) {
            $img = 'data:image/png;base64,'.base64_encode($p['Imagen']);
            echo "<img src='$img' width='150' style='border-radius: 8px; border: 2px solid #ddd; margin: 10px 0;'>";
        } else {
            echo "<p style='color: #999;'>Sin imagen</p>";
        }
        ?>
    </div>
    
    <form action="editar_guardar.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        
        <label for="nombre" style="display: block; margin-top: 10px; font-weight: bold;">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($p['Nombre']); ?>" placeholder="Nombre del producto" required>
        
        <label for="precio" style="display: block; margin-top: 15px; font-weight: bold;">Precio (BS):</label>
        <input type="number" name="precio" value="<?php echo $p['Precio']; ?>" placeholder="Precio" step="0.01" required>
        
        <label for="stock" style="display: block; margin-top: 15px; font-weight: bold;">Stock:</label>
        <input type="number" name="stock" value="<?php echo $p['Stock']; ?>" placeholder="Stock disponible" required>
        
        <label for="talla" style="display: block; margin-top: 15px; font-weight: bold;">Talla:</label>
        <input type="number" name="talla" value="<?php echo $p['Talla']; ?>" placeholder="Talla" required>
        
        <label for="id_tipo" style="display: block; margin-top: 15px; font-weight: bold;">Tipo de Calzado:</label>
        <select name="id_tipo" required style="width: 100%; padding: 10px; margin: 5px 0 20px; border: 1px solid #ccc; border-radius: 7px;">
            <option value="">Seleccione tipo</option>
            <?php
            $tipos = $conexion->query("SELECT * FROM tipocalzado");
            while($tipo = $tipos->fetch_assoc()) {
                $selected = ($tipo['ID'] == $p['Id_Tipo']) ? 'selected' : '';
                echo "<option value='{$tipo['ID']}' $selected>{$tipo['tipo']}</option>";
            }
            ?>
        </select>
        
        <label for="detalle" style="display: block; margin-top: 5px; font-weight: bold;">Descripción:</label>
        <textarea name="detalle" placeholder="Descripción del producto" rows="3" style="width: 100%; padding: 10px; margin: 5px 0 20px; border: 1px solid #ccc; border-radius: 7px;"><?php echo htmlspecialchars($p['Detalle']); ?></textarea>
        
        <label for="img" style="display: block; margin-top: 5px; font-weight: bold;">Cambiar Imagen (opcional):</label>
        <input type="file" name="img" accept="image/*" style="margin-bottom: 20px;">
        <small style="color: #666;">Deja vacío para mantener la imagen actual</small>
        
        <button class="btn-orange" type="submit" style="margin-top: 20px;">Guardar Cambios</button>
    </form>
</div>
</body></html>