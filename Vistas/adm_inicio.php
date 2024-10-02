<?php
    session_start();
    if($_SESSION['us_tipo'] == 1 || $_SESSION['us_tipo'] == 2) {
        include_once 'layouts/header.php';
?>
<?php
include_once 'layouts/nav.php';
?>
<title>Adm | Home</title>

<!-- Modal -->

<div class="modal fade" id="create_user" tabindex="-1" role="dialog" aria-labelledby="exampleModall">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Crear Usuario</h3>
                    <button data-bs-dismiss="modal" aria-label="close" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">

                    <div class="alert alert-success text-center" id="edit_user" style='display: none;'>
                        <span><i class="fas fa-check m-1"></i>Se Edito el Lote Correctamente</span>
                    </div>
                    <form id="register-form">

                        <div class="form-group">
                            <label for="nombre">Nombre: </label>
                            <input id="nombre" type="text" class="form-control" placeholder="Nombre" requiered>
                        </div>
                        <div class="form-group">
                            <label for="curp">CURP: </label>
                            <input id="curp" type="text" class="form-control" placeholder="CURP" requiered>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo: </label>
                            <input id="correo" type="text" class="form-control" placeholder="Correo" requiered>
                        </div>
                        <div class="form-group">
                            <label for="pass">Password: </label>
                            <input id="pass" type="password" class="form-control" placeholder="Password" requiered>
                        </div>
                        <div class="form-group">
                            <label for="activo">Activo: </label>
                            <select id="activo" class="form-control" requiered>
                                <option value="0">Activo</option>
                                <option value="1">Inactivo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tipo_us">Tipo de Usuario: </label>
                            <select id="tipo_us" style="width: 200px;" class="form-control select select2-dark" placeholder="" requiered>
                            </select>
                        </div>

                        <!-- <input type="hidden" id="id_lote_prod"> -->
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn bg-gradient-primary float-right m-1">Guardar</button>
                    <button type="button" data-bs-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Cerrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Editar Usuario -->
<div class="modal fade" id="edit-user" tabindex="-1" role="dialog" aria-labelledby="exampleModall">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Editar Usuario</h3>
                    <button data-bs-dismiss="modal" aria-label="close" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">

                    <div class="alert alert-success text-center" id="edit_user" style='display: none;'>
                        <span><i class="fas fa-check m-1"></i>Se Edito el Lote Correctamente</span>
                    </div>
                    <form id="form_edit">

                        <div class="form-group">
                            <label for="nombre_e">Nombre: </label>
                            <input id="nombre_e" type="text" class="form-control" placeholder="Nombre" requiered>
                        </div>
                        <div class="form-group">
                            <label for="curp_e">CURP: </label>
                            <input id="curp_e" type="text" class="form-control" placeholder="CURP" requiered>
                        </div>
                        <div class="form-group">
                            <label for="correo_e">Correo: </label>
                            <input id="correo_e" type="text" class="form-control" placeholder="Correo" requiered>
                        </div>
                        <div class="form-group">
                            <label for="pass_e">Password: </label>
                            <input id="pass_e" type="password" class="form-control" placeholder="Password" requiered>
                        </div>
                        <div class="form-group">
                            <label for="activo_e">Activo: </label>
                            <select id="activo_e" class="form-control" requiered>
                                <option value="0">Activo</option>
                                <option value="1">Inactivo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tipo_us_e">Tipo de Usuario: </label>
                            <select id="tipo_us_e" style="width: 200px;" class="form-control select select2-dark" placeholder="" requiered>
                            </select>
                        </div>

                        <!-- <input type="hidden" id="id_lote_prod"> -->
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn bg-gradient-primary float-right m-1">Guardar</button>
                    <button type="button" data-bs-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Cerrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->



<div class="content-wrapper" style="min-height: 2838.44px;">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blank Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Title</h3>
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
                Start creating your amazing application!
            </div>

            <div class="card-footer">
                Footer
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