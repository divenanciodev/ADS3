<?php
require_once __DIR__ . '/../../controller/UsuarioController.php';

$id = (int)($_GET['id'] ?? 0);
$usuario = (new UsuarioController())->buscarPorId($id);

if (!$usuario) {
    header('Location: ../../index.php?page=usuarioList&erro=usuario_nao_encontrado');
    exit;
}
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="mb-4">Editar Usuário</h2>

        <?php if (isset($_GET['erro'])): ?>
            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center shadow-sm" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                <div>
                    <strong>Ops!</strong> Não foi possível atualizar o usuário. Tente novamente.
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form method="POST" action="controller/UsuarioController.php">
            <input type="hidden" name="acao" value="update">
            <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']) ?>">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Salvar Alterações
            </button>
            <a href="index.php?page=usuarioList" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
