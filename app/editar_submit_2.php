<?php
include 'contato.class.php';
$contato = new Contato();

var_dump($nome, $email);

if(!empty($_POST['id'])) {
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$id = $_POST['id'];

	if(!empty($email)) {
		$contato->editar($nome, $email, $id);
	}

	header("Location: index.php");
}