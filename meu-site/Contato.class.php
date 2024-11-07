<?php 

class Contato {

	private $pdo;

	public function __construct() {
		// $this->pdo = new PDO("mysql:dbname=crudoo;host=192.168.1.152", "root", "root");
		$this->pdo = new PDO("mysql:dbname=crudoo;host=localhost", "root", "");
	}

	public function adicionar( $nome = '', $email, $celular) {
		if($this->existeEmail($email) == false) {
			$sql = "INSERT INTO contatos (nome, email, celular) VALUES (:nome, :email, :celular)";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':nome', $nome);
			$sql->bindValue(':email', $email);
			$sql->bindValue(':celular', $celular);
			$sql->execute();

			return true;
		} else {
			return false;
		}
	}

	// public function adicionar($email, $celular, $nome = '') {
	// 	if ($this->existeEmail($email) == false) {
	// 		try {
	// 			$sql = "INSERT INTO contatos (nome, email, celular) VALUES (:nome, :email, :celular)";
	// 			$stmt = $this->pdo->prepare($sql);
	// 			$stmt->bindValue(':nome', $nome);
	// 			$stmt->bindValue(':email', $email);
	// 			$stmt->bindValue(':celular', $celular);
				
	// 			// Executa a consulta
	// 			if ($stmt->execute()) {
	// 				return true;
	// 			} else {
	// 				// Se a execução falhar, exibe os erros da consulta
	// 				$errorInfo = $stmt->errorInfo();
	// 				echo "Erro na execução: " . $errorInfo[2];
	// 				return false;
	// 			}
	// 		} catch (PDOException $e) {
	// 			echo "Erro ao adicionar contato: " . $e->getMessage();
	// 			return false;
	// 		}
	// 	} else {
	// 		return false;  // O email já existe
	// 	}
	// }
	

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
		if($this->existeEmail($email) == false) {
			$sql = "UPDATE contatos SET nome = :nome, email = :email WHERE id = :id";
			$sql = $this->pdo->prepare($sql);
			$sql->bindValue(':nome', $nome);
			$sql->bindValue(':email', $email);
			$sql->bindValue(':id', $id);
			$sql->execute();

			return true;
		} else {
			return false;
		}
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