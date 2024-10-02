<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
 <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.css' integrity='sha512-8BU3emz11z9iF75b10oPjjpamM4Mz23yQFQymbtwyPN3mNWHxpgeqyrYnkIUP6A8KyAj5k2p3MiYLtYqew7gIw==' crossorigin='anonymous'/>
  <!-- overlayScrollbars -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/2.10.0/styles/overlayscrollbars.min.css' integrity='sha512-LJPmNwX2gc0MasqB7LmhaaAdEcB484xA8STRs2Bke2qTDxl1hqKk6xbRxa4SnktZaBkS42IManLbrjXONu7LPQ==' crossorigin='anonymous'/>
  <!-- Theme style -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.css' integrity='sha512-0w74+CBOlTu44j+e8dSKFl/5Qg9JoJhfK7Gf/+5bdtzJgqP7N3+02W02rQqRrywlm8cKXg3YwQWMBIS18GYPZg==' crossorigin='anonymous'/>
  <!-- Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <!-- SweetAlert2 -->
   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.12.4/sweetalert2.css' integrity='sha512-Gebe6n4xsNr0dWAiRsMbjWOYe1PPVar2zBKIyeUQKPeafXZ61sjU2XCW66JxIPbDdEH3oQspEoWX8PQRhaKyBA==' crossorigin='anonymous'/>
   <!-- Ionicons -->
    
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../img/logo.webp" alt="" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <li class="nav-item">
        <form id="log-out">
          <a href="../index.php" class="nav-link">
            <i class="fas fa-sign-out-alt" title="Cerrar Sesion"></i>
          </a>
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../img/logo.webp" alt="F" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Banco de Preguntas</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../img/default_profile.jpeg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
          <?php
              echo $_SESSION['nombre'];
            ?>
          </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php
               if($_SESSION['us_tipo'] == 1) {
                ?>
               <li class="nav-header">Usuario</li>
               <li class="nav-item">
            <a href="adm_catalogo.php" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Gestionar Usuario
              </p>
            </a>
          </li>
          <?php
               } 
          ?>
          <li class="nav-header">Materias</li>
          <li class="nav-item">
            <a href="adm_materia.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Gestionar Materias
              </p>
            </a>
          </li>
          <li class="nav-header">Temario</li>
          <li class="nav-item">
            <a href="adm_temario.php" class="nav-link">
              <i class="nav-icon fas fa-magnifying-glass"></i>
              <p>
                Gestionar Temarios
              </p>
            </a>
          </li>
          <li class="nav-header">Preguntas</li>
          <li class="nav-item">
            <a href="adm_preguntas.php" class="nav-link">
              <i class="nav-icon fas fa-question"></i>
              <p>
                Gestionar Preguntas
              </p>
            </a>
          </li>
          <li class="nav-header">Examenes</li>
          <li class="nav-item">
            <a href="adm_examenes.php" class="nav-link">
              <i class="nav-icon fas fa-file-circle-plus"></i>
              <p>
                Generar Examen
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>