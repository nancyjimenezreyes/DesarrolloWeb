<?php
session_start();
$fes = date("Y-m-d");
include 'db.php';
$usuario=$_POST["usuario"];
$contrasena=$_POST["contrasena"]; 		
$inred=$_POST["inred"]; 
if($inred=='/')$inred='';


 $stmt = $conn->prepare("SELECT pass FROM login WHERE user = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->bind_result($hash);
    $stmt->fetch();


    if (!password_verify($contrasena, $hash)) {
        $_SESSION['usuario'] = $usuario;
        header("Location: principal.php");
        exit();
    } else {
        echo "Credenciales incorrectas.";
    }

    $stmt->close();
    $conn->close();

	
	
?>