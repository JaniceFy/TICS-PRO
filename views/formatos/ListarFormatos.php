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
    <title>Listar Formatos</title>
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


                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <div class="nk-block-head-sub"><a class="back-to"
                                                        href="views/errors/404.php"><em
                                                            class="icon ni ni-arrow-left"></em><span>Formatos</span></a>
                                                </div>

                                                <h4 class="nk-block-title">Listado de Formatos</h4>


                                                <div class="nk-block-des text-soft">
                                                    <p>Tiene un total de <?php echo count($formatos); ?> formatos
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
                                                            <th class="nk-tb-col"><span class="sub-text">Cliente</span>
                                                            </th>
                                                            <th class="nk-tb-col"><span
                                                                    class="sub-text">Dispositivo</span>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-mb"><span
                                                                    class="sub-text">Servicio</span></th>
                                                            <th class="nk-tb-col tb-col-mb"><span
                                                                    class="sub-text">Estado</span></th>
                                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Registro</span></th>
                                                            <th class="nk-tb-col nk-tb-col-tools text-end">
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php foreach ($formatos as $formato): ?>

                                                            <tr class="nk-tb-item">
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span><?php echo $formato['cliente_nombre']; ?></span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span><?php echo $formato['equipo_tipo']; ?></span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span><?php echo $formato['servicioARealizar']; ?></span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span><?php echo $formato['estado_nombre']; ?></span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span><?php echo $formato['fechaHoraCreacion']; ?></span>
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
                                                                                        <li> <a  href="index.php?c=formatos&a=verPerfilFormato&id=<?php echo $formato['id']; ?>">
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
                <!-- content @e -->


                <!-- footer @s -->
                <?php include("views/footer.php"); ?>
                <!-- footer @e -->