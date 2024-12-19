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
    <meta charset="utf-8">
    <meta name="author" content="Janice Flores">
    <!-- Configura cómo se debe mostrar el contenido en dispositivos con diferentes tamaños de pantalla -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <!-- Vincula el ícono que se muestra en la pestaña del navegador. -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Mi perfil</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=3.2.4">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=3.2.4">
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">

        <!-- main @s -->
        <div class="nk-main ">
            <?php
            include("views/sidebar.php");
            ?>

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
                                                        class="icon ni ni-arrow-left"></em><span>Configuración</span></a>
                                            </div>
                                            <!-- <h2 class="nk-block-title fw-normal">Registrar Cliente</h2> -->
                                            <h4 class="nk-block-title">Mi perfil</h4>

                                            <div class="nk-block-des">
                                                <p>Actualice el formulario con los datos solicitados.</p>
                                            </div>

                                        </div>
                                    </div><!-- .nk-block-head -->

                                    <div class="nk-block nk-block-lg">
                                        <div class="card card-bordered">
                                            <div class="card-inner">

                                                <!-- -----------------------------------FORM BEGIN----------------------------------- -->

                                                <!-- <form method="POST" action="index.php?c=clientes&a=guardar"
                                                    class="form-validate is-alter"> -->
                                                <form method="POST" action="" class="form-validate">



                                                    <!-- <span class="preview-title-lg overline-title">Ingrese los datos solicitados</span> -->

                                                    <div class="row g-gs">

                                                        <!-- <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="codigo">Codigo</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="codigo"
                                                                        name="codigo"
                                                                        oninput="convertToUppercase(this)"
                                                                        required placeholder="Ingrese el nombre">
                                                                </div>
                                                            </div>
                                                        </div> -->

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="nombre">Nombre(S)</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="nombre"
                                                                        name="nombre"
                                                                        oninput="validateText(this); convertToUppercase(this)"
                                                                        required placeholder="Ingrese el nombre"
                                                                        value="<?php echo $usuario['nombre']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="aPaterno">Apellido
                                                                    paterno</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control"
                                                                        id="aPaterno" name="aPaterno"
                                                                        oninput="validateText(this); convertToUppercase(this)"
                                                                        required
                                                                        placeholder="Ingrese el apellido paterno"
                                                                        value="<?php echo $usuario['aPaterno']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="aMaterno">Apellido
                                                                    materno</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control"
                                                                        id="aMaterno" name="aMaterno"
                                                                        oninput="validateText(this); convertToUppercase(this)"
                                                                        required
                                                                        value="<?php echo $usuario['aMaterno']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="correo">Correo
                                                                    electrónico</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-icon form-icon-right">
                                                                        <em class="icon ni ni-mail"></em>
                                                                    </div>
                                                                    <input type="email" class="form-control" id="correo"
                                                                        name="correo" oninput="convertToUppercase(this)"
                                                                        required placeholder="Ingrese el correo"
                                                                        value="<?php echo $usuario['correo']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="telefono">Teléfono</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="input-group">
                                                                        <!-- <div class="input-group-prepend">
                                                                            <span class="input-group-text" id="fv-phone">+880</span>
                                                                        </div> -->
                                                                        <input type="number" class="form-control"
                                                                            id="telefono" name="telefono"
                                                                            oninput="validatePhoneNumber(this)" required
                                                                            placeholder="Ingrese el teléfono"
                                                                            value="<?php echo $usuario['telefono']; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="rol">Rol</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" readonly
                                                                        id="rol" name="rol"
                                                                        oninput="validateText(this); convertToUppercase(this)"
                                                                        required value="<?php echo $usuario['rol']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <button type="button"
                                                                    class="btn btn-lg btn-secondary">Actualizar</button>
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