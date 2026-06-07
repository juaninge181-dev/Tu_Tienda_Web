<?php
// views/dashboard_vendedor.php
session_start();

// Validar que el usuario haya iniciado sesión y sea vendedor
if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'vendedor') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Tienda - TuTiendaWeb</title>
</head>
<body>

    <h2>Panel de Gestión de Tienda 🏪</h2>
    <p>¡Hola, <?php echo htmlspecialchars($_SESSION['nombre']); ?>! Administra tu negocio local aquí.</p>
    
    <hr>
    
    <h3>📦 Tus Productos en Venta</h3>
    <p>Próximamente aquí podrás registrar, editar y dar de baja tus productos del mercado.</p>

    <br>
    <a href="../controllers/UsuarioController.php?action=logout">Cerrar Sesión</a>

</body>
</html>