<meta charset="utf-8">
 <link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="../Css/estilo.css">
    <form action="valida_login.php" method="POST">
        <div class="col-4">
        <div class="form-group">
            <br>
            <?php 
            session_start();
            if($_SESSION['user']['nick']==false){
              $A=$_SESSION['user']['email'];
            }else{
              $A=$_SESSION['user']['nick'];
            }
            echo "<div>Ya estás logueado como: <h4 style=\"text-align: center; color:rgba(200,200,50,0.9);\">" . $A . "</h4></div>";
            ?>
            <br>
           
        </div>
       <div class="form-group">
         <br>
        <a class="btn" href="../paginaprincipal.php">Inicio</a><br><br>
        <a class="btn" href="../Pagina/perfil.php">Perfil</a><br><br>
       </div>
  </div>

</form>