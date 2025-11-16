<?php
include("db.php");
$user = '';
$nombre= '';
$red= '';
$pass= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM login WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $user = $row['user'];
    $nombre = $row['nombre'];
    $red = $row['red'];
    $pass = $row['pass'];

  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $user= $_POST['user'];
  $nombre = $_POST['nombre'];
  $red = $_POST['red'];
  $pass = $_POST['pass'];

  $query = "UPDATE login set user = '$user', nombre = '$nombre', red = '$red', pass = '$pass' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Información actualizada satisfactoriamnete';
  $_SESSION['message_type'] = 'warning';
  header('Location: principal.php');
}

?>
<?php include('includes/header_actualizar_usuario.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <tr>Usuario</tr>
          <input name="user" type="text" class="form-control" value="<?php echo $user; ?>" placeholder="Actualizar usuario">
        </div>
        <div class="form-group">
          <tr>Nombre</tr>
        <textarea name="nombre" class="form-control" cols="30" rows="1"><?php echo $nombre;?></textarea>
        </div>
         <div class="form-group">
          <tr>Cargo</tr>
        <textarea name="red" class="form-control" cols="30" rows="1"><?php echo $red;?></textarea>
        </div>
         <div class="form-group">
          <tr>Contraseña</tr>
        <textarea name="pass" class="form-control" cols="30" rows="1"><?php echo $pass;?></textarea>
        </div>
        <div class="form-group">
        <button class="btn-success" name="update" class="btn btn-outline-success"> 
          
        Actualizar Información Usuarios

         
        </button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
