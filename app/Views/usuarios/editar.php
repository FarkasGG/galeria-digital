
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario | Galería Digital</title>

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
            padding: 30px 20px;
        }

        .contenedor {
            max-width: 850px;
            margin: auto;
        }

        .encabezado {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 35px;
        }

        .marca {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo {
            width: 42px;
            height: 42px;
            background: #7c5cfc;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: bold;
        }

        .marca h2 {
            font-size: 19px;
        }

        .navegacion {
            display: flex;
            gap: 10px;
        }

        .navegacion a {
            text-decoration: none;
            padding: 10px 14px;
            border-radius: 9px;
            font-size: 13px;
            transition: 0.2s;
        }

        .btn-panel {
            background: #29213f;
            color: #c4b5fd;
            border: 1px solid #49366c;
        }

        .btn-galeria {
            background: #20232d;
            color: #f4f4f5;
            border: 1px solid #343844;
        }

        .navegacion a:hover {
            filter: brightness(1.2);
        }

        .bienvenida {
            margin-bottom: 25px;
        }

        .bienvenida h1 {
            font-size: 29px;
            margin-bottom: 10px;
        }

        .bienvenida p {
            color: #a1a1aa;
            line-height: 1.5;
        }

        .panel-formulario {
            background: #171a22;
            border: 1px solid #292d38;
            border-radius: 15px;
            padding: 30px;
        }

        .titulo-formulario {
            margin-bottom: 25px;
        }

        .titulo-formulario h2 {
            font-size: 19px;
            margin-bottom: 8px;
        }

        .titulo-formulario p {
            color: #a1a1aa;
            font-size: 13px;
        }

        .campo {
            margin-bottom: 22px;
        }

        .campo label {
            display: block;
            margin-bottom: 9px;
            font-size: 13px;
            color: #d4d4d8;
        }

        .campo input,
        .campo select {
            width: 100%;
            padding: 13px;
            background: #101219;
            border: 1px solid #343844;
            border-radius: 9px;
            color: #f4f4f5;
            font-size: 14px;
        }

        .campo input:focus,
        .campo select:focus {
            outline: 2px solid #7c5cfc;
            border-color: transparent;
        }

        .campo select option {
            background: #171a22;
            color: white;
        }

        .campo small {
            display: block;
            color: #a1a1aa;
            font-size: 12px;
            margin-top: 7px;
        }

        .password-contenedor {
            position: relative;
        }

        .password-contenedor input {
            padding-right: 90px;
        }

        .btn-mostrar {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            color: #a78bfa;
            border: none;
            cursor: pointer;
            font-size: 12px;
            padding: 7px;
        }

        .nota-contrasena {
            background: #20232d;
            border: 1px solid #343844;
            border-radius: 9px;
            padding: 13px;
            margin-bottom: 22px;
            color: #a1a1aa;
            font-size: 12px;
            line-height: 1.5;
        }

        .acciones {
            display: flex;
            gap: 12px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .btn-guardar,
        .btn-cancelar {
            padding: 12px 20px;
            border-radius: 9px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            border: none;
            text-align: center;
            transition: 0.2s;
        }

        .btn-guardar {
            background: #7c5cfc;
            color: white;
        }

        .btn-guardar:hover {
            background: #6845e8;
        }

        .btn-cancelar {
            background: #292d38;
            border: 1px solid #343844;
            color: #d4d4d8;
        }

        .btn-cancelar:hover {
            background: #393e4b;
        }

        .nota {
            border-top: 1px solid #292d38;
            margin-top: 25px;
            padding-top: 18px;
            color: #71717a;
            font-size: 12px;
            line-height: 1.5;
        }

        @media (max-width: 600px) {
            body {
                padding: 20px 14px;
            }

            .encabezado {
                align-items: flex-start;
                flex-direction: column;
            }

            .navegacion {
                width: 100%;
            }

            .navegacion a {
                flex: 1;
                text-align: center;
            }

            .bienvenida h1 {
                font-size: 25px;
            }

            .panel-formulario {
                padding: 20px;
            }

            .acciones {
                flex-direction: column;
            }

            .btn-guardar,
            .btn-cancelar {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="contenedor">

    <header class="encabezado">

        <div class="marca">
            <div class="logo">G</div>
            <h2>Galería Digital</h2>
        </div>

        <nav class="navegacion">
            <a href="<?= site_url('usuarios') ?>" class="btn-panel">
                Panel de usuarios
            </a>

            <a href="<?= site_url('imagenes') ?>" class="btn-galeria">
                Galería
            </a>
        </nav>

    </header>

    <section class="bienvenida">
        <h1>Editar perfil</h1>
        <p>
            Actualiza la información y los permisos del usuario seleccionado.
        </p>
    </section>

    <section class="panel-formulario">

        <div class="titulo-formulario">
            <h2>Información del usuario</h2>
            <p>
                Modifica los datos correspondientes a este perfil.
            </p>
        </div>

        <form
            action="<?= site_url('usuarios/actualizar/' . $usuario['id']) ?>"
            method="post"
        >

            <?= csrf_field() ?>

            <div class="campo">
                <label for="nombre">Nombre completo</label>

                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    value="<?= esc($usuario['nombre']) ?>"
                    maxlength="100"
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
                    value="<?= esc($usuario['correo']) ?>"
                    maxlength="150"
                    autocomplete="email"
                    required
                >
            </div>

            <div class="campo">
                <label for="password">Nueva contraseña</label>

                <div class="password-contenedor">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Dejar vacío para conservar la actual"
                        autocomplete="new-password"
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
            </div>

            <div class="nota-contrasena">
                Si no deseas cambiar la contraseña, deja este campo vacío.
                La contraseña actual se conservará.
            </div>

            <div class="campo">
                <label for="rol">Tipo de usuario</label>

                <select id="rol" name="rol" required>

                    <option
                        value="usuario"
                        <?= $usuario['rol'] === 'usuario' ? 'selected' : '' ?>
                    >
                        Usuario
                    </option>

                    <option
                        value="administrador"
                        <?= $usuario['rol'] === 'administrador' ? 'selected' : '' ?>
                    >
                        Administrador
                    </option>

                </select>

                <small>
                    El rol determina los permisos y las secciones disponibles.
                </small>
            </div>

            <div class="acciones">

                <button type="submit" class="btn-guardar">
                    Guardar cambios
                </button>

                <a href="<?= site_url('usuarios') ?>" class="btn-cancelar">
                    Cancelar
                </a>

            </div>

        </form>

        <div class="nota">
            Los cambios se aplicarán al perfil seleccionado.
        </div>

    </section>

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
