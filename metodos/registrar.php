<?php

session_start();

require '../config/db.php';

$email = $cn->real_escape_string($_POST['email']);

$usuario = $cn->real_escape_string($_POST['usuario']);

$password = $cn->real_escape_string($_POST['password']);

$phone = $cn->real_escape_string($_POST['phone']);

$sql = "SELECT * FROM `usuarios` WHERE email = '$email' LIMIT 1;";

$resultado = $cn->query($sql);

if($resultado){

    if($resultado->num_rows > 0){

        $_SESSION['UserID'] = null;
        $_SESSION['msg'] = "Ya existe un usuario con el este email";
        header("Location: ../views/index.php");
        exit;
       
        
    }else{
        
        $sql= "INSERT INTO usuarios(email,Usuario,`password`,fecha,telefono) VALUES ('$email','$usuario','$password',NOW(),'$phone');";
        if ($cn->query($sql)) {
            $id = $cn->insert_id;
            $_SESSION['UserID'] = $id;
            $_SESSION['UserName'] = $usuario;
            $_SESSION['msg'] = "Usuario registrado correctamente";
            header("Location: ../views/index.php");
            exit;
        } else{
            $_SESSION['UserID'] = null;
            $_SESSION['msg'] .= "Error en la conexion a base de datos";
            header("Location: ../views/index.php");
            exit;
        }
       
    }
}else{
    $_SESSION['UserID'] = null;
    $_SESSION['msg'] .= "Error en la conexion a base de datos";
    header("Location: ../views/index.php");
    exit;
}

