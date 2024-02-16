<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "consultoresdb";

$cn = new mysqli($servername, $username, $password, $database);

if($cn->connect_error){
    die("Error de conexion" . $cn->connect_error);
}