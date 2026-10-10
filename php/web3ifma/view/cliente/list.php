<?php
require_once __DIR__ . '/../../controller/ClienteController.php';

$controller = new ClienteController();
$clientes = $controller->listar();
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <h2 class="mb-4">Clientes Cadastrados</h2>

        <?php if (isset($_GET['msg']) && $_GET['msg'] === 'atualizado'): ?>
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                <div><strong>Tudo certo!</strong> Cliente atualizado com sucesso.</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif (isset($_GET['msg']) && $_GET['msg'] === 'excluido'): ?>
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                <div><strong>Tudo certo!</strong> Cliente excluído com sucesso.</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['erro'])): ?>
            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center shadow-sm" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                <div><strong>Ops!</strong> Não foi possível concluir a operação.</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (empty($clientes)): ?>
            <div class="alert alert-info d-flex align-items-center shadow-sm" role="alert">
                <i class="bi bi-info-circle-fill me-2 fs-5"></i>
                <div>Nenhum cliente cadastrado até o momento.</div>
            </div>
        <?php else: ?>
            <div class="table-responsive shadow-sm">
                <table class="table table-striped table-hover align-middle bg-white">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Telefone</th>
                            <th scope="col" class="text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clientes as $cliente): ?>
                            <tr>
                                <td><?= $cliente['id'] ?></td>
                                <td><?= $cliente['nome'] ?></td>
                                <td><?= $cliente['email'] ?></td>
                                <td><?= $cliente['telefone'] ?? '' ?></td>
                                <td class="text-end">
                                    <a href="index.php?page=clienteEdit&id=<?= urlencode($cliente['id']) ?>" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil-square"></i> Editar
                                    </a>
                                    <form method="POST" action="controller/ClienteController.php" class="d-inline" onsubmit="return confirm('Deseja realmente excluir este cliente?');">
                                        <input type="hidden" name="acao" value="delete">
                                        <input type="hidden" name="id" value="<?= htmlspecialchars($cliente['id']) ?>">
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i> Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

        <a href="index.php?page=clienteCreate" class="btn btn-primary mt-3">
            <i class="bi bi-person-plus me-1"></i> Cadastrar Novo Cliente
        </a>
    </div>
</div>
