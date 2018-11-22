<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<link rel="stylesheet" type="text/css" href="estilo.css"></link>

<h1>Introduce tus datos</h1><br>
<form action="comprueba_login.php" method="post">

		<label for="nick">Nick: </label><br><br>
		<input type="text" name="nick" class="field"><br><br>
		<label for="password">Password: </label><br><br>
		<input type="password" name="password" class="field"><br><br>

		<input type="submit" class="btn btn-grey" name="Enviar" value="LOGIN">
</form>
</body>
</html>