<?php

// En la clase FormatosController.php

class FormatosController
{
    public function __construct()
    {
        require_once "models/FormatosModel.php";
        require_once "models/EquiposModel.php";
        require_once "models/ClientesModel.php";  // Modelo para obtener datos del cliente
        require_once "models/EstadosModel.php";
    }

    public function mostrarFormulario()
    {


        if (isset($_GET['id'])) {
            $equipoId = $_GET['id'];

            // Obtener los datos del equipo desde la base de datos
            $equiposModel = new EquiposModel();
            $equipo = $equiposModel->get_equipo_by_id($equipoId);

            // Verificar si el equipo existe
            if ($equipo) {
                // Obtener los datos del cliente relacionado con el equipo
                $clienteId = $equipo['clienteId']; // Obtener el clienteId del equipo
                $clientesModel = new ClientesModel();
                $cliente = $clientesModel->get_cliente_by_id($clienteId);

                // Verificar si el cliente existe
                if ($cliente) {
                    // Pasar los datos del cliente al formulario
                    $codigoCliente = $cliente['codigo'];
                    $nombreCliente = $cliente['nombre'];
                    $aPaternoCliente = $cliente['aPaterno'];
                    $aMaternoCliente = $cliente['aMaterno'];

                    // Pasar los datos del equipo al formulario
                    $numSerie = $equipo['numSerie'];
                    $tipo = $equipo['tipo'];
                    $marca = $equipo['marca'];
                    $modelo = $equipo['modelo'];
                    $password = $equipo['password'];
                    $accesorios = $equipo['accesorios'];
                    $condicionEstetica = $equipo['condicionEstetica'];
                    $evidenciaFotografica = $equipo['evidenciaFotografica'];  // Aquí gestionamos el BLOB de la imagen si es necesario







                    // Crear una instancia del modelo EstadosModel
                    $estadosModel = new EstadosModel();

                    // Obtener los estados de la base de datos
                    $estados = $estadosModel->get_estados();

                    // Verificar si se obtuvieron los estados
                    if (empty($estados)) {
                        echo "No se encontraron estados en la base de datos.";
                    } else {
                        // Pasar los estados a la vista
                        require_once "views/formatos/RegistrarFormato.php";
                    }




                    // Cargar la vista con los datos del cliente y equipo
                    require_once "views/formatos/RegistrarFormato.php";
                } else {
                    echo "Cliente no encontrado.";
                }
            } else {
                echo "Equipo no encontrado.";
            }
        } else {
            echo "ID de equipo no especificado.";
        }
    }

    public function registrar()
    {


        // Generar el código automáticamente
        $codigo = $this->generarCodigoUnico();




        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recoger los datos del formulario
            $problemaReportado = $_POST['problemaReportado'];
            $servicioARealizar = $_POST['servicioARealizar'];
            $piezasACambiar = $_POST['piezasACambiar'];
            $costoPiezas = $_POST['costoPiezas'];
            $costoServicio = $_POST['costoServicio'];
            $anticipo = $_POST['anticipo'];
            $resto = $_POST['resto'];

            // Obtener el clienteId y equipoId de los campos ocultos o de las variables de sesión
            $clienteId = $_POST['clienteId'];
            $equipoId = $_POST['equipoId'];

            // Obtener el estado seleccionado
            $estadoId = $_POST['estadoId'];



            // Aquí deberías ver el valor de estadoId
            echo "Estado ID: " . $estadoId; // Depuración

            // Crear una instancia del modelo FormatosModel
            $formatosModel = new FormatosModel();

            // Llamar al método insertar en el modelo para agregar el formato a la base de datos
            $insertado = $formatosModel->insertar(
                                    $codigo,

                $problemaReportado,
                $servicioARealizar,
                $piezasACambiar,
                $costoPiezas,
                $costoServicio,
                $anticipo,
                $resto,
                $clienteId,
                $equipoId,
                $estadoId
            );

            // Verificar si la inserción fue exitosa
            if ($insertado) {
                // Redirigir a una página de éxito o mostrar un mensaje
                header("Location: index.php?c=formatos&a=listarFormatos");
            } else {
                // Mostrar mensaje de error si algo falla
                echo "Error al registrar el formato.";
            }
        }
    }




    // Función para generar un código único
    private function generarCodigoUnico()
    {
        // Generar un código único basado en la fecha actual y un número aleatorio
        $fecha = date("YmdHis"); // Año, mes, día, hora, minuto, segundo
        $random = rand(100, 999); // Un número aleatorio de 3 dígitos
        //return "CL-" . $fecha . $random;
        return $fecha . $random;
    }





    public function listarFormatos()
    {
        $formatosModel = new FormatosModel();
        $formatos = $formatosModel->get_formatos();


        require_once "views/formatos/ListarFormatos.php";
    }



    public function verPerfilFormato()
    {
        // Verificar si el parámetro 'id' está en la URL
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Crear una instancia del modelo FormatosModel para obtener el formato por ID
            $formatosModel = new FormatosModel();
            $formato = $formatosModel->get_formato_by_id($id);

            // Verificar si el formato existe
            if ($formato) {
                // Crear una instancia del modelo EstadosModel
                $estadosModel = new EstadosModel();

                // Obtener la lista de estados desde la base de datos
                $estados = $estadosModel->get_estados();

                // Verificar que se hayan obtenido estados
                if (!$estados) {
                    echo "No se encontraron estados en la base de datos.";
                    return;
                }

                // Pasar el formato y los estados a la vista
                require_once "views/formatos/ActualizarFormato.php";
            } else {
                echo "Formato no encontrado.";
            }
        } else {
            echo "ID de formato no especificado.";
        }
    }


    public function actualizar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Recoger los datos enviados desde el formulario
            $formatoId = $_POST['formatoId'];
            $servicioARealizar = $_POST['servicioARealizar'];
            $piezasACambiar = $_POST['piezasACambiar'];
            $costoPiezas = $_POST['costoPiezas'];
            $costoServicio = $_POST['costoServicio'];
            $anticipo = $_POST['anticipo'];
            $resto = $_POST['resto'];
            $estadoId = $_POST['estadoId'];

            // Crear una instancia del modelo FormatosModel
            $formatosModel = new FormatosModel();

            // Llamar al método para actualizar el formato
            $actualizado = $formatosModel->actualizar_formato(
                $formatoId,
                $servicioARealizar,
                $piezasACambiar,
                $costoPiezas,
                $costoServicio,
                $anticipo,
                $resto,
                $estadoId
            );

            // Verificar si la actualización fue exitosa
            if ($actualizado) {
                // Redirigir al listado de formatos o mostrar un mensaje
                header("Location: index.php?c=formatos&a=listarFormatos");
            } else {
                echo "Error al actualizar el formato.";
            }
        } else {
            echo "Solicitud no válida.";
        }
    }






}


?>