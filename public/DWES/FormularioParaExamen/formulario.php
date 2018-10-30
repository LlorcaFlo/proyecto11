
<link rel="stylesheet" href="../css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="estilo.css"> -->
<form action="index.php" method="POST">
  <div class="form-group row">
	      <label for="nick">Nick</label>
  <div class="col-md-4 mb-3">
				<input type="text" class="form-control" name="nick" placeholder="Nick de usuario"><br>
</div>
</div>

				<label for="email">Email</label>
				<input type="email" name="email" class="form-control"  placeholder="Ejemplo@ejemplo.com"><br>
</div>
<div class="col-md-4 mb-3">
				<label for="clave1">Clave</label>
				<input type="password" name="clave1" class="form-control" placeholder="Abcdefg1"><br>
</div>
<div class="col-md-4 mb-3">
				<label for="password">Repetir Clave</label>
				<input type="password" name="clave2" class="form-control" placeholder="Abcdefg1" id="password"><br>
<div class="col-md-4 mb-3">

        <button type="submit" class="btn btn-primary">Enviar</button>
</div>

</form>
