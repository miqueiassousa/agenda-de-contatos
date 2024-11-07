<?php

class Contato
{
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:dbname=crudoo;host=localhost", "root", "");
        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
            exit;
        }
    }

    public function adicionar($email, $celular, $nome = '') {
        if ($this->existeEmail($email) == false) {
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

    public function getInfo($id) {
        $sql = "SELECT * FROM contatos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        return $sql->rowCount() > 0 ? $sql->fetch() : array();
    }

    public function getAll() {
        $sql = "SELECT * FROM contatos";
        $sql = $this->pdo->query($sql);

        return $sql->rowCount() > 0 ? $sql->fetchAll() : array();
    }

    public function editar($nome, $email, $id) {
        if ($email == $this->getCurrentEmailById($id) || $this->existeEmail($email, $id) == false) {
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

    private function getCurrentEmailById($id) {
        $sql = "SELECT email FROM contatos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        return $sql->rowCount() > 0 ? $sql->fetch()['email'] : null;
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

    private function existeEmail($email, $id = null) {
        $sql = "SELECT * FROM contatos WHERE email = :email";
        if ($id !== null) {
            $sql .= " AND id != :id";
        }
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        if ($id !== null) {
            $sql->bindValue(':id', $id);
        }
        $sql->execute();

        return $sql->rowCount() > 0;
    }
}
