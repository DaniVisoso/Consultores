<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styleDoni.css">
</head>
<body>
<section class="text-center text-lg-start">
  <style>
    .cascading-right {
      margin-right: -50px;
    }

    @media (max-width: 991.98px) {
      .cascading-right {
        margin-right: 0;
      }
    }
  </style>

  <div class="container py-4">
    <div class="row g-0 align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
          <div class="card-body p-5 shadow-5 text-center">
            <h2 class="fw-bold mb-5">Registro</h2>

            <?php if(isset($_SESSION['msg'])) { ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['msg']; ?> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
              unset($_SESSION['msg']);
            } ?>

            <form action="../metodos/registrar.php" method="POST">

            <div class="form-outline mb-1">
                <input type="text" id="usuario" name="usuario" class="form-control text-center" placeholder="Ingresa un Usuario" require value="<?php echo isset($_SESSION['usuario']) ? $_SESSION['usuario'] : ''; ?>"/>
                <label class="form-label" for="usuario">Usuario</label>
              </div>

              <div class="form-outline mb-1">
                <input type="email" id="email" name="email" class="form-control text-center" placeholder="Ingresa tu Correo Electrónico" require value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>"/>
                <label class="form-label" for="email">Correo Electrónico</label>
              </div>

              <?php if(isset($_SESSION['wrongPassword'])) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['wrongPassword']; ?> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                unset($_SESSION['wrongPassword']);
                } ?>

              <div class="form-outline mb-1">
                <input type="password" id="password" name="password" class="form-control text-center" placeholder="Ingresa la Contraseña" require value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : ''; ?>"/>
                <label class="form-label" for="password">Contraseña</label>
              </div>

              <div class="form-outline mb-1">
                <input type="password" id="passwordConfirm" name="passwordConfirm" class="form-control text-center" placeholder="Confirma la Contraseña" require value="<?php echo isset($_SESSION['passwordConfirm']) ? $_SESSION['passwordConfirm'] : ''; ?>"/>
                <label class="form-label" for="passwordConfirm">Confirmar Contraseña</label>
              </div>

              <div class="form-outline mb-1">
                <input type="number" id="phone" name="phone" class="form-control text-center" placeholder="Registra tu número telefónico" require value="<?php echo isset($_SESSION['phone']) ? $_SESSION['phone'] : ''; ?>"/>
                <label class="form-label" for="phone">Teléfono</label>
              </div>

              <button type="submit" class="btn btn-primary text-white w-100 mt-1 px-3 fw-semibold shadow-sm">
                Registar
              </button>
            </form>
              <div class="form-check d-flex justify-content-center mt-4 gap-2">
                <label class="form-check-label" for="form2Example33">¿Ya tienes una Cuenta?</label>
                <a id="limpiarSesiones" href="login.php" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">¡Inicia Sesión aqui!</a>
              </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0">
        <img src="../log/lentes.png" class="w-100 rounded-4 shadow-4"
          alt="" />
      </div>
    </div>
  </div>
</section>


<script>
    var cerrarSesionBtn = document.getElementById('limpiarSesiones');

    cerrarSesionBtn.addEventListener('click', function() {
       <?php
       $_SESSION['email'] = null;
       $_SESSION['usuario'] = null;
       $_SESSION['password'] = null;
       $_SESSION['passwordConfirm'] = null;
       $_SESSION['phone'] = null;
       ?>
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>