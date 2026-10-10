<div class="row justify-content-center">
    <div class="col-md-6">
        <h2 class="mb-4">Cadastrar Novo Cliente</h2>

        <?php if (isset($_GET['msg']) && $_GET['msg'] === 'sucesso'): ?>
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                <div>
                    <strong>Tudo certo!</strong> Cliente cadastrado com sucesso.
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['erro'])): ?>
            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center shadow-sm" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                <div>
                    <strong>Ops!</strong> Não foi possível realizar o cadastro. Tente novamente.
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form method="POST" action="controller/ClienteController.php">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome completo" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="nome@exemplo.com" required>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(00) 00000-0000">
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Salvar Cliente
            </button>
            <a href="index.php?page=home" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
