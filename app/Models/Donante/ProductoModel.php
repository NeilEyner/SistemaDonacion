<?php namespace App\Models\Donante;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table = 'Producto';
    protected $primaryKey = 'IDProductoDonado';
    protected $allowedFields = ['IDDonacion', 'Nombre', 'Marca', 'Cantidad', 'Descripcion'];

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    // Aquí puedes definir validaciones, relaciones, etc.
}
