<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

<div class="container-fluid">
    <div class="row min-vh-100">
        <nav class="col-md-3 col-lg-2 d-md-block bg-dark text-white p-3 sidebar">
            <h4 class="text-white text-center pb-3 border-bottom">Minha Aula</h4>
            
            <ul class="nav nav-pills flex-column mb-auto mt-3">
                <li class="nav-item mb-1">
                    <a href="index.php" class="nav-link text-white <?= !isset($_GET['page']) ? 'active' : '' ?>">
                        <i class="bi bi-house-door me-2"></i> Início
                    </a>
                </li>
                
                <li class="nav-item mb-1">
                    <a href="index.php?page=usuarioCreate" class="nav-link text-white <?= (isset($_GET['page']) && $_GET['page'] === 'usuarioCreate') ? 'active' : '' ?>">
                        <i class="bi bi-person-plus me-2"></i> Cadastrar Usuário
                    </a>
                </li>

                <li class="nav-item mb-1">
                    <a href="index.php?page=usuarioList" class="nav-link text-white <?= (isset($_GET['page']) && $_GET['page'] === 'usuarioList') ? 'active' : '' ?>">
                        <i class="bi bi-people me-2"></i> Listar Usuários
                    </a>
                </li>

                <li class="nav-item mb-1">
                    <a href="index.php?page=clienteCreate" class="nav-link text-white <?= (isset($_GET['page']) && $_GET['page'] === 'clienteCreate') ? 'active' : '' ?>">
                        <i class="bi bi-person-plus me-2"></i> Cadastrar Cliente
                    </a>
                </li>

                <li class="nav-item mb-1">
                    <a href="index.php?page=clienteList" class="nav-link text-white <?= (isset($_GET['page']) && $_GET['page'] === 'clienteList') ? 'active' : '' ?>">
                        <i class="bi bi-people me-2"></i> Listar Clientes
                    </a>
                </li>
            </ul>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">