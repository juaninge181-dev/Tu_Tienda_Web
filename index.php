<?php
// index.php
// Este archivo actúa como el punto de entrada principal del sitio.

session_start();

// Si el usuario ya inició sesión, lo enviamos directo a su panel
if (isset($_SESSION['id_usuario'])) {
    if ($_SESSION['rol'] == 'vendedor') {
        header("Location: views/dashboard_vendedor.php");
    } else {
        header("Location: views/dashboard_comprador.php");
    }
    exit();
}

// Si no ha iniciado sesión, lo enviamos al login
header("Location: views/login.php");
exit();
?>