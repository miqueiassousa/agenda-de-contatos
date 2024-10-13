<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Agenda de Contatos CRUD</title>

	<link rel="stylesheet" href="assets\bootstrap\css\bootstrap.min">

	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/navbar-animation-fix.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>

	<div class="container">
		<h1>Adicionar</h1>

		<form method="POST" action="adicionar_submit.php">
			<div class="form-group">
				NOME:<br />
				<input class="form-control" type="text" name="nome" /><br /> <br />

				E-mail:<br />
				<input class="form-control" type="email" name="email" /><br /><br />

				<input class="btn btn-primary" type="submit" value="Adicionar">
			</div>

		</form>
	</div>
</body>