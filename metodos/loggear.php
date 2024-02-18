<?php

session_start();

require '../config/db.php';

$email = $cn->real_escape_string($_POST['email']);

$password = $cn->real_escape_string($_POST['password']);

$sql = "SELECT * FROM `usuarios` WHERE email = '$email' AND `password` = '$password' LIMIT 1";

$resultado = $cn->query($sql);

if($resultado){

    if($resultado->num_rows > 0){
        $fila = $resultado->fetch_assoc();
        $ID = $fila['ID'];
        $usuario = $fila['usuario'];
        $_SESSION['UserID'] = $ID;
        $_SESSION['UserName'] = $usuario;
        $_SESSION['errorEmail'] = null;
        $_SESSION['errorPassword'] = null;
        header("Location: ../views/index.php");
        exit;
        
    }else{
        $_SESSION['usuario_id'] = null;
        $_SESSION['msg'] = "Usuario no econtrado";
        $_SESSION['errorEmail'] = $email;
        $_SESSION['errorPassword'] = $password;
        header("Location: ../views/login.php");
        exit;
    }
}else{
    $_SESSION['UserID'] = null;
    $_SESSION['msg'] = "Error en la conexion a base de datos";
    header("Location: ../views/index.php");
    exit;
}

