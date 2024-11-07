<?php 

class Contato {

	private $pdo;

	public function __construct() {
<<<<<<<< HEAD:app/testeContato_2.class.php
		// $this->pdo = new PDO("mysql:dbname=crudoo;host=192.168.1.152", "root", "root");
		$this->pdo = new PDO("mysql:dbname=crudoo;host=localhost", "root", "");
========
		$this->pdo = new PDO("mysql:dbname=crudoo;host=mysql", "root", "root");
>>>>>>>> 4a625ccc505e417a3bcc9d2ee2caf28b3d416bf7:app/lixo/Contato_2.class.php
	}

	public function adicionar($email, $nome = '') {
		if($this->existeEmail($email) == false) {
			$sql = "INSERT INTO contatos (nome, email) VALUES (:nome, :email)";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':nome', $nome);
			$sql->bindValue(':email', $email);
			$sql->execute();

			return true;
		} else {
			return false;
		}
	}

	public function getInfo($id) {
		$sql = "SELECT * FROM contatos WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			return $sql->fetch();
		} else {
			return array();
		}
	}

	public function getAll() 
	{
		$sql = "SELECT * FROM contatos";
		$sql = $this->pdo->query($sql);

		if($sql->rowCount() > 0) {
			return $sql->fetchAll();
		} else {
			return array();
		}
	}

	public function editar($nome, $email, $id) {
		$sql = "UPDATE contatos SET nome = :nome, email = :email WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':email', $email);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}

	public function excluirPeloId($id) {
		$sql = "DELETE FROM contatos WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}

	public function excluirPeloEmail($email) {
		$sql = "DELETE FROM contatos WHERE email = :email";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':email', $email);
		$sql->execute();
	}

	private function existeEmail($email) 
	{
		$sql = "SELECT * FROM contatos WHERE email = :email";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':email', $email);
		$sql->execute();

		if($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}
}