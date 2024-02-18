<?php

session_start();

require '../config/db.php';

$email = $cn->real_escape_string($_POST['email']);

$usuario = $cn->real_escape_string($_POST['usuario']);

$password = $cn->real_escape_string($_POST['password']);

$passwordConfirm = $cn->real_escape_string($_POST['passwordConfirm']);

$phone = $cn->real_escape_string($_POST['phone']);

if($password != $passwordConfirm){
    $_SESSION['wrongPassword'] = "Las contraseñas deben ser iguales";
    $_SESSION['email'] = $email;
    $_SESSION['usuario'] = $usuario;
    $_SESSION['password'] = $password;
    $_SESSION['passwordConfirm'] = $passwordConfirm;
    $_SESSION['phone'] = $phone;
    header("Location: ../views/registro.php");
    exit;
}

$sql = "SELECT * FROM `usuarios` WHERE email = '$email' LIMIT 1;";

$resultado = $cn->query($sql);

if($resultado){

    if($resultado->num_rows > 0){

        $_SESSION['UserID'] = null;
        $_SESSION['msg'] = "Ya existe un usuario con el este email";
        $_SESSION['email'] = $email;
        $_SESSION['usuario'] = $usuario;
        $_SESSION['password'] = $password;
        $_SESSION['passwordConfirm'] = $passwordConfirm;
        $_SESSION['phone'] = $phone;
        header("Location: ../views/registro.php");
        exit;
       
        
    }else{
        
        $sql= "INSERT INTO usuarios(email,Usuario,`password`,fecha,telefono) VALUES ('$email','$usuario','$password',NOW(),'$phone');";
        if ($cn->query($sql)) {
            $id = $cn->insert_id;
            $_SESSION['UserID'] = $id;
            $_SESSION['UserName'] = $usuario;
            $_SESSION['msg'] = "Usuario registrado correctamente";
            $_SESSION['email'] = null;
            $_SESSION['usuario'] = null;
            $_SESSION['password'] = null;
            $_SESSION['passwordConfirm'] = null;
            $_SESSION['phone'] = null;
            header("Location: ../views/index.php");
            exit;
        } else{
            $_SESSION['UserID'] = null;
            $_SESSION['msg'] .= "Error en la conexion a base de datos";
            $_SESSION['email'] = null;
            $_SESSION['usuario'] = null;
            $_SESSION['password'] = null;
            $_SESSION['passwordConfirm'] = null;
            $_SESSION['phone'] = null;
            header("Location: ../views/registro.php");
            exit;
        }
    }
}else{
    $_SESSION['UserID'] = null;
    $_SESSION['msg'] = "Error en la conexion a base de datos";
    $_SESSION['email'] = null;
    $_SESSION['usuario'] = null;
    $_SESSION['password'] = null;
    $_SESSION['passwordConfirm'] = null;
    $_SESSION['phone'] = null;
    header("Location: ../views/registro.php");
    exit;
}

