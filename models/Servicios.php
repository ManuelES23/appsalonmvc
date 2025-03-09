<?php

namespace Model;

use Model\ActiveRecord;

class Servicios extends ActiveRecord
{
    //* Base de datos
    protected static $tabla = 'servicios';
    protected static $columnasDB = ['id', 'nombre', 'precio'];

    public $id;
    public $nombre;
    public $precio;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->precio = $args['precio'] ?? 'null';
    }

    public function validar()
    {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre del servicio es obligatorio';
        }
        if (!$this->precio) {
            self::$alertas['error'][] = 'El Precio del servicio es obligatorio';
        }
        if (!is_numeric($this->precio)) {
            self::$alertas['error'][] = 'No es un formato válido de precio';
        }

        return self::$alertas;
    }
}