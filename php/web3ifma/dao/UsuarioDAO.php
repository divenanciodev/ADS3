<?php

require_once __DIR__ . '/../model/Usuario.php';
require_once __DIR__ . '/../config/Database.php'; 

class UsuarioDAO{
    
public function save(Usuario $usuario): bool 
    {
        $pdo = Database::getConnection();

        $sql = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email)";
        $stmt = $pdo->prepare($sql);

        return $stmt->execute([
            ':nome'  => $usuario->getNome(),
            ':email' => $usuario->getEmail(),
        ]);
    }

    public function findAll(): array
    {
        $pdo = Database::getConnection();

        $sql = "SELECT id, nome, email FROM usuarios ORDER BY nome";
        $stmt = $pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?array
    {
        $pdo = Database::getConnection();

        $sql = "SELECT id, nome, email FROM usuarios WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        return $usuario ?: null;
    }

    public function update(int $id, Usuario $usuario): bool
    {
        $pdo = Database::getConnection();

        $sql = "UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        return $stmt->execute([
            ':nome'  => $usuario->getNome(),
            ':email' => $usuario->getEmail(),
            ':id'    => $id,
        ]);
    }

    public function delete(int $id): bool
    {
        $pdo = Database::getConnection();

        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        return $stmt->execute([':id' => $id]);
    }

}