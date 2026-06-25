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

    <?php $numaula = "Aula 2" ?>
    <?php require_once '../Componentes/nav.php' ?>
    <?php require_once '../Componentes/header.php' ?>
    <main>
        <div class="container"></div>
        <?php
        $nome = "Leo";
        $valor = 100;
        $moeda = 33.06;
        $staus = true;
        ?>

        <p>
            Nome <br>
            <?php var_dump($nome); ?>

        </p>
        <p>
            Nome:<br>
            <?php var_dump($valor); ?>
        </p>

        <p>

            Nome: <br>
            <?php var_dump($moeda); ?>

        </p>


        <p>
            Nome:<br>
            <?php var_dump($staus); ?>

        </p>

        <h1>Operadores</h1>
        <?php
        $valor1=1250;
        $valor2=15;
        ?>
        <h3>Soma</h3>
        <?php $total = $valor1 + $valor2; ?>
        A soma de  +  é igual a :
        
    </main>
    <?php require_once '../Componentes/footer.php' ?>
    <!-- Bootstrap JavaScript Bundle (includes Popper) -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>