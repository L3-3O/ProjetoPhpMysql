<?php require_once dirname(__DIR__). '../componentes/rotas.php'?>
<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS v5.3.8 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous" />
</head>

<body>

    <?php $numaula = "Aula 3-Rotas" ?>
    <?php require_once APP_COMPONENTES.'/nav.php' ?>
    <?php require_once APP_COMPONENTES. '/header.php' ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>__DIR__Caminho absoluto</h3>
                    <?= __DIR__ ?>
                    <h3>dirname(__DIR__) recua um diretório</h3>
                    <?= dirname(__DIR__); ?>

                    <h3>dirname(__DIR__,5)</h3>
                    <?= dirname(__DIR__,5) ?>
                    <h3>Definindo variavel de rotas</h3>
                    <h4>Define("APP ROOT", __DIR__)</h4>
                    <?php define("APP_ROOT",__DIR__); ?>
                    <?= APP_ROOT ?>
                    <h3>ROTA ABSOLUTA</h3>
                    
                </div>
            </div>
        </div>
    </main>
    <?php require_once '../Componentes/footer.php' ?>
    <!-- Bootstrap JavaScript Bundle (includes Popper) -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>