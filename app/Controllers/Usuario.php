<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Usuario extends BaseController
{
    // Mostrar listado de usuarios
    public function index()
    {
        $modelo = new UsuarioModel();

        $data['usuarios'] = $modelo->findAll();

        return view('usuarios/index', $data);
    }

    // Mostrar formulario de creación
    public function crear()
    {
        return view('usuarios/crear');
    }

    // Guardar nuevo usuario
    public function guardar()
    {
        $modelo = new UsuarioModel();

        $datos = [
            'nombre' => trim($this->request->getPost('nombre')),
            'correo' => trim($this->request->getPost('correo')),
            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'rol' => $this->request->getPost('rol')
        ];

        if (!in_array($datos['rol'], ['usuario', 'administrador'])) {
            return redirect()->back()
                ->with('error', 'Rol no válido.');
        }

        if ($modelo->where('correo', $datos['correo'])->first()) {
            return redirect()->back()
                ->with('error', 'El correo ya está registrado.');
        }

        $modelo->insert($datos);

        return redirect()->to('/usuarios');
    }

    // Mostrar formulario de edición
    public function editar($id)
    {
        $modelo = new UsuarioModel();

        $data['usuario'] = $modelo->find($id);

        if (!$data['usuario']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('usuarios/editar', $data);
    }

    // Actualizar usuario
    public function actualizar($id)
    {
        $modelo = new UsuarioModel();

        $usuario = $modelo->find($id);

        if (!$usuario) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $rol = $this->request->getPost('rol');

        if (!in_array($rol, ['usuario', 'administrador'])) {
            return redirect()->back()
                ->with('error', 'Rol no válido.');
        }

        $datos = [
            'nombre' => trim($this->request->getPost('nombre')),
            'correo' => trim($this->request->getPost('correo')),
            'rol' => $rol
        ];

        $password = $this->request->getPost('password');

        if (!empty($password)) {
            $datos['password'] = password_hash(
                $password,
                PASSWORD_DEFAULT
            );
        }

        $correoExistente = $modelo
            ->where('correo', $datos['correo'])
            ->where('id !=', $id)
            ->first();

        if ($correoExistente) {
            return redirect()->back()
                ->with('error', 'El correo ya está registrado.');
        }

        $modelo->update($id, $datos);

        return redirect()->to('/usuarios');
    }

    // Eliminar usuario
    public function eliminar($id)
    {
        $modelo = new UsuarioModel();

        // Evitar eliminar la cuenta que tiene la sesión activa
        if ((int) $id === (int) session()->get('id')) {
            return redirect()->to('/usuarios')
                ->with('error', 'No puedes eliminar tu propia cuenta.');
        }

        $usuario = $modelo->find($id);

        if (!$usuario) {
            return redirect()->to('/usuarios');
        }

        $modelo->delete($id);

        return redirect()->to('/usuarios');
    }
}
