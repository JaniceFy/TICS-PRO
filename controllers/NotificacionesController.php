<?php
class NotificacionesController
{
    public function __construct()
    {
        require_once "models/FormatosModel.php";
        require_once "models/MediosModel.php";
        require_once "models/NotificacionesModel.php";
    }

    // Mostrar el formulario con los datos del formato y medios
    public function mostrarDatosFormato()
    {
        if (isset($_GET['id'])) {
            $formatoId = $_GET['id'];

            // Obtener el formato por ID
            $formatosModel = new FormatosModel();
            $formato = $formatosModel->get_formato_by_id($formatoId);

            if ($formato) {
                // Obtener los medios
                $mediosModel = new MediosModel();
                $medios = $mediosModel->get_medios();

                // Obtener las notificaciones relacionadas con este formato
                $notificacionesModel = new NotificacionesModel();
                $notificaciones = $notificacionesModel->get_notificaciones_by_formato($formatoId);

                // Pasar datos a la vista
                require_once "views/notificaciones/RegistrarNotificacion.php";
            } else {
                echo "Formato no encontrado.";
            }
        } else {
            echo "ID de formato no especificado.";
        }
    }

    // Registrar la notificación
    public function registrar()
    {
        $codigo = $this->generarCodigoUnico();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $formatoId = $_POST['formatoId'];
            $medioId = $_POST['medioId'];
            $mensaje = $_POST['mensaje'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];

            $notificacionesModel = new NotificacionesModel();
            $insertado = $notificacionesModel->insertar($codigo, $formatoId, $medioId, $mensaje, $fecha, $hora);

            if ($insertado) {
                header("Location: index.php?c=NotificacionesController&a=mostrarDatosFormato&id=" . $formatoId);
            } else {
                echo "Error al registrar la notificación.";
            }
        }
    }

    // Generar código único
    private function generarCodigoUnico()
    {
        $fecha = date("YmdHis");
        $random = rand(100, 999);
        return $fecha . $random;
    }


    public function verPerfil()
    {
        if (isset($_GET['id'])) {
            $notificacionId = $_GET['id'];

            // Crear instancias de los modelos
            $notificacionesModel = new NotificacionesModel();
            $mediosModel = new MediosModel();

            // Obtener la notificación y los medios disponibles
            $notificacion = $notificacionesModel->obtenerPorId($notificacionId);
            $medios = $mediosModel->get_medios();

            if ($notificacion) {
                // Pasar los datos a la vista
                require_once "views/notificaciones/PerfilNotificacion.php";
            } else {
                echo "No se encontró la notificación.";
            }
        } else {
            echo "ID de notificación no especificado.";
        }
    }





}
?>