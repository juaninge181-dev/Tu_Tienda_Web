<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - TuTiendaWeb</title>
</head>
<body>

    <h2>Iniciar Sesión en TuTiendaWeb</h2>
    <p>Ingresa tus credenciales para acceder a la plataforma local.</p>

    <form action="../controllers/UsuarioController.php?action=login" method="POST">
        
        <label for="correo">Correo Electrónico:</label><br>
        <input type="email" id="correo" name="correo" required><br><br>

        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Ingresar</button>
    </form>

    <br>
    <hr style="width: 200px; margin-left: 0;">
    <p>¿Aún no tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>

</body>
</html>