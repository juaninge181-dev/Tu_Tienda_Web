<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - TuTiendaWeb</title>
    <!-- Importamos una tipografía moderna y limpia (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* --- ESTILOS GLOBALES --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background-color: #f4f7f6;
            color: #333;
        }

        /* --- CONTENEDOR PRINCIPAL (PANTALLA DIVIDIDA) --- */
        .login-container {
            display: flex;
            width: 100%;
        }

        /* --- PANEL IZQUIERDO (BANNER DE BIENVENIDA) --- */
        .brand-panel {
            flex: 1;
            background: radial-gradient(circle at top left, #1a365d, #0f172a);
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            color: #ffffff;
            overflow: hidden;
        }

        /* Elementos decorativos abstractos (ondas doradas de fondo) */
        .brand-panel::before, .brand-panel::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            border: 2px solid rgba(212, 175, 55, 0.15);
            pointer-events: none;
        }

        .brand-panel::before {
            width: 500px;
            height: 500px;
            top: -100px;
            left: -100px;
        }

        .brand-panel::after {
            width: 600px;
            height: 600px;
            bottom: -150px;
            right: -150px;
        }

        .brand-content {
            text-align: center;
            z-index: 10;
            max-width: 450px;
        }

        /* Logotipo simulado con iconos SVG */
        .brand-logo {
            margin-bottom: 20px;
        }

        .brand-logo svg {
            width: 80px;
            height: 80px;
            fill: #d4af37; /* Dorado */
        }

        .brand-content h1 {
            font-size: 2.5rem;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .brand-content h1 span {
            color: #d4af37;
        }

        .brand-content p {
            font-size: 1.1rem;
            color: #cbd5e1;
            font-weight: 300;
        }

        /* --- PANEL DERECHO (FORMULARIO DE LOGIN) --- */
        .form-panel {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            background-image: url('https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1200&q=80'); /* Fondo de oficina sutil de la imagen */
            background-size: cover;
            background-position: center;
            position: relative;
        }

        /* Capa superpuesta para difuminar el fondo de la oficina */
        .form-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(3px);
            z-index: 1;
        }

        /* Tarjeta flotante del formulario */
        .login-card {
            background: #ffffff;
            padding: 45px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 450px;
            z-index: 2;
        }

        .login-card h2 {
            font-size: 1.8rem;
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .login-card .subtitle {
            font-size: 0.95rem;
            color: #64748b;
            margin-bottom: 30px;
        }

        /* Estilos de los campos del formulario */
        .input-group {
            margin-bottom: 22px;
            position: relative;
        }

        .input-group label {
            display: block;
            font-size: 0.85rem;
            font-weight: 500;
            color: #334155;
            margin-bottom: 8px;
        }

        .input-group input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 0.95rem;
            color: #0f172a;
            transition: all 0.3s ease;
            outline: none;
        }

        .input-group input:focus {
            border-color: #1e3a8a;
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.1);
        }

        /* Icono para ocultar/mostrar contraseña (estático por ahora) */
        .password-toggle {
            position: absolute;
            right: 14px;
            top: 38px;
            cursor: pointer;
            color: #94a3b8;
        }

        /* Enlace de recuperación */
        .forgot-password {
            display: block;
            text-align: center;
            font-size: 0.85rem;
            color: #2563eb;
            text-decoration: none;
            margin-bottom: 25px;
            transition: color 0.2s;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        /* Botón de ingreso verde esmeralda */
        .btn-submit {
            width: 100%;
            padding: 14px;
            background-color: #2b8a78; /* Color verde de la propuesta */
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.1s;
        }

        .btn-submit:hover {
            background-color: #216b5d;
        }

        .btn-submit:active {
            transform: scale(0.98);
        }

        /* Caja inferior de registro */
        .register-box {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
            text-align: center;
            font-size: 0.9rem;
            color: #475569;
        }

        .register-box a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
        }

        .register-box a:hover {
            text-decoration: underline;
        }

        /* --- RESPONSIVIDAD (TABLETS Y CELULARES) --- */
        @media (max-width: 900px) {
            .brand-panel {
                display: none; /* Escondemos el panel izquierdo en pantallas pequeñas para priorizar el login */
            }
            body {
                background-color: #ffffff;
            }
            .form-panel {
                background-image: none;
                background: #ffffff;
            }
            .form-panel::before {
                display: none;
            }
            .login-card {
                box-shadow: none;
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="login-container">
        
        <!-- PANEL IZQUIERDO: Branding e Identidad -->
        <div class="brand-panel">
            <div class="brand-content">
                <!-- Icono representativo de Comercio/Conexión -->
                <div class="brand-logo">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm1 14.5a1 1 0 0 1-2 0V13a1 1 0 0 1 2 0zm0-5.5a1 1 0 1 1 1-1 1 1 0 0 1-1 1z" opacity=".2"/>
                        <path d="M17.5 10H16V7a4 4 0 0 0-8 0v3H6.5A1.5 1.5 0 0 0 5 11.5v9A1.5 1.5 0 0 0 6.5 22h11a1.5 1.5 0 0 0 1.5-1.5v-9a1.5 1.5 0 0 0-1.5-1.5zM10 7a2 2 0 0 1 4 0v3h-4zm6.5 13.5h-11v-9h11z"/>
                    </svg>
                </div>
                <h1>TuTienda<span>Web</span></h1>
                <p>El punto de encuentro ideal donde compradores y vendedores conectan de manera simple y segura.</p>
            </div>
        </div>

        <!-- PANEL DERECHO: Formulario Unificado -->
        <div class="form-panel">
            <div class="login-card">
                <h2>¡Bienvenido de nuevo!</h2>
                <p class="subtitle">Ingresa tus credenciales para acceder a la plataforma.</p>

                <!-- Conservamos exactamente tu lógica de backend -->
                <form action="../controllers/UsuarioController.php?action=login" method="POST">
                    
                    <div class="input-group">
                        <label for="correo">Correo Electrónico</label>
                        <input type="email" id="correo" name="correo" placeholder="ejemplo@correo.com" required>
                    </div>

                    <div class="input-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" placeholder="••••••••" required>
                        <!-- Icono de ojo simulado (SVG) para la contraseña -->
                        <span class="password-toggle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </span>
                    </div>

                    <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>

                    <button type="submit" class="btn-submit">Ingresar</button>
                </form>

                <div class="register-box">
                    <p>¿Aún no tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
                </div>
            </div>
        </div>

    </div>

</body>
</html>