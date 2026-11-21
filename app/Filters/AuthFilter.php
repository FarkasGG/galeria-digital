<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Comprobar si inició sesión
        if (!session()->get('logueado')) {
            return redirect()->to(site_url('login'));
        }

        // Comprobar el rol cuando la ruta lo requiera
        if (!empty($arguments)) {

            $rolRequerido = $arguments[0];
            $rolUsuario = session()->get('rol');

            if ($rolUsuario !== $rolRequerido) {

                // Redirigir según el rol real del usuario
                if ($rolUsuario === 'administrador') {
                    return redirect()->to(site_url('usuarios'));
                }

                return redirect()->to(site_url('imagenes'));
            }
        }
    }

    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {
        // Sin acciones posteriores
    }
}
