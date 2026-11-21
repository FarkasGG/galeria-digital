<?php

namespace App\Controllers;

use App\Models\ImagenModel;

class Imagen extends BaseController
{
    // Mostrar galería
    public function index()
    {
        $modelo = new ImagenModel();

        if (session()->get('rol') === 'administrador') {
            $imagenes = $modelo
                ->orderBy('created_at', 'DESC')
                ->findAll();
        } else {
            $imagenes = $modelo
                ->where('usuario_id', session()->get('id'))
                ->orderBy('created_at', 'DESC')
                ->findAll();
        }

        return view('imagenes/index', [
            'imagenes' => $imagenes
        ]);
    }

    // Subir imagen
    public function subir()
    {
        $archivo = $this->request->getFile('imagen');

        if (!$archivo || !$archivo->isValid()) {
            return redirect()->back()
                ->with('error', 'Selecciona una imagen válida.');
        }

        $mime = $archivo->getMimeType();

        $formatosPermitidos = [
            'image/jpeg' => 'jpg',
            'image/png'  => 'png',
            'image/gif'  => 'gif',
            'image/webp' => 'webp'
        ];

        if (!isset($formatosPermitidos[$mime])) {
            return redirect()->back()
                ->with('error', 'Formato de imagen no permitido.');
        }

        if ($archivo->getSize() > 5 * 1024 * 1024) {
            return redirect()->back()
                ->with('error', 'La imagen supera los 5 MB.');
        }

        $carpeta = WRITEPATH . 'uploads/imagenes/';

        if (!is_dir($carpeta)) {
            mkdir($carpeta, 0755, true);
        }

        $nombreArchivo = $archivo->getRandomName();
        $nombreOriginal = $archivo->getClientName();
        $tamano = $archivo->getSize();

        $archivo->move($carpeta, $nombreArchivo);

        $modelo = new ImagenModel();

        $modelo->insert([
            'usuario_id' => session()->get('id'),
            'nombre_original' => $nombreOriginal,
            'nombre_archivo' => $nombreArchivo,
            'tipo_mime' => $mime,
            'tamano' => $tamano,
            'categoria' => $this->request->getPost('categoria')
        ]);

        return redirect()->to(base_url('imagenes'))
            ->with('mensaje', 'Imagen subida correctamente.');
    }


    // Mostrar imagen almacenada
    public function ver($id)
    {
        $modelo = new ImagenModel();

        $consulta = $modelo->where('id', $id);

        if (session()->get('rol') !== 'administrador') {
            $consulta->where('usuario_id', session()->get('id'));
        }

        $imagen = $consulta->first();

        if (!$imagen) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $ruta = WRITEPATH . 'uploads/imagenes/' . $imagen['nombre_archivo'];

        if (!is_file($ruta)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $contenido = file_get_contents($ruta);

        if ($contenido === false) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Eliminar caracteres adicionales antes de la imagen
        $contenido = ltrim($contenido, "\x00\x09\x0A\x0B\x0D\x20");

        // Limpiar el búfer de salida
        while (ob_get_level() > 0) {
            ob_end_clean();
        }

        return $this->response
            ->setHeader('Content-Type', $imagen['tipo_mime'])
            ->setHeader('Content-Length', (string) strlen($contenido))
            ->setBody($contenido);
    }


    // Eliminar imagen
    public function eliminar($id)
    {
        $modelo = new ImagenModel();

        $consulta = $modelo->where('id', $id);

        if (session()->get('rol') !== 'administrador') {
            $consulta->where('usuario_id', session()->get('id'));
        }

        $imagen = $consulta->first();

        if (!$imagen) {
            return redirect()->to(site_url('imagenes'));
        }

        $ruta = WRITEPATH . 'uploads/imagenes/' . $imagen['nombre_archivo'];

        if (is_file($ruta)) {
            unlink($ruta);
        }

        $modelo->delete($id);

        return redirect()->to(site_url('imagenes'))
            ->with('mensaje', 'Imagen eliminada correctamente.');
    }
}
