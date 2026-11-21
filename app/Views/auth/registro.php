
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta | Galería Digital</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #0d0f14;
            color: #f4f4f5;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .contenedor {
            width: 100%;
            max-width: 460px;
        }

        .marca {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 28px;
        }

        .logo {
            width: 58px;
            height: 58px;
            background: #7c5cfc;
            border-radius: 17px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 29px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .marca h1 {
            font-size: 23px;
            margin-bottom: 7px;
        }

        .marca p {
            color: #a1a1aa;
            font-size: 13px;
            text-align: center;
        }

        .panel {
            background: #171a22;
            border: 1px solid #292d38;
            border-radius: 16px;
            padding: 30px;
        }

        .titulo {
            margin-bottom: 25px;
        }

        .titulo h2 {
            font-size: 21px;
            margin-bottom: 8px;
        }

        .titulo p {
            color: #a1a1aa;
            font-size: 13px;
            line-height: 1.5;
        }

        .campo {
            margin-bottom: 20px;
        }

        .campo label {
            display: block;
            color: #d4d4d8;
            font-size: 13px;
            margin-bottom: 9px;
        }

        .campo input {
            width: 100%;
            padding: 13px;
            background: #101219;
            border: 1px solid #343844;
            border-radius: 9px;
            color: #f4f4f5;
            font-size: 14px;
        }

        .campo input:focus {
            outline: 2px solid #7c5cfc;
            border-color: transparent;
        }

        .campo small {
            display: block;
            color: #71717a;
            font-size: 12px;
            margin-top: 7px;
        }

        .password-contenedor {
            position: relative;
        }

        .password-contenedor input {
            padding-right: 85px;
        }

        .btn-mostrar {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            color: #a78bfa;
            cursor: pointer;
            font-size: 12px;
            padding: 7px;
        }

        .mensaje {
            padding: 13px;
            border-radius: 9px;
            margin-bottom: 20px;
            font-size: 13px;
            line-height: 1.5;
        }

        .error {
            background: #3a1b20;
            border: 1px solid #7f303b;
            color: #fca5a5;
        }

        .btn-registrar {
            width: 100%;
            padding: 14px;
            margin-top: 8px;
            background: #7c5cfc;
            color: white;
            border: none;
            border-radius: 9px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-registrar:hover {
            background: #6845e8;
        }

        .enlace-login {
            text-align: center;
            margin-top: 23px;
            font-size: 13px;
            color: #a1a1aa;
        }

        .enlace-login a {
            color: #a78bfa;
            text-decoration: none;
            font-weight: bold;
        }

        .enlace-login a:hover {
            text-decoration: underline;
        }

        .pie {
            text-align: center;
            margin-top: 22px;
            color: #71717a;
            font-size: 12px;
        }

        @media (max-width: 480px) {
            .panel {
                padding: 23px 19px;
            }

            .marca h1 {
                font-size: 21px;
            }
        }
    </style>
</head>

<body>

<div class="contenedor">

    <header class="marca">
        <div class="logo">G</div>
        <h1>Galería Digital</h1>
        <p>Crea tu cuenta y comienza a organizar tus imágenes.</p>
    </header>

    <main class="panel">

        <div class="titulo">
            <h2>Crear una cuenta</h2>
            <p>Completa tus datos para registrarte en la plataforma.</p>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="mensaje error">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errores')): ?>
            <div class="mensaje error">
                <strong>Revisa los siguientes campos:</strong>
                <ul style="padding-left: 20px; margin-top: 8px;">
                    <?php foreach (session()->getFlashdata('errores') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('registrar') ?>" method="post">

            <?= csrf_field() ?>

            <div class="campo">
                <label for="nombre">Nombre completo</label>
                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    value="<?= esc(old('nombre') ?? '') ?>"
                    maxlength="100"
                    placeholder="Ej. Juan Pérez"
                    autocomplete="name"
                    required
                >
            </div>

            <div class="campo">
                <label for="correo">Correo electrónico</label>
                <input
                    type="email"
                    id="correo"
                    name="correo"
                    value="<?= esc(old('correo') ?? '') ?>"
                    maxlength="150"
                    placeholder="usuario@correo.com"
                    autocomplete="email"
                    required
                >
            </div>

            <div class="campo">
                <label for="password">Contraseña</label>

                <div class="password-contenedor">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        minlength="8"
                        placeholder="Crea una contraseña"
                        autocomplete="new-password"
                        required
                    >

                    <button
                        type="button"
                        class="btn-mostrar"
                        id="btnMostrar"
                        aria-label="Mostrar contraseña"
                        aria-pressed="false"
                    >
                        Mostrar
                    </button>
                </div>

                <small>
                    La contraseña debe tener al menos 8 caracteres.
                </small>
            </div>

            <button type="submit" class="btn-registrar">
                Crear cuenta
            </button>

        </form>

        <div class="enlace-login">
            ¿Ya tienes una cuenta?
            <a href="<?= site_url('login') ?>">Inicia sesión</a>
        </div>

    </main>

    <footer class="pie">
        Galería Digital · Registro de usuarios
    </footer>

</div>

<script>
    const password = document.getElementById('password');
    const btnMostrar = document.getElementById('btnMostrar');

    btnMostrar.addEventListener('click', function () {

        const mostrar = password.type === 'password';

        password.type = mostrar ? 'text' : 'password';

        btnMostrar.textContent = mostrar ? 'Ocultar' : 'Mostrar';

        btnMostrar.setAttribute(
            'aria-label',
            mostrar ? 'Ocultar contraseña' : 'Mostrar contraseña'
        );

        btnMostrar.setAttribute('aria-pressed', mostrar);
    });
</script>

</body>
</html>
