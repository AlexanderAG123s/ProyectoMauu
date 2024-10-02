<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- AdminLTE 3 CSS -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css' integrity='sha512-IuO+tczf4J43RzbCMEFggCWW5JuX78IrCJRFFBoQEXNvGI6gkUw4OjuwMidiS4Lm9Q2lILzpJwZuMWuSEeT9UQ==' crossorigin='anonymous' />
  <!-- Boostrap 5 CSS -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css' integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==' crossorigin='anonymous' />
  <!-- SweetAlert2 CSS -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.12.4/sweetalert2.css' integrity='sha512-Gebe6n4xsNr0dWAiRsMbjWOYe1PPVar2zBKIyeUQKPeafXZ61sjU2XCW66JxIPbDdEH3oQspEoWX8PQRhaKyBA==' crossorigin='anonymous' />
  <!-- Personal CSS -->
  <link rel="stylesheet" href="css/styles.css">
  <!-- FontAwesome -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css' integrity='sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==' crossorigin='anonymous' />
</head>



<body class="login-page" style="min-height: 466px;">
  <div class="login-box">

    <div class="card card-outline card-danger">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Iniciar </b>Sesion</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Ingresa tus credenciales para continuar</p>
        <form id="form-login">
          <div class="input-group mb-3">
            <input type="text" id="usuario_l" name="usuario" class="form-control" placeholder="Usuario">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" id="pass_l" name="pass" class="form-control" placeholder="Contraseña">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <input type="hidden" id="us_tipo_i">
            <input type="hidden" value=" <?php 
            echo $_SESSION['usuario']; ?>" id="id_usuario">

          </div>
          <div class="row">

          </div>

          <div class="col-4">
            <button type="submit" class="btn btn-outline-danger btn-block" style="width:320px">Iniciar Sesion</button>
          </div>

      </div>
      </form>
    </div>

  </div>

  </div>



</body>
<!-- jQuery -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js' integrity='sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==' crossorigin='anonymous'></script>
<!-- Boostrap 5 JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- SweetAlert2 JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.12.4/sweetalert2.js' integrity='sha512-gliOcKXku0ZojC8u0LloNC2eK+YZRRf3AqstUr8HifTp6uM+7MJSHWZQio5nyBxaCcz7GLc84I7OmFO/DYTnWQ==' crossorigin='anonymous'></script>
<!-- Personal JS -->
<script src="js/Login.js"></script>
</html>