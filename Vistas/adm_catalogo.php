<?php
     session_start();
     if($_SESSION['us_tipo'] == 1) {
        include_once 'layouts/header.php';
?>
<?php
include_once 'layouts/nav.php';
?>
<title>Adm | Inicio</title>

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
                                <label for="clave">Clave: </label>
                                <input id="clave" type="text" class="form-control" placeholder="Clave" requiered>
                            </div>
                            <div class="form-group">
                                <label for="password">Password: </label>
                                <input id="password" type="password" class="form-control" placeholder="Contraseña" requiered>
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
                        <button type="button" data-bs-dismiss="modal" class="generar-r btn btn-outline-secondary float-right m-1">Cerrar</button>
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
                                <label for="clave_e">Clave: </label>
                                <input id="clave_e" type="text" class="form-control" placeholder="Clave" requiered>
                            </div>
                            <div class="form-group">
                                <label for="pass_e">Password: </label>
                                <input id="pass_e" type="text" class="form-control" placeholder="Contraseña" requiered>
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



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Catalogo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Catalogo</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-14 col-md-13">
            <div class="card">
                    <h5 class="card-header bg-success">Usuarios Registrados <button class="btn btn-primary ml-2" data-bs-toggle="modal" data-bs-target="#create_user"> Crear Usuario</button></h5>
                    <div class="card-body">
                    <table class="table table-dark table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">N.Control</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Tipo de Usuario</th>
                                    <th scope="col">Accion</th>
                                </tr>
                            </thead>
                            <tbody id="users" class="table-active">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            
                
              
                  
                 
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              
        <!-- /.row -->

        
                  
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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