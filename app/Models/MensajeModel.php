<?php

namespace App\Models;

use CodeIgniter\Model;

class MensajeModel extends Model
{
    protected $table = 'Mensaje';
    protected $primaryKey = 'IDMensaje';
    protected $allowedFields = ['Remitente', 'Destinatario', 'Asunto', 'Contenido', 'FechaHoraEnvio', 'Leido'];
    protected $useTimestamps = false; // Desactivamos el uso de los timestamps de creación y actualización

    // Otras configuraciones, como validaciones, relaciones, etc., pueden añadirse aquí si es necesario
}
