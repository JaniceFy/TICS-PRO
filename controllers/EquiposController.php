<?php

class EquiposController
{
    public function __construct()
    {
        require_once "models/ClientesModel.php";
        require_once "models/EquiposModel.php";
    }

    // Acción para mostrar el formulario de registrar equipo
    public function mostrarFormulario()
    {
        if (isset($_GET['id'])) {
            $clienteId = $_GET['id'];

            // Obtener los datos del cliente para el formulario
            $clientesModel = new ClientesModel();
            $cliente = $clientesModel->get_cliente_by_id($clienteId);

            // Verificar si el cliente existe
            if ($cliente) {
                $codigoCliente = $cliente['codigo'];
                $nombreCliente = $cliente['nombre'];
                $aPaternoCliente = $cliente['aPaterno'];
                $aMaternoCliente = $cliente['aMaterno'];

                // Cargar la vista
                require_once "views/equipos/RegistrarEquipo.php";
            } else {
                echo "Cliente no encontrado.";
            }
        } else {
            echo "ID de cliente no especificado.";
        }
    }

    public function registrar()
    {
        // Verificar que se hayan recibido los datos del formulario
        var_dump($_POST);   // Verifica si los datos del formulario se reciben correctamente
        var_dump($_FILES);  // Verifica si el archivo se está recibiendo correctamente

        if (isset($_POST['numSerie'], $_POST['tipo'], $_POST['marca'], $_POST['modelo'], $_POST['password'], $_POST['accesorios'], $_POST['condicionEstetica'], $_POST['clienteId'], $_FILES['evidenciaFotografica'])) {
            // Recibir los datos del formulario
            $numSerie = $_POST['numSerie'];
            $tipo = $_POST['tipo'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $password = $_POST['password'];
            $accesorios = $_POST['accesorios'];
            $condicionEstetica = $_POST['condicionEstetica'];
            $clienteId = $_POST['clienteId'];

            // Verificar si se cargó correctamente el archivo de evidencia fotográfica
            if ($_FILES['evidenciaFotografica']['error'] == UPLOAD_ERR_OK) {
                // Leer el archivo y convertirlo en BLOB
                $evidenciaFotografica = file_get_contents($_FILES['evidenciaFotografica']['tmp_name']);
            } else {
                echo "Error al cargar la evidencia fotográfica.";
                return;
            }

            // Instanciar EquiposModel y registrar el equipo
            $equiposModel = new EquiposModel();
            $resultado = $equiposModel->insertar($numSerie, $tipo, $marca, $modelo, $password, $accesorios, $condicionEstetica, $evidenciaFotografica, $clienteId);

            // Verificar si la inserción fue exitosa
            if ($resultado) {
                // Redirigir a la página de listado de equipos
                header("Location: index.php?c=equipos&a=listarEquipos");
                exit();
            } else {
                echo "Error al registrar el equipo.";
            }
        } else {
            echo "Faltan datos en el formulario.";
        }
    }


    public function listarEquipos()
    {
        $equiposModel = new EquiposModel();
        $equipos = $equiposModel->get_equipos();


        require_once "views/equipos/ListarEquipos.php";
    }

    public function verPerfilEquipo()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];


            $equiposModel = new EquiposModel();
            $equipo = $equiposModel->get_equipo_by_id($id);

            // Verificar si se encontró el cliente
            if ($equipo) {
                require_once "views/equipos/ActualizarEquipo.php";  // Cargar la vista de actualización con los datos del cliente
            } else {
                echo "Equipo no encontrado.";
            }
        } else {
            echo "ID de equipo no especificado.";
        }
    }


    public function actualizarEquipo()
    {
        if (isset($_POST['numSerie'], $_POST['tipo'], $_POST['marca'], $_POST['modelo'], $_POST['password'], $_POST['accesorios'], $_POST['condicionEstetica'], $_GET['id'])) {

            // Obtener los datos del formulario
            $id = $_GET['id'];
            $numSerie = $_POST['numSerie'];
            $tipo = $_POST['tipo'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $password = $_POST['password'];
            $accesorios = $_POST['accesorios'];
            $condicionEstetica = $_POST['condicionEstetica'];

            // Manejar la evidencia fotográfica (si se ha subido un archivo)
            $evidenciaFotografica = null;
            if (isset($_FILES['evidenciaFotografica']) && $_FILES['evidenciaFotografica']['error'] == 0) {
                // Leer el archivo subido y convertirlo en contenido binario
                $evidenciaFotografica = file_get_contents($_FILES['evidenciaFotografica']['tmp_name']);
            }

            // Crear una instancia del modelo de equipos y actualizar los datos
            $equiposModel = new EquiposModel();
            $equiposModel->actualizar($id, $numSerie, $tipo, $marca, $modelo, $password, $accesorios, $condicionEstetica, $evidenciaFotografica);

            // Redirigir después de actualizar
            header("Location: index.php?c=equipos&a=listarEquipos");
            exit();
        } else {
            echo "Faltan datos en el formulario.";
        }
    }








}
?>