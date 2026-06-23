<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Estoque</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">

            <!-- Nome do Projeto -->
            <a class="navbar-brand fw-bold" href="#">
                Controle de Estoque
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">

                <!-- Links à direita -->
                <ul class="navbar-nav ms-auto">

                    <!-- Dropdown 1 -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Produtos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Cadastrar Produto</a></li>
                            <li><a class="dropdown-item" href="#">Listar Produtos</a></li>
                            <li><a class="dropdown-item" href="#">Categorias</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown 2 -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Movimentações
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Entrada</a></li>
                            <li><a class="dropdown-item" href="#">Saída</a></li>
                            <li><a class="dropdown-item" href="#">Histórico</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown 3 -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Relatórios
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Estoque Atual</a></li>
                            <li><a class="dropdown-item" href="#">Produtos em Falta</a></li>
                            <li><a class="dropdown-item" href="#">Inventário</a></li>
                        </ul>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <!-- HEADER -->
    <header class="bg-light py-5 text-center">
        <div class="container">
            <h1 class="display-5">Sistema de Controle de Estoque</h1>
            <p class="lead">
                Gerencie produtos, movimentações e relatórios de forma simples.
            </p>
        </div>
    </header>

    <!-- SECTION -->
    <section class="container my-5">
        <div class="p-4 bg-body-tertiary rounded">
            <h2>Resumo do Estoque</h2>
            <p>
                Área destinada para indicadores rápidos, quantidade de produtos,
                entradas e saídas recentes.
            </p>
        </div>
    </section>

    <!-- MAIN -->
    <main class="container my-5">
        <div class="row">
            <div class="col-md-8">
                <h2>Painel Principal</h2>
                <p>
                    Conteúdo principal do sistema será exibido aqui.
                </p>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Informações
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Espaço para avisos, notificações e atalhos.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <div class="container">
            <p class="mb-0">
                &copy; 2026 Controle de Estoque. Todos os direitos reservados.
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>