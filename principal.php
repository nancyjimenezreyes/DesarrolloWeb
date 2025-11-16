<?php include("db.php"); ?>


<?php include('includes/header.php'); ?>

<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MENSAJES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!--  FORMULARIO DE USUARIO -->
      <div class="card card-body">
        <form action="grabar_usuario.php" method="POST">
          <div class="form-group">
            <input type="text" name="user" class="form-control" placeholder="Ingrese Usuario" autofocus>
          </div>
          <div class="form-group">
            <textarea name="nombre" rows="1" class="form-control" placeholder="Ingrese Nombre"></textarea>
          </div>

          <div class="form-group">
            <textarea name="red" rows="1" class="form-control" placeholder="Ingrese Cargo"></textarea>
          </div>

          <div class="form-group">
            <textarea name="email" rows="1" class="form-control" placeholder="Ingrese correo"></textarea>
          </div>

           <div class="form-group">
            <textarea name="pass" rows="1" class="form-control" placeholder="Ingrese contraseña"></textarea>
          </div>

          <input type="submit" name="save_usuario" class="btn btn-success btn-block" value="Guardar Usuario">
          


        </form>
      </div>
    </div>

    <!--  LISTAR INFORMACION DE USUARIO -->
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Cargo</th>
            <th>Email</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM login";
                 

          $result_login = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_login)) { ?>
          <tr>
            <td><?php echo $row['user']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['red']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
             <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
                
              </a>
              <a href="delete_usuario.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
