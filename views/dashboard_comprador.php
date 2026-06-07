<?php
// views/dashboard_comprador.php
session_start();

// Validar que el usuario haya iniciado sesión y sea comprador
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'comprador') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Cliente - TuTiendaWeb</title>
</head>
<body>

    <h2>Bienvenido a TuTiendaWeb, <?php echo htmlspecialchars($_SESSION['nombre']); ?> 👋</h2>
    <p>Estás en tu **Panel de Cliente (Comprador)**.</p>
    
    <hr>
    
    <h3>🛍️ Catálogo de Tiendas Locales</h3>
    <p>Próximamente aquí podrás ver la lista de productos disponibles en tu comunidad.</p>

    <br>
    <a href="../controllers/UsuarioController.php?action=logout">Cerrar Sesión</a>

</body>
</html>