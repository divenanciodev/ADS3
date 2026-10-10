<?php

require_once __DIR__ . '/../model/Cliente.php';
require_once __DIR__ . '/../config/Database.php';

class ClienteDAO {

    public function save(Cliente $cliente): bool
    {
        $pdo = Database::getConnection();

        $sql = "INSERT INTO clientes (nome, email, telefone) VALUES (:nome, :email, :telefone)";
        $stmt = $pdo->prepare($sql);

        return $stmt->execute([
            ':nome'     => $cliente->getNome(),
            ':email'    => $cliente->getEmail(),
            ':telefone' => $cliente->getTelefone(),
        ]);
    }

    public function findAll(): array
    {
        $pdo = Database::getConnection();

        $sql = "SELECT id, nome, email, telefone FROM clientes ORDER BY nome";
        $stmt = $pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?array
    {
        $pdo = Database::getConnection();

        $sql = "SELECT id, nome, email, telefone FROM clientes WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

        return $cliente ?: null;
    }

    public function update(int $id, Cliente $cliente): bool
    {
        $pdo = Database::getConnection();

        $sql = "UPDATE clientes SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        return $stmt->execute([
            ':nome'     => $cliente->getNome(),
            ':email'    => $cliente->getEmail(),
            ':telefone' => $cliente->getTelefone(),
            ':id'       => $id,
        ]);
    }

    public function delete(int $id): bool
    {
        $pdo = Database::getConnection();

        $sql = "DELETE FROM clientes WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        return $stmt->execute([':id' => $id]);
    }

}
