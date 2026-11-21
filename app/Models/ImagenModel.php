<?php

namespace App\Models;

use CodeIgniter\Model;

class ImagenModel extends Model
{
    protected $table = 'imagenes';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $allowedFields = [
        'usuario_id',
        'nombre_original',
        'nombre_archivo',
        'tipo_mime',
        'tamano',
        'categoria'
    ];

    protected $useTimestamps = false;
}
