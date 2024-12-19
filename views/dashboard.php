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
    <title>Dashboard</title>
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

                <?php
                include("views/header.php");
                ?>



                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Dashboard</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Bienvenido a tu sistema de gestión.</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <li>
                                                            <div class="dropdown">
                                                                <a href="#"
                                                                    class="dropdown-toggle btn btn-white btn-dim btn-outline-light"
                                                                    data-bs-toggle="dropdown"><em
                                                                        class="d-none d-sm-inline icon ni ni-calender-date"></em><span><span
                                                                            class="d-none d-md-inline">Últimos</span> 30
                                                                        días</span><em
                                                                        class="dd-indc icon ni ni-chevron-right"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>Últimos 30 días</span></a>
                                                                        </li>
                                                                        <li><a href="#"><span>Últimos 6 meses</span></a>
                                                                        </li>
                                                                        <li><a href="#"><span>Último 1 año</span></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="nk-block-tools-opt"><a href="#"
                                                                class="btn btn-primary"><em
                                                                    class="icon ni ni-reports"></em><span>Reportes</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div>
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <div class="col-md-6 col-lg-5">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start pb-3 g-2">
                                                        <div class="card-title card-title-sm">
                                                            <h6 class="title">Ingresos por Ventas</h6>
                                                            <p>Ingresos por suscripción en los últimos 30 días.</p>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help"
                                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                                title="Customer of this month"></em>
                                                        </div>
                                                    </div>
                                                    <div class="analytic-au">
                                                        <div class="analytic-data-group analytic-au-group g-3">
                                                            <div class="analytic-data analytic-au-data">
                                                                <div class="title">Mensual</div>
                                                                <div class="amount">9.28K</div>
                                                                <div class="change up"><em
                                                                        class="icon ni ni-arrow-long-up"></em>4.63%
                                                                </div>
                                                            </div>
                                                            <div class="analytic-data analytic-au-data">
                                                                <div class="title">Semanal</div>
                                                                <div class="amount">2.69K</div>
                                                                <div class="change down"><em
                                                                        class="icon ni ni-arrow-long-down"></em>1.92%
                                                                </div>
                                                            </div>
                                                            <div class="analytic-data analytic-au-data">
                                                                <div class="title">Diario (Promedio)</div>
                                                                <div class="amount">0.94K</div>
                                                                <div class="change up"><em
                                                                        class="icon ni ni-arrow-long-up"></em>3.45%
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="analytic-au-ck">
                                                            <canvas class="analytics-au-chart"
                                                                id="analyticAuData"></canvas>
                                                        </div>
                                                        <div class="chart-label-group">
                                                            <div class="chart-label">01 Feb, 2021</div>
                                                            <div class="chart-label">30 Feb, 2021</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-md-6 col-lg-7">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner">
                                                    <div class="card-title-group pb-3 g-2">
                                                        <div class="card-title card-title-sm">
                                                            <h6 class="title">Estadísticas de Informe de Importación y
                                                                Gastos</h6>
                                                            <p>Comparación de Informes</p>
                                                        </div>
                                                        <div class="card-tools shrink-0 d-none d-sm-block">
                                                            <ul class="nav nav-switch-s2 nav-tabs bg-white">
                                                                <li class="nav-item"><a href="#" class="nav-link">7
                                                                        D</a></li>
                                                                <li class="nav-item"><a href="#"
                                                                        class="nav-link active">1 M</a></li>
                                                                <li class="nav-item"><a href="#" class="nav-link">3
                                                                        M</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="analytic-ov">
                                                        <div class="analytic-data-group analytic-ov-group g-3">
                                                            <div class="analytic-data analytic-ov-data">
                                                                <div class="title">Anual</div>
                                                                <div class="amount">2.7K</div>
                                                                <div class="change up"><em
                                                                        class="icon ni ni-arrow-long-up"></em>12.37%
                                                                </div>
                                                            </div>
                                                            <div class="analytic-data analytic-ov-data">
                                                                <div class="title">Mensual</div>
                                                                <div class="amount">3.8K</div>
                                                                <div class="change up"><em
                                                                        class="icon ni ni-arrow-long-up"></em>47.74%
                                                                </div>
                                                            </div>
                                                            <div class="analytic-data analytic-ov-data">
                                                                <div class="title">Semanal</div>
                                                                <div class="amount">9.9%</div>
                                                                <div class="change down"><em
                                                                        class="icon ni ni-arrow-long-down"></em>12.37%
                                                                </div>
                                                            </div>
                                                            <div class="analytic-data analytic-ov-data">
                                                                <div class="title">Diario</div>
                                                                <div class="amount">2.5%</div>
                                                                <div class="change up"><em
                                                                        class="icon ni ni-arrow-long-up"></em>9.35%
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="analytic-ov-ck">
                                                            <canvas class="analytics-line-large"
                                                                id="analyticOvData"></canvas>
                                                        </div>
                                                        <div class="chart-label-group ms-5">
                                                            <div class="chart-label">01 Jan, 2021</div>
                                                            <div class="chart-label d-none d-sm-block">15 Jan, 2021
                                                            </div>
                                                            <div class="chart-label">30 Jan, 2021</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-md-7 col-xxl-4">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner mb-n2">
                                                    <div class="card-title-group">
                                                        <div class="card-title card-title-sm">
                                                            <h6 class="title">Prospecto</h6>
                                                            <p>Estadísticas de Prospectos</p>

                                                        </div>
                                                        <div class="card-tools">
                                                            <div class="drodown">
                                                                <a href="#"
                                                                    class="dropdown-toggle dropdown-indicator btn btn-sm btn-outline-light btn-white"
                                                                    data-bs-toggle="dropdown">30 Días</a>
                                                                <div
                                                                    class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>7 Días</span></a></li>
                                                                        <li><a href="#"><span>15 Días</span></a></li>
                                                                        <li><a href="#"><span>30 Días</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-list is-loose traffic-channel-table">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col nk-tb-channel"><span>Duración</span></div>
                                                        <div class="nk-tb-col nk-tb-sessions"><span>Conteo</span></div>
                                                        <div class="nk-tb-col nk-tb-prev-sessions"><span>Conteo
                                                                Anterior</span></div>
                                                        <div class="nk-tb-col nk-tb-change"><span>Cambio</span></div>
                                                        <div class="nk-tb-col nk-tb-trend tb-col-sm text-end">
                                                            <span>Estadísticas</span>
                                                        </div>
                                                    </div><!-- .nk-tb-head -->
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col nk-tb-channel">
                                                            <span class="tb-lead">Anual</span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-sessions">
                                                            <span class="tb-sub tb-amount"><span>4305</span></span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-prev-sessions">
                                                            <span class="tb-sub tb-amount"><span>4128</span></span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-change">
                                                            <span class="tb-sub"><span>4.29%</span> <span
                                                                    class="change up"><em
                                                                        class="icon ni ni-arrow-long-up"></em></span></span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-trend text-end">
                                                            <div class="traffic-channel-ck ms-auto">
                                                                <canvas class="analytics-line-small"
                                                                    id="OrganicSearchData"></canvas>
                                                            </div>
                                                        </div>
                                                    </div><!-- .nk-tb-item -->
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col nk-tb-channel">
                                                            <span class="tb-lead">Mensual</span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-sessions">
                                                            <span class="tb-sub tb-amount"><span>859</span></span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-prev-sessions">
                                                            <span class="tb-sub tb-amount"><span>936</span></span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-change">
                                                            <span class="tb-sub"><span>15.8%</span> <span
                                                                    class="change down"><em
                                                                        class="icon ni ni-arrow-long-down"></em></span></span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-trend text-end">
                                                            <div class="traffic-channel-ck ms-auto">
                                                                <canvas class="analytics-line-small"
                                                                    id="SocialMediaData"></canvas>
                                                            </div>
                                                        </div>
                                                    </div><!-- .nk-tb-item -->
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col nk-tb-channel">
                                                            <span class="tb-lead">Semanal</span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-sessions">
                                                            <span class="tb-sub tb-amount"><span>482</span></span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-prev-sessions">
                                                            <span class="tb-sub tb-amount"><span>793</span></span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-change">
                                                            <span class="tb-sub"><span>41.3%</span> <span
                                                                    class="change down"><em
                                                                        class="icon ni ni-arrow-long-down"></em></span></span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-trend text-end">
                                                            <div class="traffic-channel-ck ms-auto">
                                                                <canvas class="analytics-line-small"
                                                                    id="ReferralsData"></canvas>
                                                            </div>
                                                        </div>
                                                    </div><!-- .nk-tb-item -->
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col nk-tb-channel">
                                                            <span class="tb-lead">Diario</span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-sessions">
                                                            <span class="tb-sub tb-amount"><span>138</span></span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-prev-sessions">
                                                            <span class="tb-sub tb-amount"><span>97</span></span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-change">
                                                            <span class="tb-sub"><span>12.6%</span> <span
                                                                    class="change up"><em
                                                                        class="icon ni ni-arrow-long-up"></em></span></span>
                                                        </div>
                                                        <div class="nk-tb-col nk-tb-trend text-end">
                                                            <div class="traffic-channel-ck ms-auto">
                                                                <canvas class="analytics-line-small"
                                                                    id="OthersData"></canvas>
                                                            </div>
                                                        </div>
                                                    </div><!-- .nk-tb-item -->
                                                </div><!-- .nk-tb-list -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-md-5">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner-group">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Venta Reciente</h6>
                                                            </div>
                                                            <div class="card-tools">
                                                                <a href="html/crm/recent-sale.html" class="link">Ver
                                                                    Todo</a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="card-inner p-0">
                                                        <table class="nk-tb-list nk-tb-ulist">
                                                            <thead>
                                                                <tr class="nk-tb-item nk-tb-head">
                                                                    <th class="nk-tb-col"><span
                                                                            class="sub-text">ID</span></th>
                                                                    <th class="nk-tb-col"><span
                                                                            class="sub-text">Nombre</span></th>
                                                                    <th class="nk-tb-col"><span
                                                                            class="sub-text">Precio</span></th>
                                                                    <th class="nk-tb-col tb-col-lg"><span
                                                                            class="sub-text">Estado</span></th>
                                                                    <th class="nk-tb-col nk-tb-col-tools text-end">
                                                                        <div class="dropdown">
                                                                            <a href="#"
                                                                                class="btn btn-xs btn-trigger btn-icon dropdown-toggle me-n1"
                                                                                data-bs-toggle="dropdown"
                                                                                data-offset="0,5"><em
                                                                                    class="icon ni ni-more-h"></em></a>
                                                                            <div
                                                                                class="dropdown-menu dropdown-menu-end">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                    <li><a href="#"><em
                                                                                                class="icon ni ni-check-round-cut"></em><span>Marcar
                                                                                                como Hecho</span></a>
                                                                                    </li>
                                                                                    <li><a href="#"><em
                                                                                                class="icon ni ni-archive"></em><span>Marcar
                                                                                                como
                                                                                                Archivado</span></a>
                                                                                    </li>
                                                                                    <li><a href="#"><em
                                                                                                class="icon ni ni-trash"></em><span>Eliminar
                                                                                                Tareas</span></a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </th>
                                                                </tr><!-- .nk-tb-item -->
                                                            </thead>
                                                            <tbody>
                                                                <tr class="nk-tb-item">
                                                                    <td class="nk-tb-col">
                                                                        <span>P-78</span>
                                                                    </td>
                                                                    <td class="nk-tb-col">
                                                                        <span>Mackbook<span
                                                                                class="dot dot-success d-lg-none ms-1"></span></span>
                                                                    </td>
                                                                    <td class="nk-tb-col">
                                                                        <span>$999.00</span>
                                                                    </td>
                                                                    <td class="nk-tb-col tb-col-lg">
                                                                        <span
                                                                            class="badge badge-dot badge-dot-xs bg-success">Available</span>
                                                                    </td>
                                                                    <td class="nk-tb-col nk-tb-col-tools">
                                                                        <ul class="nk-tb-actions">
                                                                            <li>
                                                                                <div class="dropdown">
                                                                                    <a href="#"
                                                                                        class="dropdown-toggle btn btn-icon btn-trigger"
                                                                                        data-bs-toggle="dropdown"><em
                                                                                            class="icon ni ni-more-h"></em></a>
                                                                                    <div
                                                                                        class="dropdown-menu dropdown-menu-end">
                                                                                        <ul
                                                                                            class="link-list-opt no-bdr">
                                                                                            <li><a data-bs-toggle="modal"
                                                                                                    href="#editDataDash"><em
                                                                                                        class="icon ni ni-edit"></em><span>Edit
                                                                                                        Info</span></a>
                                                                                            </li>
                                                                                            <li><a data-bs-toggle="modal"
                                                                                                    href="#deleteData"><em
                                                                                                        class="icon ni ni-trash"></em><span>Trash</span></a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr><!-- .nk-tb-item -->
                                                                <tr class="nk-tb-item">
                                                                    <td class="nk-tb-col">
                                                                        <span>P-56</span>
                                                                    </td>
                                                                    <td class="nk-tb-col">
                                                                        <span>iPhone<span
                                                                                class="dot dot-danger d-lg-none ms-1"></span></span>
                                                                    </td>
                                                                    <td class="nk-tb-col">
                                                                        <span>$700.00</span>
                                                                    </td>
                                                                    <td class="nk-tb-col tb-col-lg">
                                                                        <span
                                                                            class="badge badge-dot badge-dot-xs bg-danger">Out
                                                                            of Stock</span>
                                                                    </td>
                                                                    <td class="nk-tb-col nk-tb-col-tools">
                                                                        <ul class="nk-tb-actions">
                                                                            <li>
                                                                                <div class="dropdown">
                                                                                    <a href="#"
                                                                                        class="dropdown-toggle btn btn-icon btn-trigger"
                                                                                        data-bs-toggle="dropdown"><em
                                                                                            class="icon ni ni-more-h"></em></a>
                                                                                    <div
                                                                                        class="dropdown-menu dropdown-menu-end">
                                                                                        <ul
                                                                                            class="link-list-opt no-bdr">
                                                                                            <li><a data-bs-toggle="modal"
                                                                                                    href="#editDataDash"><em
                                                                                                        class="icon ni ni-edit"></em><span>Edit
                                                                                                        Info</span></a>
                                                                                            </li>
                                                                                            <li><a data-bs-toggle="modal"
                                                                                                    href="#deleteData"><em
                                                                                                        class="icon ni ni-trash"></em><span>Trash</span></a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr><!-- .nk-tb-item -->
                                                                <tr class="nk-tb-item">
                                                                    <td class="nk-tb-col">
                                                                        <span>P-68</span>
                                                                    </td>
                                                                    <td class="nk-tb-col">
                                                                        <span>Watch<span
                                                                                class="dot dot-success d-lg-none ms-1"></span></span>
                                                                    </td>
                                                                    <td class="nk-tb-col">
                                                                        <span>$260.00</span>
                                                                    </td>
                                                                    <td class="nk-tb-col tb-col-lg">
                                                                        <span
                                                                            class="badge badge-dot badge-dot-xs bg-success">Available</span>
                                                                    </td>
                                                                    <td class="nk-tb-col nk-tb-col-tools">
                                                                        <ul class="nk-tb-actions">
                                                                            <li>
                                                                                <div class="dropdown">
                                                                                    <a href="#"
                                                                                        class="dropdown-toggle btn btn-icon btn-trigger"
                                                                                        data-bs-toggle="dropdown"><em
                                                                                            class="icon ni ni-more-h"></em></a>
                                                                                    <div
                                                                                        class="dropdown-menu dropdown-menu-end">
                                                                                        <ul
                                                                                            class="link-list-opt no-bdr">
                                                                                            <li><a data-bs-toggle="modal"
                                                                                                    href="#editDataDash"><em
                                                                                                        class="icon ni ni-edit"></em><span>Edit
                                                                                                        Info</span></a>
                                                                                            </li>
                                                                                            <li><a data-bs-toggle="modal"
                                                                                                    href="#deleteData"><em
                                                                                                        class="icon ni ni-trash"></em><span>Trash</span></a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr><!-- .nk-tb-item -->
                                                                <tr class="nk-tb-item">
                                                                    <td class="nk-tb-col">
                                                                        <span>P-56</span>
                                                                    </td>
                                                                    <td class="nk-tb-col">
                                                                        <span>Earbuds<span
                                                                                class="dot dot-warning d-lg-none ms-1"></span></span>
                                                                    </td>
                                                                    <td class="nk-tb-col">
                                                                        <span>$180.00</span>
                                                                    </td>
                                                                    <td class="nk-tb-col tb-col-lg">
                                                                        <span
                                                                            class="badge badge-dot badge-dot-xs bg-warning">Low
                                                                            Stock</span>
                                                                    </td>
                                                                    <td class="nk-tb-col nk-tb-col-tools">
                                                                        <ul class="nk-tb-actions">
                                                                            <li>
                                                                                <div class="dropdown">
                                                                                    <a href="#"
                                                                                        class="dropdown-toggle btn btn-icon btn-trigger"
                                                                                        data-bs-toggle="dropdown"><em
                                                                                            class="icon ni ni-more-h"></em></a>
                                                                                    <div
                                                                                        class="dropdown-menu dropdown-menu-end">
                                                                                        <ul
                                                                                            class="link-list-opt no-bdr">
                                                                                            <li><a data-bs-toggle="modal"
                                                                                                    href="#editDataDash"><em
                                                                                                        class="icon ni ni-edit"></em><span>Edit
                                                                                                        Info</span></a>
                                                                                            </li>
                                                                                            <li><a data-bs-toggle="modal"
                                                                                                    href="#deleteData"><em
                                                                                                        class="icon ni ni-trash"></em><span>Trash</span></a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr><!-- .nk-tb-item -->
                                                            </tbody>
                                                        </table><!-- .nk-tb-list -->
                                                    </div><!-- .card-inner -->
                                                </div>
                                            </div><!-- .card -->
                                        </div>




                                    </div><!-- .row -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->

                <!-- ......................................................... -->
                <?php
                include("views/footer.php");
                ?>