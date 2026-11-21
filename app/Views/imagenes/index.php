
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de imágenes</title>

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

        .cerrar-sesion {
            text-decoration: none;
            color: #f4f4f5;
            background: #20232d;
            border: 1px solid #343844;
            padding: 11px 17px;
            border-radius: 9px;
            font-size: 14px;
            transition: 0.2s;
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

        .panel-subida {
            background: #171a22;
            border: 1px solid #292d38;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 40px;
        }

        .panel-subida h2 {
            font-size: 19px;
            margin-bottom: 8px;
        }

        .descripcion {
            color: #a1a1aa;
            font-size: 14px;
            margin-bottom: 22px;
        }

        .formulario {
            display: grid;
            grid-template-columns: 1fr 1fr auto;
            gap: 15px;
            align-items: end;
        }

        .campo {
            display: flex;
            flex-direction: column;
            gap: 9px;
        }

        .campo label {
            font-size: 13px;
            color: #d4d4d8;
        }

        input[type="file"],
        input[type="text"] {
            width: 100%;
            padding: 12px;
            background: #101219;
            border: 1px solid #343844;
            border-radius: 9px;
            color: #e4e4e7;
            font-size: 13px;
        }

        input[type="file"]::file-selector-button {
            background: #292d38;
            border: none;
            color: white;
            padding: 7px 10px;
            border-radius: 6px;
            margin-right: 10px;
            cursor: pointer;
        }

        input:focus {
            outline: 2px solid #7c5cfc;
            border-color: transparent;
        }

        button {
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-subir {
            background: #7c5cfc;
            color: white;
            padding: 13px 20px;
            border-radius: 9px;
            font-size: 14px;
            white-space: nowrap;
        }

        .btn-subir:hover {
            background: #6845e8;
        }

        .vista-previa {
            display: none;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #292d38;
        }

        .vista-previa p {
            color: #a1a1aa;
            font-size: 13px;
            margin-bottom: 10px;
        }

        .vista-previa img {
            max-width: 220px;
            max-height: 180px;
            object-fit: contain;
            border-radius: 9px;
            border: 1px solid #343844;
        }

        .mensaje {
            padding: 14px 17px;
            border-radius: 9px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .exito {
            background: #123323;
            border: 1px solid #246b43;
            color: #86efac;
        }

        .error {
            background: #3a1b20;
            border: 1px solid #7f303b;
            color: #fca5a5;
        }

        .seccion-galeria {
            margin-bottom: 20px;
        }

        .titulo-galeria {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .titulo-galeria h2 {
            font-size: 21px;
        }

        .contador {
            background: #20232d;
            color: #c4b5fd;
            border: 1px solid #39314f;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
        }

        .galeria {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
            gap: 20px;
        }

        .tarjeta {
            background: #171a22;
            border: 1px solid #292d38;
            border-radius: 13px;
            padding: 12px;
            overflow: hidden;
            transition: transform 0.2s, border-color 0.2s;
        }

        .tarjeta:hover {
            transform: translateY(-4px);
            border-color: #6550bd;
        }

        .imagen-contenedor {
            width: 100%;
            height: 190px;
            background: #101219;
            border-radius: 9px;
            overflow: hidden;
            margin-bottom: 15px;
        }

        .imagen-contenedor img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .informacion h3 {
            font-size: 14px;
            overflow-wrap: anywhere;
            margin-bottom: 8px;
        }

        .informacion p {
            color: #a1a1aa;
            font-size: 12px;
            margin-bottom: 15px;
        }

        .btn-eliminar {
            width: 100%;
            padding: 10px;
            background: #382027;
            border: 1px solid #66303c;
            color: #fda4af;
            border-radius: 8px;
            font-size: 13px;
        }

        .btn-eliminar:hover {
            background: #512630;
        }

        .vacio {
            background: #171a22;
            border: 1px dashed #343844;
            border-radius: 13px;
            padding: 55px 20px;
            text-align: center;
        }

        .vacio h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .vacio p {
            color: #a1a1aa;
            font-size: 14px;
        }

        @media (max-width: 750px) {
            .formulario {
                grid-template-columns: 1fr;
            }

            .btn-subir {
                width: 100%;
            }

            .bienvenida h1 {
                font-size: 25px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 20px 14px;
            }

            .encabezado {
                align-items: flex-start;
            }

            .marca h2 {
                font-size: 16px;
            }

            .cerrar-sesion {
                padding: 9px 11px;
                font-size: 12px;
            }

            .panel-subida {
                padding: 18px;
            }

            .galeria {
                grid-template-columns: 1fr;
            }

            .acciones-encabezado {
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .administrar-perfiles {
                text-decoration: none;
                color: white;
                background: #7c5cfc;
                padding: 11px 17px;
                border-radius: 9px;
                font-size: 14px;
                transition: 0.2s;
            }

            .administrar-perfiles:hover {
                background: #6845e8;
            }

            @media (max-width: 550px) {
                .acciones-encabezado {
                    flex-direction: column;
                    align-items: stretch;
                }

                .administrar-perfiles,
                .cerrar-sesion {
                    text-align: center;
                    white-space: nowrap;
                }
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

                <?php if (session()->get('rol') === 'administrador'): ?>
                    <a href="<?= site_url('usuarios') ?>" class="administrar-perfiles">
                        <span>♙</span> Administrar perfiles
                    </a>
                <?php endif; ?>

                <a href="<?= site_url('logout') ?>" class="cerrar-sesion">
                    Cerrar sesión
                </a>

            </div>
        </header>

    <section class="bienvenida">
        <?php if (session()->get('rol') === 'administrador'): ?>
            <h1>Galería de imágenes</h1>
            <p>
                Bienvenido, <?= esc(session()->get('nombre')) ?>.
                Estás consultando las imágenes de todos los usuarios.
            </p>
        <?php else: ?>
            <h1>Mi espacio creativo</h1>
            <p>
                Bienvenido, <?= esc(session()->get('nombre')) ?>.
                Administra y organiza tus fotografías desde un solo lugar.
            </p>
        <?php endif; ?>
    </section>

    <?php if (session()->getFlashdata('mensaje')): ?>
        <div class="mensaje exito">
            <?= esc(session()->getFlashdata('mensaje')) ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="mensaje error">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <section class="panel-subida">
        <h2>Agregar una imagen</h2>
        <p class="descripcion">
            Selecciona una fotografía y asígnale una categoría para organizarla.
        </p>

        <form
            action="<?= site_url('imagenes/subir') ?>"
            method="POST"
            enctype="multipart/form-data"
        >
            <?= csrf_field() ?>

            <div class="formulario">
                <div class="campo">
                    <label for="imagen">Seleccionar fotografía</label>
                    <input
                        type="file"
                        name="imagen"
                        id="imagen"
                        accept="image/jpeg,image/png,image/gif,image/webp"
                        required
                    >
                </div>

                <div class="campo">
                    <label for="categoria">Categoría</label>
                    <input
                        type="text"
                        name="categoria"
                        id="categoria"
                        placeholder="Ej. Paisajes"
                        maxlength="100"
                    >
                </div>

                <button type="submit" class="btn-subir">
                    Subir imagen
                </button>
            </div>

            <div class="vista-previa" id="vistaPrevia">
                <p>Vista previa de la fotografía seleccionada:</p>
                <img src="" id="imagenPrevia" alt="Vista previa de la imagen">
            </div>
        </form>
    </section>

    <section class="seccion-galeria">
        <div class="titulo-galeria">
            <h2>Imágenes almacenadas</h2>
            <span class="contador">
                <?= count($imagenes) ?> imágenes
            </span>
        </div>

        <?php if (empty($imagenes)): ?>

            <div class="vacio">
                <h3>Tu galería está vacía</h3>
                <p>Selecciona una fotografía para comenzar a crear tu colección.</p>
            </div>

        <?php else: ?>

            <div class="galeria">

                <?php foreach ($imagenes as $imagen): ?>

                    <article class="tarjeta">

                        <div class="imagen-contenedor">
                            <img
                                src="<?= base_url('imagenes/ver/' . $imagen['id']) ?>"
                                alt="<?= esc($imagen['nombre_original']) ?>"
                                loading="lazy"
                            >
                        </div>

                        <div class="informacion">
                            <h3><?= esc($imagen['nombre_original']) ?></h3>

                            <p>
                                Categoría:
                                <?= esc($imagen['categoria'] ?? 'Sin categoría') ?>
                            </p>

                            <form
                                action="<?= site_url('imagenes/eliminar/' . $imagen['id']) ?>"
                                method="POST"
                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta imagen?');"
                            >
                                <?= csrf_field() ?>

                                <button type="submit" class="btn-eliminar">
                                    Eliminar imagen
                                </button>
                            </form>
                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>
    </section>

</div>

<script>
    const campoImagen = document.getElementById('imagen');
    const vistaPrevia = document.getElementById('vistaPrevia');
    const imagenPrevia = document.getElementById('imagenPrevia');

    let urlPrevia = null;

    campoImagen.addEventListener('change', function () {
        const archivo = this.files[0];

        if (urlPrevia) {
            URL.revokeObjectURL(urlPrevia);
            urlPrevia = null;
        }

        if (!archivo) {
            vistaPrevia.style.display = 'none';
            imagenPrevia.src = '';
            return;
        }

        if (!archivo.type.startsWith('image/')) {
            alert('Selecciona un archivo de imagen válido.');
            this.value = '';
            vistaPrevia.style.display = 'none';
            return;
        }

        urlPrevia = URL.createObjectURL(archivo);
        imagenPrevia.src = urlPrevia;
        vistaPrevia.style.display = 'block';
    });
</script>

</body>
</html>
