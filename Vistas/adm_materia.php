<?php
session_start();
include_once 'layouts/nav.php';
?>
<title>Adm | Inicio</title>

<!-- Modal -->

<div class="modal fade" id="create_tema" tabindex="-1" role="dialog" aria-labelledby="exampleModall">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Crear Materia</h3>
                        <button data-bs-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">

                        <div class="alert alert-success text-center" id="edit_tema" style='display: none;'>
                            <span><i class="fas fa-check m-1"></i>Se Edito el Lote Correctamente</span>
                        </div>
                        <form id="form-materia">

                            <div class="form-group">
                                <label for="nombre_m">Nombre: </label>
                                <input id="nombre_m" type="text" class="form-control" placeholder="Nombre" requiered>
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
     <div class="modal fade" id="edit-materia" tabindex="-1" role="dialog" aria-labelledby="exampleModall">
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
    <div class="animate__animated animate__bounceInLeft modal fade" id="cambiologo" tabindex="-1" role="dialog" aria-labelledby="exampleModall">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cambiar Foto</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img id="logoactual" src="../img/Materias/DefaultProfile.png" alt="" class="profile-user-img img-fluid img-circle">
                    </div>

                    <div class="text-center">
                        <b id="nombre_logo">
                        </b>
                    </div>
                    <div class="alert alert-success text-center" id="edit" style='display: none;'>
                        <span><i class="fas fa-check m-1"></i>Se cambio el Logo Correctamente</span>
                    </div>

                    <div class="alert alert-danger text-center" id="noedit" style='display: none;'>
                        <span><i class="fas fa-times m-1"></i>Formato no Soportado</span>
                    </div>
                    <form id="form-logo" enctype="multipart/form-data">
                        <div class="input-group mb-3 ml-5 mt-2">
                            <input type="file" name ="photo" class="input-group">
                            <input type="hidden" name="funcion" id="funcion">
                            <input type="hidden" name="id_logo_mat" id="id_logo_mat">
                            <input type="hidden" name="avatar_h" id="avatar_h">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn bg-gradient-primary">Guardar</button>
                    </form>
                </div>
            </div>
    </div>
</div>



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
          <div class="col-12 col-sm-14 col-md-13 mx-auto">
            <div class="card">
                    <h5 class="card-header bg-success">Materias Registradas <button class="btn btn-primary ml-2" data-bs-toggle="modal" data-bs-target="#create_tema"> Agregar Materias</button></h5>
                    <div class="card-body">
                    <table class="table table-dark table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-md-2">Icono</th>
                                    <th scope="col" class="col-md-2">ID</th>
                                    <th scope="col" class="col-md-2">Materia</th>
                                    <th scope="col" class="col-md-1">Activo/Status</th>
                                    <th scope="col" class="col-md-2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="materias" class="table-active">

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="text-muted">Status 0 = Activo</div>
                        <div class="text-muted">Status 1 = Inactivo</div>
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
  <script src="../js/Materia.js"></script>