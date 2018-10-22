<form action="index.php" method="POST">
	<div class="row">
			<div class="col-3">
			</div>
			<div class="col-6">
<h4>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" class="form-control" name="nombre" placeholder="Nombre"

				<?php mostrar_campo('nombre') ?>
		>
				<?php mostrar_error_campo('nombre', $errores) ?>
			</div>
			<div class="form-group">
				<label for="apellido">Apellidos</label>
				<input type="text" class="form-control" name="apellido" placeholder="Apellido"

				<?php mostrar_campo('apellido') ?>
		>
				<?php mostrar_error_campo('apellido', $errores) ?>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" class="form-control"  placeholder="Ejemplo@ejemplo.com"
				<?php mostrar_campo('email') ?>
		>
				<?php mostrar_error_campo('email', $errores); ?>
			</div>
			<div class="form-group">
				<label for="clave1">Clave</label>
				<input type="password" name="clave1" class="form-control" placeholder="Abcdefg1">
				<?php mostrar_error_campo('clave1', $errores) ?>
	</div>
			<div class="form-group">
				<label for="password">Repetir Clave</label>
				<input type="password" name="clave2" class="form-control" placeholder="Abcdefg1" >

			</div>

			<div class="form-group">
				<label for="codigopostal">Código Postal</label>
				<input type="postal-code" name="codigopostal" class="form-control" placeholder="00000" size="5"
				<?php mostrar_campo('codigopostal') ?>
				>
				<?php mostrar_error_campo('codigopostal', $errores); ?>
			</div>
			<div class="form-group">
				<label for="telefono">Teléfono</label>
				<input type="text" name="telefono" class="form-control" placeholder="000000000" size="7"
				<?php mostrar_campo('telefono') ?>
				>
				<?php mostrar_error_campo('telefono', $errores); ?>
			</div>
</h4>
<button type="submit" class="btn btn-primary">Enviar</button>
<div>

</div>
</form>
