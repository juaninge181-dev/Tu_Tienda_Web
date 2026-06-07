<!-- views/registro.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - TuTiendaWeb</title>
</head>
<body>

    <h2>Crea tu cuenta en TuTiendaWeb</h2>
    <p>Únete a la red de comercio local más grande de tu comunidad.</p>

    <form action="../controllers/UsuarioController.php?action=registrar" method="POST">
        
        <label for="nombre">Nombre Completo o de la Tienda:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="correo">Correo Electrónico:</label><br>
        <input type="email" id="correo" name="correo" required><br><br>

        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <label for="rol">¿Qué tipo de usuario eres?</label><br>
        <select id="rol" name="rol" required>
            <option value="">-- Selecciona una opción --</option>
            <option value="comprador">Quiero comprar productos (Cliente)</option>
            <option value="vendedor">Quiero vender productos (Dueño de Tienda)</option>
        </select><br><br>

        <button type="submit">Registrarse</button>
    </form>

    <br>
    <hr style="width: 200px; margin-left: 0;">
    <p>¿Ya tienes una cuenta creada? <a href="login.php">Inicia sesión aquí</a></p>

</body>
</html>