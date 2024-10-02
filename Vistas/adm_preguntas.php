<?php
    session_start();
    if($_SESSION['us_tipo'] == 1 || $_SESSION['us_tipo'] == 2) {
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
                        <h3 class="card-title">Crear Pregunta</h3>
                        <button data-bs-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">

                        <div class="alert alert-success text-center" id="edit_user" style='display: none;'>
                            <span><i class="fas fa-check m-1"></i>Se Edito el Lote Correctamente</span>
                        </div>
                        <form id="form-question">

                            <div class="form-group">
                                <label for="question">Pregunta: </label>
                                <input id="question" type="text" class="form-control" placeholder="Pregunta" requiered>
                            </div>
                            <div class="form-group">
                                <label for="answer_f1">Respuesta 1: </label>
                                <input id="answer_f1" type="text" class="form-control" placeholder="Respuesta 1" requiered>
                            </div>
                            <div class="form-group">
                                <label for="answer_f2">Respuesta 2: </label>
                                <input id="answer_f2" type="text" class="form-control" placeholder="Respuesta 2" requiered>
                            </div>
                            <div class="form-group">
                                <label for="answer_c">Respuesta Correcta: </label>
                                <input id="answer_c" type="text" class="form-control" placeholder="Respuesta Correcta" requiered>
                            </div>
                            <div class="form-group">
                                <label for="asignaturas_q">Materia: </label>
                                <select id="asignaturas_q" style="width: 200px;" class="form-control select select2-dark" placeholder="" requiered> 
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="temas_q">Tema: </label>
                                <select id="temas_q" style="width: 200px;" class="form-control select select2-dark" placeholder="" requiered> 
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
     <div class="modal fade" id="edit-question" tabindex="-1" role="dialog" aria-labelledby="exampleModall">
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
                        <form id="edit_question">

                        <div class="form-group">
                                <label for="question_e">Pregunta: </label>
                                <input id="question_e" type="text" class="form-control" placeholder="Pregunta" requiered>
                            </div>
                            <div class="form-group">
                                <label for="answer_f1_e">Respuesta 1: </label>
                                <input id="answer_f1_e" type="text" class="form-control" placeholder="Respuesta 1" requiered>
                            </div>
                            <div class="form-group">
                                <label for="answer_f2_e">Respuesta 2: </label>
                                <input id="answer_f2_e" type="text" class="form-control" placeholder="Respuesta 2" requiered>
                            </div>
                            <div class="form-group">
                                <label for="answer_c_e">Respuesta Correcta: </label>
                                <input id="answer_c_e" type="text" class="form-control" placeholder="Respuesta Correcta" requiered>
                            </div>
                            <div class="form-group">
                                <label for="asignaturas_q_e">Materia: </label>
                                <select id="asignaturas_q_e" style="width: 200px;" class="form-control select select2-dark" placeholder="" requiered> 
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="temas_q_e">Materia: </label>
                                <select id="temas_q_e" style="width: 200px;" class="form-control select select2-dark" placeholder="" requiered> 
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
                    <h5 class="card-header bg-success">Preguntas Registradas <button class="btn btn-primary ml-2" data-bs-toggle="modal" data-bs-target="#create_user"> Crear Pregunta</button></h5>
                    <div class="card-body">
                    <table class="table table-dark table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Pregunta</th>
                                    <th scope="col">Respuesta Correcta</th>
                                    <th scope="col">Tema</th>
                                    <th scope="col">Asignatura</th>
                                </tr>
                            </thead>
                            <tbody id="preguntas" class="table-active">

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
  <script src="../js/Questions.js"></script>

<?php 
    }
?>