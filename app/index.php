<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Agenda de Contatos CRUD</title>

	<link rel="stylesheet" href="assets\bootstrap\css\bootstrap.min">
	<link rel="stylesheet" href="assets\css\style.css">

	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/navbar-animation-fix.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	
</body>
</html>
<?php

include 'Contato.class.php';

$contato = new Contato();

?>

<div class="container">
<h1> Contatos</h1>

<a href="adicionar.php">[ ADICIONAR ]</a>
<table class="table" border="1" width="500">
	<tr>
		<th>ID</th>
		<th>NOME</th>
		<th>E-MAIL</th>
		<th>AÇÃO</th>
	</tr>

	<?php
	$lista = $contato->getAll();
	foreach($lista as $item):
	?>
	<tr>
		<td><?php echo $item['id']; ?></td>
		<td><?php echo $item['nome']; ?></td>
		<td><?php echo $item['email']; ?></td>
		<td>
			<a href="editar.php?id=<?php echo $item['id']; ?>">[ EDITAR ]</a>
			<a href="excluir.php?id=<?php echo $item['id']; ?>">[ EXCLUIR ] </a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
</div>