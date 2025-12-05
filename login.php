<!DOCTYPE html><html><head><meta charset="UTF-8"><link rel="stylesheet" href="estilos.css"></head>
<body>
<header class="main-header">
    <h1>TIENDA DEMETRI</h1>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="catalogo.php">Catálogo</a>
        <a href="pago.php">Pago</a>
    </nav>
</header>
<div class="login-box">
    <h2>Iniciar Sesión</h2>
    <form action="validar.php" method="POST">
        <input type="text" name="usuario" placeholder="Usuario" required><br>
        <input type="password" name="clave" placeholder="Contraseña" required><br>
        <button class="btn-orange" type="submit">Ingresar</button>
    </form>
</div>
</body></html>