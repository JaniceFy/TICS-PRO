<?php
// Iniciar la sesión solo si no está activa ya
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    // Si no está autenticado, redirigir al login
    header("Location: index.php?c=AuthController&a=loginForm");
    exit();
}

// Si está autenticado, mostrar la bienvenida
echo "Bienvenido, " . $_SESSION['nombre'];  // Muestra el nombre del usuario
?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <!-- <base href="../../"> -->
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Registrar Formato</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=3.2.4">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=3.2.4">
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">

        <!-- main @s -->
        <div class="nk-main ">
            <?php include("views/sidebar.php"); ?>

            <!-- wrap @s -->
            <div class="nk-wrap ">
                <?php include("views/header.php"); ?>

                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview wide-md mx-auto">
                                    <div class="nk-block-head ">
                                        <div class="nk-block-head-content">
                                            <div class="nk-block-head-sub"><a class="back-to"
                                                    href="views/errors/404.php"><em
                                                        class="icon ni ni-arrow-left"></em><span>Formatos</span></a>
                                            </div>
                                            <!-- <h2 class="nk-block-title fw-normal">Registrar Cliente</h2> -->
                                            <h4 class="nk-block-title">Registrar Formato</h4>

                                            <div class="nk-block-des">
                                                <p>Complete el formulario con los datos solicitados.</p>
                                            </div>

                                        </div>
                                    </div><!-- .nk-block-head -->

                                    <div class="nk-block nk-block-lg">
                                        <div class="card card-bordered">
                                            <div class="card-inner">

                                                <!-- -----------------------------------FORM BEGIN----------------------------------- -->

                                                <!--  enctype="multipart/form-data" -> PARA CARGAR ARCHIVOS -->
                                                <form action="index.php?c=FormatosController&a=registrar" method="POST"
                                                    enctype="multipart/form-data" class="form-validate">



                                                    <!-- <span class="preview-title-lg overline-title">Datos del
                                                        cliente</span> -->





                                                    <div class="row g-gs">


                                                        <div class="row g-3 align-center">
                                                            <div class="col-lg-5">
                                                                <div class="form-group">
                                                                    <!-- <label class="form-label">Site Email</label> -->
                                                                    <span class="form-note">Datos del cliente</span>
                                                                </div>
                                                            </div>
                                                        </div>




                                                        <input type="hidden" name="clienteId"
                                                            value="<?php echo $clienteId; ?>">


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="codigoCliente">Código
                                                                    Cliente</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control"
                                                                        id="codigoCliente" name="codigoCliente"
                                                                        value="<?php echo $codigoCliente; ?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="nombreCliente">Nombre
                                                                    Cliente</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control"
                                                                        id="nombreCliente" name="nombreCliente"
                                                                        value="<?php echo $nombreCliente . " " . $aPaternoCliente . " " . $aMaternoCliente; ?>"
                                                                        readonly>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row g-3 align-center">
                                                            <div class="col-lg-5">
                                                                <div class="form-group">
                                                                    <!-- <label class="form-label">Site Email</label> -->
                                                                    <span class="form-note">Datos del equipo</span>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <input type="hidden" name="equipoId"
                                                            value="<?php echo $equipo['id']; ?>">

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="numSerie">Número de
                                                                    serie</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control"
                                                                        id="numSerie" name="numSerie" required readonly
                                                                        value="<?php echo $equipo['numSerie']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="tipo">Tipo de
                                                                    dispositivo</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="tipo"
                                                                        name="tipo" readonly
                                                                        value="<?php echo $equipo['tipo']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="marca">Marca</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="marca"
                                                                        name="marca" readonly
                                                                        value="<?php echo $equipo['marca']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="modelo">Modelo</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="modelo"
                                                                        readonly
                                                                        value="<?php echo $equipo['modelo']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="password">Contraseña</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control"
                                                                        id="password" name="password" readonly required
                                                                        value="<?php echo $equipo['password']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>






                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Evidencia fotográfica</label>
                                                                <div class="form-control-wrap">


                                                                    <!-- ARCHIVO GUARDADO -->

                                                                    <?php if (!empty($equipo['evidenciaFotografica'])): ?>
                                                                        <?php
                                                                        // Codificamos la imagen en base64
                                                                        $imagenBase64 = base64_encode($equipo['evidenciaFotografica']);
                                                                        $urlImagen = 'data:image/jpeg;base64,' . $imagenBase64;
                                                                        ?>
                                                                        <!-- Enlace para abrir la imagen en otra pestaña -->
                                                                        <a href="<?php echo $urlImagen; ?>" target="_blank"
                                                                            title="Ver imagen en otra pestaña">
                                                                            Ver evidencia fotográfica registrada
                                                                        </a>
                                                                    <?php else: ?>
                                                                        <p>No hay evidencia fotográfica disponible.</p>
                                                                    <?php endif; ?>

                                                                </div>
                                                            </div>
                                                        </div>




                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="accesorios">Accesorios
                                                                    incluidos</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control no-resize"
                                                                        id="accesorios" name="accesorios"
                                                                        readonly><?php echo $equipo['accesorios']; ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="condicionEstetica">Condición estética del
                                                                    equipo</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control no-resize"
                                                                        id="condicionEstetica" name="condicionEstetica"
                                                                        readonly><?php echo $equipo['condicionEstetica']; ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>




                                                        <div class="row g-3 align-center">
                                                            <div class="col-lg-5">
                                                                <div class="form-group">
                                                                    <!-- <label class="form-label">Site Email</label> -->
                                                                    <span class="form-note">Datos del servicio</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="problemaReportado">Problema reportado</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control no-resize"
                                                                        id="problemaReportado" name="problemaReportado"
                                                                        oninput="convertToUppercase(this)" required
                                                                        placeholder="Ingrese los accesorios incluidos"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="servicioARealizar">Servicio a realizar</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control no-resize"
                                                                        id="servicioARealizar" name="servicioARealizar"
                                                                        oninput="convertToUppercase(this)" required
                                                                        placeholder="Ingrese los accesorios incluidos"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="piezasACambiar">Piezas a
                                                                    cambiar</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control no-resize"
                                                                        id="piezasACambiar" name="piezasACambiar" required
                                                                        oninput="convertToUppercase(this)"
                                                                        placeholder="Ingrese los accesorios incluidos"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="costoPiezas">Costo de
                                                                    piezas</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">$</span>
                                                                        </div>
                                                                        <input name="costoPiezas" id="costoPiezas"
                                                                            type="number" class="form-control" required
                                                                            placeholder="Ingrese el costo de las piezas"
                                                                            oninput="calcularTotalYRestante()"
                                                                            value="0">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">.00</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="costoServicio">Costo del
                                                                    servicio</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">$</span>
                                                                        </div>
                                                                        <input name="costoServicio" id="costoServicio"
                                                                            type="number" class="form-control" required
                                                                            placeholder="Ingrese el costo del servicio"
                                                                            oninput="calcularTotalYRestante()">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">.00</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>




                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="total">Total</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">$</span>
                                                                        </div>
                                                                        <input name="total" id="total" type="number"
                                                                            class="form-control" required
                                                                            placeholder="Ingrese el total"
                                                                            oninput="convertToUppercase(this)">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">.00</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="anticipo">Anticipo</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">$</span>
                                                                        </div>
                                                                        <input name="anticipo" id="anticipo"
                                                                            type="number" class="form-control" required
                                                                            placeholder="Ingrese el anticipo"
                                                                            oninput="calcularRestante()">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">.00</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="resto">Resto</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">$</span>
                                                                        </div>
                                                                        <input name="resto" id="resto" type="number"
                                                                            class="form-control" required
                                                                            placeholder="Ingrese el resto"
                                                                            oninput="convertToUppercase(this)">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">.00</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row g-3 align-center">
                                                            <div class="col-lg-5">
                                                                <div class="form-group">
                                                                    <!-- <label class="form-label">Site Email</label> -->
                                                                    <span class="form-note">Estado del
                                                                        equipo</span>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="form-label" for="estadoId">Condición actual
                                                                del equipo</label>
                                                            <div class="form-control-wrap">
                                                                <select class="form-select js-select2" id="estadoId"
                                                                    name="estadoId" data-search="on">
                                                                    <option value="" disabled>Seleccione el estado
                                                                    </option>
                                                                    <?php
                                                                    // Iterar sobre los estados y generar las opciones
                                                                    foreach ($estados as $estado) {
                                                                        $selected = ($estado['id'] == 1) ? 'selected' : ''; // Cambia '1' por el ID de estado que deseas por defecto
                                                                        echo "<option value='" . $estado['id'] . "' $selected>" . $estado['estado'] . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>










                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <button type="submit"
                                                                    class="btn btn-lg btn-primary">Registrar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <!-- -----------------------------------FORM BEGIN----------------------------------- -->

                                            </div>
                                        </div>
                                    </div><!-- .nk-block -->


                                </div><!-- .components-preview -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->



                <!-- footer @s -->
                <?php include("views/footer.php"); ?>
                <!-- footer @e -->




                <!-- -----------------------------------JS----------------------------------- -->

                <script>
                    // VALIDACION DE 10 DIGITOS NUMERICOS
                    function validatePhoneNumber(input) {
                        let value = input.value;
                        value = value.replace(/\D/g, '');
                        if (value.length > 10) {
                            value = value.substring(0, 10);
                        }
                        input.value = value;
                    }

                    // VALIDACION DE SOLO LETRAS
                    function validateText(input) {
                        let value = input.value;
                        value = value.replace(/[^A-Za-zÁáÉéÍíÓóÚúÑñ\s]/g, '');
                        input.value = value;
                    }

                    // MINUSCULAS A MAYUSCULAS
                    function convertToUppercase(input) {
                        input.value = input.value.toUpperCase();
                    }
                </script>



                <script>
                    function calcularTotalYRestante() {
                        // Obtener los valores de los campos de costo de piezas y costo de servicio
                        let costoPiezas = parseFloat(document.getElementById('costoPiezas').value) || 0;
                        let costoServicio = parseFloat(document.getElementById('costoServicio').value) || 0;

                        // Calcular el total
                        let total = costoPiezas + costoServicio;
                        document.getElementById('total').value = total.toFixed(2);

                        // Llamar a la función para calcular el resto
                        calcularRestante();
                    }

                    function calcularRestante() {
                        // Obtener los valores del total y el anticipo
                        let total = parseFloat(document.getElementById('total').value) || 0;
                        let anticipo = parseFloat(document.getElementById('anticipo').value) || 0;

                        // Calcular el resto
                        let resto = total - anticipo;
                        document.getElementById('resto').value = resto.toFixed(2);
                    }

                    // Inicializar con valores por defecto
                    calcularTotalYRestante();
                </script>