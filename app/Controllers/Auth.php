<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Auth extends BaseController
{
    // Mostrar formulario de inicio de sesión
    public function login()
    {
        // Diagnóstico temporal
        if (headers_sent($archivo, $linea)) {
            log_message('error', 'DIAGNOSTICO: contenido enviado desde {archivo}, linea {linea}', [
                'archivo' => $archivo,
                'linea'   => $linea,
            ]);
        } else {
            log_message('error', 'DIAGNOSTICO: todavia no se han enviado encabezados');
        }

        if (session()->get('logueado')) {
            $ruta = session()->get('rol') === 'administrador'
                ? '/usuarios'
                : '/imagenes';

            return redirect()->to($ruta);
        }

        return view('auth/login');
    }

    // Mostrar formulario de registro
    public function registro()
    {
        if (session()->get('logueado')) {
            $ruta = session()->get('rol') === 'administrador'
                ? '/usuarios'
                : '/imagenes';

            return redirect()->to($ruta);
        }

        return view('auth/registro');
    }

    // Registrar una nueva cuenta
    public function registrar()
    {
        $nombre = trim((string) $this->request->getPost('nombre'));
        $correo = trim((string) $this->request->getPost('correo'));
        $password = (string) $this->request->getPost('password');

        $validacion = [
            'nombre' => $nombre,
            'correo' => $correo,
            'password' => $password
        ];

        $reglas = [
            'nombre' => 'required|max_length[100]',
            'correo' => 'required|valid_email|max_length[150]',
            'password' => 'required|min_length[8]'
        ];

        if (!$this->validateData($validacion, $reglas)) {
            return redirect()->back()
                ->withInput()
                ->with('errores', $this->validator->getErrors());
        }

        $modelo = new UsuarioModel();

        if ($modelo->where('correo', $correo)->first()) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Este correo electrónico ya está registrado.');
        }

        $modelo->insert([
            'nombre' => $nombre,
            'correo' => $correo,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'rol' => 'usuario'
        ]);

        return redirect()->to(site_url('login'))
            ->with('mensaje', 'Tu cuenta se creó correctamente. Ya puedes iniciar sesión.');
    }

    // Validar inicio de sesión
    public function autenticar()
    {
        $correo = $this->request->getPost('correo');
        $password = $this->request->getPost('password');

        $modelo = new UsuarioModel();
        $usuario = $modelo->where('correo', $correo)->first();

        if ($usuario && password_verify($password, $usuario['password'])) {
            session()->regenerate();

            session()->set([
                'id' => $usuario['id'],
                'nombre' => $usuario['nombre'],
                'correo' => $usuario['correo'],
                'rol' => $usuario['rol'],
                'logueado' => true
            ]);

            $ruta = ($usuario['rol'] === 'administrador')
                ? '/usuarios'
                : '/imagenes';

            $respuesta = redirect()->to($ruta);

            if ($this->request->getPost('recordarme') === '1') {
                $respuesta->setCookie(
                    'recordar_correo',
                    $correo,
                    60 * 60 * 24 * 30,
                    '',
                    '/',
                    '',
                    false,
                    true,
                    'Lax'
                );
            } else {
                $respuesta->deleteCookie('recordar_correo');
            }

            return $respuesta;
        }

        return redirect()->back()
            ->withInput()
            ->with('error', 'Correo o contraseña incorrectos.');
    }

    // Cerrar sesión
    public function logout()
    {
        session()->destroy();

        $respuesta = redirect()->to(site_url('login'));
        $respuesta->deleteCookie('recordar_correo');

        return $respuesta;
    }
}
