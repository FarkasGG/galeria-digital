
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de usuarios</title>

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
            max-width: 1200px;
            margin: auto;
        }

        .encabezado {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
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

        .acciones-encabezado {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .btn-galeria,
        .cerrar-sesion {
            text-decoration: none;
            padding: 11px 17px;
            border-radius: 9px;
            font-size: 14px;
            transition: 0.2s;
        }

        .btn-galeria {
            background: #7c5cfc;
            color: white;
        }

        .btn-galeria:hover {
            background: #6845e8;
        }

        .cerrar-sesion {
            background: #20232d;
            border: 1px solid #343844;
            color: #f4f4f5;
        }

        .cerrar-sesion:hover {
            background: #303440;
        }

        .bienvenida {
            margin-bottom: 30px;
        }

        .bienvenida h1 {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .bienvenida p {
            color: #a1a1aa;
            line-height: 1.5;
        }

        .resumen {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            background: #171a22;
            border: 1px solid #292d38;
            border-radius: 13px;
            padding: 22px;
            margin-bottom: 25px;
        }

        .resumen h3 {
            font-size: 15px;
            color: #a1a1aa;
            font-weight: normal;
            margin-bottom: 8px;
        }

        .cantidad {
            font-size: 30px;
            font-weight: bold;
        }

        .icono-usuarios {
            width: 50px;
            height: 50px;
            background: #29213f;
            color: #c4b5fd;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .acciones {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 25px;
        }

        .btn-crear {
            background: #7c5cfc;
            color: white;
            padding: 12px 18px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-crear:hover {
            background: #6845e8;
        }

        .seccion-tabla {
            background: #171a22;
            border: 1px solid #292d38;
            border-radius: 13px;
            padding: 22px;
        }

        .titulo-tabla {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .titulo-tabla h2 {
            font-size: 19px;
        }

        .etiqueta {
            background: #29213f;
            border: 1px solid #39314f;
            color: #c4b5fd;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
        }

        .tabla-contenedor {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th {
            text-align: left;
            color: #a1a1aa;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 15px 12px;
            border-bottom: 1px solid #343844;
        }

        td {
            padding: 17px 12px;
            border-bottom: 1px solid #292d38;
            font-size: 14px;
            color: #e4e4e7;
        }

        tbody tr:hover {
            background: #20232d;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .id-usuario {
            color: #a1a1aa;
        }

        .rol {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .rol-admin {
            background: #29213f;
            color: #c4b5fd;
            border: 1px solid #49366c;
        }

        .rol-usuario {
            background: #163327;
            color: #86efac;
            border: 1px solid #285c40;
        }

        .acciones-tabla {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-editar,
        .btn-eliminar {
            border: none;
            border-radius: 7px;
            padding: 8px 12px;
            font-size: 12px;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-editar {
            background: #29213f;
            color: #c4b5fd;
            border: 1px solid #49366c;
        }

        .btn-editar:hover {
            background: #3b2d5d;
        }

        .btn-eliminar {
            background: #382027;
            color: #fda4af;
            border: 1px solid #66303c;
        }

        .btn-eliminar:hover {
            background: #512630;
        }

        .sin-usuarios {
            text-align: center;
            padding: 40px 15px;
            color: #a1a1aa;
        }

        @media (max-width: 650px) {
            body {
                padding: 20px 14px;
            }

            .encabezado {
                align-items: flex-start;
            }

            .acciones-encabezado {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-galeria,
            .cerrar-sesion {
                text-align: center;
                white-space: nowrap;
                padding: 9px 11px;
                font-size: 12px;
            }

            .marca h2 {
                font-size: 16px;
            }

            .bienvenida h1 {
                font-size: 25px;
            }

            .seccion-tabla {
                padding: 15px;
            }

            .resumen {
                padding: 18px;
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

        <div class="acciones-encabezado">

            <a href="<?= site_url('imagenes') ?>" class="btn-galeria">
                Administrar imágenes
            </a>

            <a href="<?= site_url('logout') ?>" class="cerrar-sesion">
                Cerrar sesión
            </a>

        </div>

    </header>

    <section class="bienvenida">
        <h1>Administración de perfiles</h1>
        <p>
            Gestiona los usuarios registrados y administra sus permisos dentro del sistema.
        </p>
    </section>

    <section class="resumen">

        <div>
            <h3>Usuarios registrados</h3>
            <div class="cantidad"><?= count($usuarios) ?></div>
        </div>

        <div class="icono-usuarios">♙</div>

    </section>

    <div class="acciones">

        <a href="<?= site_url('usuarios/crear') ?>" class="btn-crear">
            + Crear nuevo usuario
        </a>

    </div>

    <section class="seccion-tabla">

        <div class="titulo-tabla">
            <h2>Usuarios del sistema</h2>

            <span class="etiqueta">
                <?= count($usuarios) ?> perfiles
            </span>
        </div>

        <div class="tabla-contenedor">

            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo electrónico</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if (!empty($usuarios)): ?>

                        <?php foreach ($usuarios as $usuario): ?>

                            <tr>

                                <td class="id-usuario">
                                    #<?= esc($usuario['id']) ?>
                                </td>

                                <td>
                                    <?= esc($usuario['nombre']) ?>
                                </td>

                                <td>
                                    <?= esc($usuario['correo']) ?>
                                </td>

                                <td>
                                    <?php
                                        $rol = $usuario['rol'] ?? 'usuario';
                                    ?>

                                    <?php if ($rol === 'administrador'): ?>
                                        <span class="rol rol-admin">
                                            Administrador
                                        </span>
                                    <?php else: ?>
                                        <span class="rol rol-usuario">
                                            Usuario
                                        </span>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <div class="acciones-tabla">

                                        <a
                                            href="<?= site_url('usuarios/editar/' . $usuario['id']) ?>"
                                            class="btn-editar">
                                            Editar
                                        </a>

                                        <form
                                            action="<?= site_url('usuarios/eliminar/' . $usuario['id']) ?>"
                                            method="post"
                                            onsubmit="return confirm('¿Deseas eliminar este usuario?');">

                                            <?= csrf_field() ?>

                                            <button
                                                type="submit"
                                                class="btn-eliminar">
                                                Eliminar
                                            </button>

                                        </form>

                                    </div>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="5" class="sin-usuarios">
                                No hay usuarios registrados.
                            </td>
                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </section>

</div>

</body>
</html>
