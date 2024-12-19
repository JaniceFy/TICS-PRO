<?php

class ClientesController
{

    public function __construct()
    {
        require_once "models/ClientesModel.php";
    }

    public function index() {
        // Redirigir a la acción de listar clientes
        // Esto se puede cambiar a cualquier otra vista o acción por defecto que desees.
        $this->listarClientes();
    }



    // Acción principal para mostrar el formulario de registrar cliente
    public function registrarCliente()
    {
        $data["titulo"] = "Registrar Cliente";
        require_once "views/clientes/RegistrarCliente.php";  // Mostrar el formulario para registrar un cliente
    }

    // Acción para procesar el formulario y registrar el cliente
    public function registrar()
    {
        // Generar el código automáticamente
        $codigo = $this->generarCodigoUnico();

        // Validar los datos recibidos
        if (isset($_POST['nombre'], $_POST['aPaterno'], $_POST['aMaterno'], $_POST['correo'], $_POST['telefono'])) {
            $nombre = $_POST['nombre'];
            $aPaterno = $_POST['aPaterno'];
            $aMaterno = $_POST['aMaterno'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];
            $fechaHoraCreacion = date("Y-m-d H:i:s");  // Fecha y hora de creación automáticas

            // Insertar el cliente en la base de datos
            $clientes = new ClientesModel();
            $clientes->insertar($codigo, $nombre, $aPaterno, $aMaterno, $correo, $telefono, $fechaHoraCreacion);

            // Redirigir al formulario de registrar cliente después de registrar
            header("Location: index.php?c=clientes&a=listarCliente");
            exit();
        } else {
            // Si faltan datos, mostrar un error
            echo "Faltan datos en el formulario.";
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


    public function listarClientes()
    {
        // Obtener los clientes desde el modelo
        $clientesModel = new ClientesModel();
        $clientes = $clientesModel->get_clientes();

        // Pasar la lista de clientes a la vista
        require_once "views/clientes/ListarClientes.php";
    }


    // Acción para mostrar el perfil de un cliente
    public function verPerfilCliente()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];  // Obtener el ID del cliente desde la URL

            // Obtener los datos del cliente desde el modelo
            $clientesModel = new ClientesModel();
            $cliente = $clientesModel->get_cliente_by_id($id);  // Método para obtener los datos del cliente

            // Verificar si se encontró el cliente
            if ($cliente) {
                require_once "views/clientes/ActualizarCliente.php";  // Cargar la vista de actualización con los datos del cliente
            } else {
                echo "Cliente no encontrado.";
            }
        } else {
            echo "ID de cliente no especificado.";
        }
    }


    public function actualizarCliente()
    {
        if (isset($_POST['nombre'], $_POST['aPaterno'], $_POST['aMaterno'], $_POST['correo'], $_POST['telefono'], $_GET['id'])) {
            // Obtener los datos del formulario
            $id = $_GET['id'];
            $nombre = $_POST['nombre'];
            $aPaterno = $_POST['aPaterno'];
            $aMaterno = $_POST['aMaterno'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];

            // Crear una instancia del modelo de clientes y actualizar los datos
            $clientesModel = new ClientesModel();
            $clientesModel->actualizar($id, $nombre, $aPaterno, $aMaterno, $correo, $telefono);

            // Redirigir al listado de clientes después de actualizar
            header("Location: index.php?c=clientes&a=listarClientes");
            exit();
        } else {
            echo "Faltan datos en el formulario.";
        }
    }






}


?>