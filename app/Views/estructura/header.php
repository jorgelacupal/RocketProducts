<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    <style>
        a {
            color: black;
            text-decoration: none;
        }

        a:hover {
            color: black;
            text-decoration: none;
        }

        .oscurecer:hover {
            box-shadow: 0 0 10px 5px rgba(0, 0, 0, 0.5);
        }

        img {
            width: 300px; 
            height: 150px;
            min-height: 150px;
            max-height: 150px;
            min-width: 100px;
            max-width: 300px;
        }
        h1,h2 {
  text-align: center;
  margin: 20px auto 0;
}
 .centrar{
    display: flex;
  justify-content: center;
 }
    </style>
</head>
<title>Document</title>
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url() . "/index" ?>">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <?php
                    if (session('email') != null) {
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url() . "/usuario/iniciar_sesion" ?>">Iniciar sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url() . "/usuario/registro_usuario" ?>">Registro usuario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url() . "/usuario/registro_empresa" ?>">Registro empresa</a>
                        </li>
                    <?php
                    }

                    if (session('esadmin') == 0 && session('email') != null) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url() . "/usuario/perfil_usuario" ?>">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url() . "/usuario/pedidos" ?>">Pedidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url() . "/usuario/cerrar_sesion" ?>">Cerrar sesión</a>
                        </li>
                    <?php
                    }
                    if (session('esadmin') == 0 && session('email') != null && isset($_COOKIE["carrito"])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url() . "/ver_carrito" ?>">Ver Carrito</a>
                        </li>
                    <?php
                    }
                    if (session('esadmin') == 1  && session('email') != null) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url() . "/usuario/perfil_empresa" ?>">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url() . "/usuario/gestionar_productos" ?>">Gestionar productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url() . "/usuario/cerrar_sesion" ?>">Cerrar sesión</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>