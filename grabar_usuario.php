<?php

include('db.php');

if (isset($_POST['save_usuario'])) {
  $user = $_POST['user'];
  $nombre = $_POST['nombre'];
  $red = $_POST['red'];
  $pass = $_POST['pass'];
  $query = "INSERT INTO login(user,nombre,red,pass) VALUES ('$user', '$nombre', '$red', '$pass')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Error en consulta de inserción.");
  }

  $_SESSION['message'] = 'Información almacenada satisfactoriamente.';
  $_SESSION['message_type'] = 'success';
  header('Location: principal.php');

}

?>
