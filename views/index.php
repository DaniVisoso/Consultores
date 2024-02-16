<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/d1f44f5a74.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../style.css">
  <link rel="shortcut icon" href="../log/CO.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Consultor-ES</title>
</head>
<body>
    <header>
        <h2 class="logo"></h2>

        <nav class="navegacion">
            <a href="#">¿Que es un consultor?</a>
            <a href="#">¿Por que un consultor?</a>
            <a href="#">¿Tienes un proyecto?</a>
            <a href="#">¿Quienes somos?</a>
            <a href="#">Preguntanos</a>
            <a href="#">Misión y Visión</a>
            <?php if (!isset($_SESSION['UserID'])) { ?>
                <button class="btn">Iniciar Sesión</button>
            <?php } else { ?>
                <button class="btn">Cerrar Sesión</button>
            <?php } ?>

        </nav>
    </header>

    <div class="fondo">
        <span class="icono-cerrar"><i class="fa-solid fa-xmark"></i></span>

        <div class="contenedor-form login">
                    <h2>Iniciar Sesion</h2>
        <form action="../metodos/loggear.php" method="post">
            <div class="contenedor-input">
                <span class="icono"><i class="fa-solid fa-envelope"></i></span>
                <input type="email" name="email" id="email" required>
                <label for="#">Email</label>
            </div>

            <div class="contenedor-input">
                <span class="icono"><i class="fa-solid fa-lock"></i></span>
                <input type="password" name="password" id="password" required>
                <label for="#">Contraseña</label>
            </div>

            <div class="recordar">
                <label for="#"><input type="checkbox" name="recordar">Recordar Sesion</label>
                <a href="#">¿Olvidaste la Contraseña?</a>
            </div>

            <button type="submit" class="btn">Registrarse</button>

            
        </form>
            <div class="registrar">
                <p>¿Ya tienes una cuenta? <a href="#" class="registrar-link">Iniciar Sesión</a></p>
            </div>
        </div>

        <div class="contenedor-form registrar">
            <h2 class="text-black">Registrarse</h2>
            <form action="../metodos/registrar.php" method="post">
                
                 <div class="contenedor-input">
                    <span class="icono"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" name="email" id ="email" required>
                    <label for="#">Email</label>
                </div>

                <div class="contenedor-input">
                    <span class="icono"><i class="fa-solid fa-user"></i></span>
                    <input type="text" name="usuario" id ="usuario" required>
                    <label for="#">Nombre de Usuario</label>
                </div>

                <div class="contenedor-input">
                    <span class="icono"><i class="fa-solid fa-user"></i></span>
                    <input type="number" name="phone" id ="phone" required>
                    <label for="#">Nombre de Usuario</label>
                </div>

                <div class="contenedor-input">
                    <span class="icono"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="password" id ="password" required>
                    <label for="#">Contraseña</label>
                </div>

                <div class="recordar">
                    <label for="#"><input type="checkbox" require>Acepto los terminos y condiciones</label>
                </div>

                <button type="submit" class="btn">Registrarme</button>

            </form>
            <div class="registrar">
                    <p>¿Tienes una cuenta? <a href="#" class="login-link">Iniciar Sesio</a></p>
                </div>
        </div>
    </div>
    <script src="../app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

