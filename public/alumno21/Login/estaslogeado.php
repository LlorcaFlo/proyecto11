<meta charset="utf-8">
<title>Estás Logeado</title>
 <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
    <form action="valida_login.php" method="POST">
        <div class="col-3">
            <br>
            <div class="form-group">
            <?php 
            session_start();
            echo "<p>Ya estás logueado como: <span style=\"color:rgba(200,200,50,0.9);\">" . $_SESSION['user']['nickname'] . "</span></p>";
            ?>
            <br>
           
        </div>
       <div class="form-group">
         <br>
        <a class="btn" href="../index.php">Inicio</a><br><br>
        <a class="btn" href="../Pagina/perfil.php">Perfil</a><br><br>
       </div>
      <br><br>
  </div>

</form>