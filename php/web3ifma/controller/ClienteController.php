<?php
// Exibe erros caso algo quebre no backend
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __DIR__ . '/../model/Cliente.php';
require_once __DIR__ . '/../dao/ClienteDAO.php';

class ClienteController
{
    public function store(): void
    {
        $nome     = trim($_POST['nome'] ?? '');
        $email    = trim($_POST['email'] ?? '');
        $telefone = trim($_POST['telefone'] ?? '');

        $cliente = new Cliente($nome, $email, $telefone);

        $dao = new ClienteDAO();
        $sucesso = $dao->save($cliente);

        if ($sucesso) {
            header('Location: ../index.php?page=clienteCreate&msg=sucesso');
        } else {
            header('Location: ../index.php?page=clienteCreate&erro=falha_ao_salvar');
        }
        exit;
    }

    public function listar(): array
    {
        $dao = new ClienteDAO();
        return $dao->findAll();
    }

    public function buscarPorId(int $id): ?array
    {
        $dao = new ClienteDAO();
        return $dao->findById($id);
    }

    public function update(): void
    {
        $id       = (int)($_POST['id'] ?? 0);
        $nome     = trim($_POST['nome'] ?? '');
        $email    = trim($_POST['email'] ?? '');
        $telefone = trim($_POST['telefone'] ?? '');

        $cliente = new Cliente($nome, $email, $telefone);

        $dao = new ClienteDAO();
        $sucesso = $dao->update($id, $cliente);

        if ($sucesso) {
            header('Location: ../index.php?page=clienteList&msg=atualizado');
        } else {
            header('Location: ../index.php?page=clienteEdit&id=' . $id . '&erro=falha_ao_atualizar');
        }
        exit;
    }

    public function delete(): void
    {
        $id = (int)($_POST['id'] ?? 0);

        $dao = new ClienteDAO();
        $dao->delete($id);

        header('Location: ../index.php?page=clienteList&msg=excluido');
        exit;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? 'store';
    $controller = new ClienteController();

    match ($acao) {
        'update' => $controller->update(),
        'delete' => $controller->delete(),
        default  => $controller->store(),
    };
}
