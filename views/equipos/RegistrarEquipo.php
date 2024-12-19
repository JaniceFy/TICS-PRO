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
    <title>Registrar Equipo</title>
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
                                                        class="icon ni ni-arrow-left"></em><span>Equipos</span></a>
                                            </div>
                                            <!-- <h2 class="nk-block-title fw-normal">Registrar Cliente</h2> -->
                                            <h4 class="nk-block-title">Registrar Equipo</h4>

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
                                                <form action="index.php?c=EquiposController&a=registrar" method="POST"
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




                                                        <input type="hidden" name="clienteId" value="<?php echo $clienteId; ?>">


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




                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="numSerie">Número de
                                                                    serie</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control"
                                                                        id="numSerie" name="numSerie" required
                                                                        oninput="convertToUppercase(this)"
                                                                        placeholder="Ingrese el número de serie">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="tipo">Tipo de
                                                                    dispositivo</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="tipo"
                                                                        name="tipo" oninput="convertToUppercase(this)"
                                                                        required placeholder="Ingrese el tipo">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="marca">Marca</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="marca"
                                                                        name="marca" oninput="convertToUppercase(this)"
                                                                        required placeholder="Ingrese la marca">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="modelo">Modelo</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="modelo"
                                                                        name="modelo" oninput="convertToUppercase(this)"
                                                                        required placeholder="Ingrese el modelo">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="password">Contraseña</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control"
                                                                        id="password" name="password" required
                                                                        placeholder="Ingrese la contraseña">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Evidencia fotográfica</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-file">
                                                                        <input type="file" class="form-file-input"
                                                                            id="evidenciaFotografica"
                                                                            name="evidenciaFotografica">
                                                                        <label class="form-file-label"
                                                                            for="evidenciaFotografica">Elegir
                                                                            archivo</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="accesorios">Accesorios
                                                                    incluidos</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control no-resize"
                                                                        id="accesorios" name="accesorios" required
                                                                        oninput="convertToUppercase(this)"
                                                                        placeholder="Ingrese los accesorios incluidos"></textarea>
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
                                                                        id="condicionEstetica" name="condicionEstetica" required
                                                                        oninput="convertToUppercase(this)"
                                                                        placeholder="Ingrese la descripción del estado visual del dispositivo"></textarea>
                                                                </div>
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