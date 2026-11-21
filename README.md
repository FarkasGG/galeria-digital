# Galería Digital

Aplicación web desarrollada como proyecto académico de Desarrollo de Sistemas Web. Permite administrar colecciones de imágenes mediante cuentas de usuario, roles y herramientas de administración.

## Tecnologías utilizadas

- PHP 8.3
- CodeIgniter 4
- MariaDB
- HTML, CSS y JavaScript
- Bootstrap
- Composer

## Proyecto publicado

**Sitio web:** https://galeria-erick2026.alwaysdata.net/

El proyecto se encuentra desplegado en alwaysdata y utiliza una base de datos MariaDB.

## Ejecutar el proyecto localmente

Para recuperar el entorno de desarrollo:

1. Instalar y ejecutar XAMPP.
2. Iniciar Apache y MySQL desde el panel de XAMPP.
3. Colocar la carpeta del proyecto dentro de `C:\xampp\htdocs\`.
4. Abrir una terminal en la carpeta del proyecto.
5. Instalar las dependencias:

```bash
composer install
```

6. Crear el archivo `.env` a partir de la plantilla `env`:

```powershell
Copy-Item env .env
```

7. Configurar en `.env` el entorno de desarrollo y las credenciales de la base de datos local.
8. Crear la base de datos `panel_usuarios_mvc` en phpMyAdmin e importar el respaldo SQL correspondiente.
9. Abrir el proyecto en el navegador:

```text
http://localhost/mi_proyecto_ci/public/
```

También puede ejecutarse mediante el servidor integrado de CodeIgniter:

```bash
php spark serve
```

En ese caso, acceder a:

```text
http://localhost:8080
```

## Consideraciones

- No compartir ni subir archivos `.env` al repositorio.
- Las imágenes se almacenan en `writable/uploads/imagenes/`.
- Las sesiones, registros y archivos temporales se mantienen dentro de `writable/`.
- `vendor/` se reconstruye mediante `composer install`.
- Para trabajar localmente, utilizar una base de datos independiente de la producción.

