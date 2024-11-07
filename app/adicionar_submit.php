<?php
include 'Contato.class.php';
$contato = new Contato();

if(!empty($_POST['email'])) {
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$celular = $_POST['celular'];

	$contato->adicionar($nome, $email, $celular);

	header("Location: index.php");
}