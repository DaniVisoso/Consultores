<?php

session_start();

$_SESSION['UserID'] = null;
$_SESSION['UserName'] = null;

header("Location: ../views/index.php");
exit;