<?php
// Exibe erros caso algo quebre no backend
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../model/Usuario.php';
require_once __DIR__ . '/../dao/UsuarioDAO.php';

class UsuarioController
{
    public function store(): void
    {
        $nome  = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');

        // 2. Monta o objeto Usuario
        $usuario = new Usuario($nome, $email);
        
        // 3. Salva através do DAO
        $dao = new UsuarioDAO();
        $sucesso = $dao->save($usuario);

        // 4. Redireciona de volta para a tela do index.php
        if ($sucesso) {
            header('Location: ../index.php?page=usuarioCreate&msg=sucesso');
        } else {
            header('Location: ../index.php?page=usuarioCreate&erro=falha_ao_salvar');
        }
        exit;
    }

    public function listar(): array
    {
        $dao = new UsuarioDAO();
        return $dao->findAll();
    }

    public function buscarPorId(int $id): ?array
    {
        $dao = new UsuarioDAO();
        return $dao->findById($id);
    }

    public function update(): void
    {
        $id    = (int)($_POST['id'] ?? 0);
        $nome  = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');

        $usuario = new Usuario($nome, $email);

        $dao = new UsuarioDAO();
        $sucesso = $dao->update($id, $usuario);

        if ($sucesso) {
            header('Location: ../index.php?page=usuarioList&msg=atualizado');
        } else {
            header('Location: ../index.php?page=usuarioEdit&id=' . $id . '&erro=falha_ao_atualizar');
        }
        exit;
    }

    public function delete(): void
    {
        $id = (int)($_POST['id'] ?? 0);

        $dao = new UsuarioDAO();
        $dao->delete($id);

        header('Location: ../index.php?page=usuarioList&msg=excluido');
        exit;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? 'store';
    $controller = new UsuarioController();

    match ($acao) {
        'update' => $controller->update(),
        'delete' => $controller->delete(),
        default  => $controller->store(),
    };
}