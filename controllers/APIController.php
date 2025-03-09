<?php

namespace Controllers;

use Model\Cita;
use Model\CitaServicio;
use Model\Servicios;

class APIcontroller
{
    public static function index()
    {
        $servicios = Servicios::all();

        echo json_encode($servicios);
    }

    public static function guardar()
    {
        // Guarda la cita y devuelve el id
        $cita = new Cita($_POST);
        $resultado = $cita->guardar();
        $id = $resultado['id'];

        // Guarda la cita y servicio
        $idServicios = explode(',', $_POST['servicios']);
        foreach ($idServicios as $idServicio) {
            $args = [
                'citaId' => $id,
                'servicioId' => $idServicio
            ];
            $citaServicio = new CitaServicio($args);
            $citaServicio->guardar();
        }

        echo json_encode(['resultado' => $resultado]);
    }

    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];

            $cita = Cita::find($id);

            $cita->eliminar();

            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }
}
