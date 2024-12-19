<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- Page Title  -->
    <title>Register | JCode</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="assets/css/dashlite.css?ver=3.2.4">
    <link id="skin-default" rel="stylesheet" href="assets/css/theme.css?ver=3.2.4">
</head>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body wide-xs">
                        <!-- <div class="brand-logo pb-4 text-center">
                            <a href="html/index.html" class="logo-link">
                                <img class="logo-light logo-img logo-img-lg" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                                <img class="logo-dark logo-img logo-img-lg" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                            </a>
                        </div> -->
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Registrarse</h4>
                                        <div class="nk-block-des">
                                            <p>Crear una nueva cuenta</p>
                                        </div>
                                    </div>
                                </div>
                                <form action="html/pages/auths/auth-success-v2.html">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Nombre</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="name" placeholder="Ingresa tu nombre">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="email">Correo electrónico</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="email" placeholder="Ingresa tu correo electrónico">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="password">Contraseña</label>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" id="password" placeholder="Ingresa tu contraseña">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!-- <div class="custom-control custom-control-xs custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox">
                                            <label class="custom-control-label" for="checkbox">I agree to Dashlite <a href="html/pages/terms-policy.html">Privacy Policy</a> &amp; <a href="html/pages/terms-policy.html"></label>
                                        </div> -->
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">Crear cuenta</button>
                                    </div>
                                </form>
                                <div class="form-note-s2 text-center pt-4"> ¿Ya tienes una cuenta? <a href="index.php"><strong>Inicia sesión aquí</strong></a>
                                </div>
                                <div class="text-center pt-4 pb-3">
                                    <h6 class="overline-title overline-title-sap"><span>O</span></h6>
                                </div>
                                <ul class="nav justify-center gx-8">
                                    <li class="nav-item"><a class="link link-primary fw-normal py-2 px-3" href="#">Facebook</a></li>
                                    <li class="nav-item"><a class="link link-primary fw-normal py-2 px-3" href="#">Google</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <?php
                        include("auth-footer.php");
                    ?>