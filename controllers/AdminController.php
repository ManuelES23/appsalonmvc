<?php

namespace Controllers;

use Model\AdminCitas;
use MVC\Router;

class AdminController
{
    public static function index(Router $router)
    {
        isAdmin();

        $fecha = $_GET['fecha'] ?? date('Y-m-d');

        $fechas = explode('-', $fecha);

        if (!checkdate($fechas[1], $fechas[2], $fechas[0])) {
            header('Location: /404');
        };


        //* Consultar la base de datos
        $consulta = "SELECT citas.id,
            citas.hora,
            CONCAT(usuarios.nombre, ' ',usuarios.apellido) AS cliente,
            usuarios.email,
            usuarios.telefono,
            servicios.nombre AS servicio,
            servicios.precio
            FROM citas 
            LEFT JOIN usuarios ON citas.usuarioId = usuarios.id
            LEFT JOIN citas_servicios ON citas_servicios.citaId = citas.id
            LEFT JOIN servicios ON servicios.id = citas_servicios.servicioId
            WHERE fecha = '$fecha'
            ";

        $citas = AdminCitas::SQL($consulta);


        $router->render('admin/index', [
            'nombre' => $_SESSION['nombre'],
            'citas' => $citas,
            'fecha' => $fecha
        ]);
    }
}
