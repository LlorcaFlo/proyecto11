<?php
// Si NO EXISTE nada dentro de $_POST 
		if (! isset($_POST['nick'])) {
					//$errores['nombre']
					echo 'No he recibido el nombre';
			}else{
					if (strlen($_POST['nick']) < 3){
						echo "<p class=''>Nick demasiado corto</p>";
			}else{
					echo $_POST['nick'];
				}
			}