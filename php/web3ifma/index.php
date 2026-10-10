<?php
$rotas = ['usuarioCreate' => '/view/usuario/create.php',
          'usuarioEdit'   => '/view/usuario/edit.php',
          'usuarioList'   => '/view/usuario/list.php',
          'clienteCreate' => '/view/cliente/create.php',
          'clienteEdit'   => '/view/cliente/edit.php',
          'clienteList'   => '/view/cliente/list.php',
          'home'   => '/view/home.php'];

$page = $_GET['page'] ?? 'home';
$view = __DIR__ . ($rotas[$page] ?? $rotas['home']);

require_once __DIR__ . '/view/includes/header.php';
require_once file_exists($view) ? $view : $rotas['home'];
require_once __DIR__ . '/view/includes/footer.php';

