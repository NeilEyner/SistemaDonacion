<?php namespace App\Models\Donante;

use CodeIgniter\Model;

class AlimentoModel extends Model
{
    protected $table = 'Alimento';
    protected $primaryKey = 'IDAlimento';
    protected $allowedFields = ['IDDonacion', 'Nombre', 'Tipo', 'Cantidad', 'FechaVencimiento', 'Detalles', 'TemperaturaAlmacenamiento', 'EstadoCalidad'];

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    // Aquí puedes definir validaciones, relaciones, etc.
}
