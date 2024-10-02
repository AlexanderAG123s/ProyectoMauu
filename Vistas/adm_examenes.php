<?php
session_start();
if ($_SESSION['us_tipo'] == 1) {
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
                        <h3 class="card-title">Generar Examen</h3>
                        <button data-bs-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">

                        <div class="alert alert-danger text-center" id="warning" style='display: none;'>
                            <span><i class="fas fa-times m-1"></i>No se encontraron preguntas</span>
                        </div>
                        <form id="form-question">
                            <div class="form-group">
                                <label for="asignatura_e">Materia: </label>
                                <select id="asignatura_e" style="width: 200px;" class="form-control select select2-dark" placeholder="" requiered>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="parcial_e">Parcial: </label>
                                <select id="parcial_e" style="width: 200px;" class="form-control select select2-dark" placeholder="" requiered>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tema:</label>
                                <div class="contents" id="checks">

                                </div>
                            </div>

                            <!-- <input type="hidden" id="id_lote_prod"> -->
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn bg-gradient-primary float-right m-1">Guardar</button>
                        <button type="button" data-bs-dismiss="modal" class="btn btn-outline-secondary float-right m-1">Cerrar</button>
                        <button type="button" class="refresh btn btn-outline-info float-right m-1">Buscar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="generar_pdf_random" tabindex="-1" role="dialog" aria-labelledby="exampleModall">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Generar Aleatorio</h3>
                        <button data-bs-dismiss="modal" aria-label="close" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">

                        <div class="alert alert-danger text-center" id="warning" style='display: none;'>
                            <span><i class="fas fa-times m-1"></i>No se encontraron preguntas</span>
                        </div>
                        <form id="form-question_r">
                            <div class="form-group">
                                <label for="asignatura_e_r">Materia: </label>
                                <select id="asignatura_e_r" style="width: 200px;" class="form-control select select2-dark" placeholder="" requiered>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="parcial_e_r">Parcial: </label>
                                <select id="parcial_e_r" style="width: 200px;" class="form-control select select2-dark" placeholder="" requiered>
                                </select>
                            </div>
                            
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
                    <div class="col-10 col-sm-10 col-md-10 mx-auto">
                        <div class="card">
                            <h5 class="card-header bg"> Opciones de Examenes</h5>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-15 mb-15 mb-sm-15">
                                        <div class="card card  border-light mb-3 ml-3" style="max-width: 18rem;">
                                            <div class="card-header">Examen Aleatorio</div>
                                            <div class="card-body">
                                                <h5 class="card-title">Examen con Preguntas Aleatorias</h5>
                                                <p class="card-text pt-2 pb-4">Se creara un examen con preguntas aleatorias donde se elegira por tema y el numero de preguntas</p>
                                            </div>
                                            <div class="card-footer"><button class="random btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#generar_pdf_random">Generar PDF</button></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-15 mb-15 mb-sm-15">
                                        <div class="card card border-light mb-3 ml-4" style="max-width: 18rem;">
                                            <div class="card-header">Examen con Seleccion</div>
                                            <div class="card-body">
                                                <h5 class="card-title">Examen con Preguntas Seleccionadas</h5>
                                                <p class="card-text pt-2">Se creara un examen con preguntas seleccionadas por el docente donde se elegira el tema y las preguntas</p>
                                            </div>
                                            <div class="card-footer"><button type="button" data-bs-toggle="modal" data-bs-target="#create_user" class="selected btn btn-primary float-right">Generar PDF</button></div>
                                        </div>
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
    <script src="../js/Examen.js"></script>

<?php
}
?>