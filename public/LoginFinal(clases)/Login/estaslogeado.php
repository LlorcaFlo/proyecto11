<meta charset="utf-8">
<title>Estas Logeado</title>
 <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
    <form action="valida_login.php" method="POST">
        <div class="col-3">
            <br>
            <?php 
            session_start();
            echo "<p>Ya estás logueado como: <span style=\"color:rgba(200,200,50,0.9);\">" . $_SESSION['user']['nick'] . "</span></p>";
            ?>
            <br>
           <div class="form-group">
        </div>
       <div class="form-group">
         <br>
        <a class="btn" href="../paginaprincipal.php">Inicio</a><br><br>
        <a class="btn" href="../Pagina/perfil.php">Perfil</a><br><br>
       </div>
      <br><br>
  </div>

</form>