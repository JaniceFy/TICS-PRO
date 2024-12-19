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
    <title>Registrar Notificación</title>
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
                                                        class="icon ni ni-arrow-left"></em><span>Notificaciones</span></a>
                                            </div>
                                            <!-- <h2 class="nk-block-title fw-normal">Registrar Cliente</h2> -->
                                            <h4 class="nk-block-title">Registrar Notificación</h4>

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
                                                <form action="index.php?c=NotificacionesController&a=registrar"
                                                    method="POST" enctype="multipart/form-data" class="form-validate">



                                                    <!-- <span class="preview-title-lg overline-title">Datos del
                                                        cliente</span> -->


                                                    <input type="hidden" name="formatoId"
                                                        value="<?php echo $formato['id']; ?>">



                                                    <div class="row g-gs">


                                                        <div class="row g-3 align-center">
                                                            <div class="col-lg-5">
                                                                <div class="form-group">
                                                                    <!-- <label class="form-label">Site Email</label> -->
                                                                    <span class="form-note">Datos del formato</span>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="codigoFormato">Código
                                                                    Formato</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control"
                                                                        id="codigoFormato" name="codigoFormato"
                                                                        value="<?php echo $formato['codigo']; ?>"
                                                                        readonly>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                    for="fechaHoraCreacion">Registro</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control"
                                                                        id="fechaHoraCreacion" name="fechaHoraCreacion"
                                                                        value="<?php echo $formato['fechaHoraCreacion']; ?>"
                                                                        readonly>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="row g-3 align-center">
                                                            <div class="col-lg-5">
                                                                <div class="form-group">
                                                                    <!-- <label class="form-label">Site Email</label> -->
                                                                    <span class="form-note">Datos de la
                                                                        notificación</span>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="form-label" for="medioId">Medio</label>
                                                            <select class="form-select js-select2" id="medioId"
                                                                name="medioId" data-search="on" required>
                                                                <option value="" disabled>Seleccione el medio</option>
                                                                <?php
                                                                if (!empty($medios)) {
                                                                    foreach ($medios as $medio) {
                                                                        $selected = ($medio['id'] == 1) ? 'selected' : ''; // Cambia '1' por el ID que deseas seleccionar por defecto
                                                                        echo "<option value='{$medio['id']}' $selected>{$medio['medio']}</option>";
                                                                    }
                                                                } else {
                                                                    echo "<option disabled>No hay medios disponibles</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>






                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="mensaje">Mensaje</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea class="form-control no-resize"
                                                                        id="mensaje" name="mensaje"
                                                                        oninput="convertToUppercase(this)" required
                                                                        placeholder="Ingrese el mensaje"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fecha">Fecha</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-icon form-icon-left">
                                                                        <em class="icon ni ni-calendar"></em>
                                                                    </div>
                                                                    <input type="text" name="fecha" id="fecha"
                                                                        class="form-control date-picker"
                                                                        data-date-format="yyyy-mm-dd" required>
                                                                </div>

                                                            </div>
                                                        </div>


                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="hora">Hora</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-icon form-icon-left">
                                                                        <em class="icon ni ni-clock"></em>
                                                                    </div>
                                                                    <input type="text" name="hora" id="hora"
                                                                        class="form-control time-picker" required>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Registrar</button>
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




                <!-- content ###s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview wide-md mx-auto">


                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">


                                                <h4 class="nk-block-title">Notificaciones Registradas</h4>


                                                <div class="nk-block-des text-soft">
                                                    <p>Tiene un total de <?php echo count($notificaciones); ?> formatos
                                                        registrados.</p>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <table class="datatable-init nowrap nk-tb-list nk-tb-ulist"
                                                    data-auto-responsive="false">
                                                    <thead>
                                                        <tr class="nk-tb-item nk-tb-head">
                                                            <th class="nk-tb-col"><span class="sub-text">Medio</span>
                                                            </th>
                                                            <!-- <th class="nk-tb-col"><span class="sub-text">Mensaje</span>
                                                            </th> -->
                                                            <th class="nk-tb-col tb-col-mb"><span
                                                                    class="sub-text">Fecha</span></th>
                                                            <th class="nk-tb-col tb-col-mb"><span
                                                                    class="sub-text">Hora</span></th>
                                                            <th class="nk-tb-col tb-col-mb"><span
                                                                    class="sub-text">Registro</span></th>
                                                            <th class="nk-tb-col nk-tb-col-tools text-end">
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php foreach ($notificaciones as $notificacion): ?>

                                                            <tr class="nk-tb-item">
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span><?php echo $notificacion['medio']; ?></span>
                                                                </td>
                                                                <!-- <td class="nk-tb-col tb-col-md">
                                                                    <span><?php echo $notificacion['mensaje']; ?></span>
                                                                </td> -->
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span><?php echo $notificacion['fecha']; ?></span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span><?php echo $notificacion['hora']; ?></span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span><?php echo $notificacion['fechaHoraCreacion']; ?></span>
                                                                </td>

                                                                <!-- <td class="nk-tb-col tb-col-md">
                                                                <span class="tb-status text-info">Inactive</span>
                                                            </td> -->
                                                                <td class="nk-tb-col nk-tb-col-tools">
                                                                    <ul class="nk-tb-actions gx-1">

                                                                        <li>
                                                                            <div class="drodown">
                                                                                <a href="#"
                                                                                    class="dropdown-toggle btn btn-icon btn-trigger"
                                                                                    data-bs-toggle="dropdown"><em
                                                                                        class="icon ni ni-more-h"></em></a>
                                                                                <div
                                                                                    class="dropdown-menu dropdown-menu-end">
                                                                                    <ul class="link-list-opt no-bdr">
                                                                                        <li> <a
                                                                                                href="index.php?c=NotificacionesController&a=verPerfil&id=<?php echo $notificacion['id']; ?>">
                                                                                                <em
                                                                                                    class="icon ni ni-eye"></em><span>Ver
                                                                                                    perfil</span></a></li>

                                                                                    </ul>

                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr><!-- .example  -->

                                                        <?php endforeach; ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- .card-preview -->
                                    </div> <!-- nk-block -->
                                </div><!-- .components-preview -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content ###e -->




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
                    // Obtener el campo de entrada de hora
                    const horaInput = document.getElementById('hora');

                    // Función para validar la entrada
                    horaInput.addEventListener('input', function (event) {
                        // Solo permite números y dos puntos (para formato de hora HH:mm)
                        const validValue = event.target.value.replace(/[^0-9:]/g, ''); // Elimina cualquier carácter no válido

                        // Actualiza el valor del input con la entrada válida
                        event.target.value = validValue;
                    });
                </script>