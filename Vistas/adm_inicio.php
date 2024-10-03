<?php
    session_start();
    if($_SESSION['us_tipo'] == 1 || $_SESSION['us_tipo'] == 2) {
        include_once 'layouts/header.php';
?>
<?php
include_once 'layouts/nav.php';
?>
<title>Adm | Home</title>



<div class="content-wrapper" style="min-height: 2838.44px;">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Inicio</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Inicio</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title">Actualizaciones</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                Actualizaciones en esta Version:
            <ul>
                <li>Se Corrigieron errores en los PDF</li>
                <li>Se Añadieron las gestiones de usuario</li>
                <li>Se añadieron las gestiones de temarios</li>
                <li>Se Añadieron las gestiones de roles</li>
                <li>Se Añadió informacion general</li>
                <li>Se Añadió Cifrado de Contraseñas (Prueba)</li>
            </ul>


                </div>

        </div>

    </section>

</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>

<?php
include_once 'layouts/footer.php';
?>
<script src="../js/Catalogo.js"></script>
<?php
    }
?>