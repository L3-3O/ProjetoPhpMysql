<?php require_once dirname(__DIR__) . '../componentes/rotas.php' ?>
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

    <header>
        <!-- place navbar here -->
         <?php require_once APP_COMPONENTES . '/nav.php' ?>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Uso do For</h3>
                    <form method="post" class="card card-body shadow-sm mb-4">
                        <h4>Input number + botão</h4>

                        <div class="input-group">
                            <input
                                type="number"
                                class="form-control"
                                id="quantidade"
                                name="quantidade"
                                min="0"
                                placeholder="Digite a quantidade">

                            <button type="submit" class="btn btn-success">
                                Atualizar estoque
                            </button>
                        </div>
                    </form>

                    
                    <?php 
                    $quant="0";
                    if(!empty($_POST['quantidade'])){

                    $quant =$_POST['quantidade'];
                    }
                    for($i=1; $i<=$quant;$i++){
                        echo '<form method="post" class="card card-body shadow-sm mb-4">
    <h4>Input text simples</h4>

    <div class="mb-3">
        <label for="nome_produto" class="form-label">Nome do produto</label>
        <input type="text" class="form-control" id="nome_produto" name="nome_produto" placeholder="Ex: Teclado USB">
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
';
                    }
                    
                    ?>

                    <h4>For com Array</h4>
                    <?php 
                    $dados=[
                        "PHP",
                        "MYSQL",
                        "JAVA",
                        "PYTHON",
                        "CSS",
                        "HTML",
                        "C"


                    ];
                    $descriçao=[
                        "Linguagem de Progamação",
                        "Banco de Dados",
                        "Linguagem de Progamação",
                        "Linguagem de Progamação",
                        "Estrutura de Formatação",
                        "Estrutura de Sustentação",
                        "Linguagem de Progamação"
                    ];
                    $quant= count($dados)
                    ?>
                    <p>
                        <?php 
                        for($i=0;$i<$quant;$i++){
                            echo '<div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">'. $dados[$i].'</h5>
                                <p class="card-text">'.$descriçao[$i].'</p>
                                <p class="fw-bold">R$ 89,90</p>
                                <button class="btn btn-success">Comprar</button>
                            </div>
                        </div>
                        '
                       ;}
                        ?>
                    </p>

                </div>
            </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Bundle (includes Popper) -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>