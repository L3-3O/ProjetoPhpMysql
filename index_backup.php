<?php require_once __DIR__.'/componentes/config.php'?>
<?php require_once __DIR__.'/componentes/rotas.php'?>
<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Estoque</title>

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous" />
</head>
<body>

    <!-- NAVBAR -->
   <?php require_once APP_COMPONENTES.'/nav.php';?>

    <!-- HEADER -->
    <?php require_once APP_COMPONENTES.'/header.php';?>
    

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
   <?php require_once APP_COMPONENTES.'/footer.php';?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>