<?php require_once dirname(__DIR__) . '../componentes/config.php' ?>


<?php
if(!empty($_GET['logout'])&& $_GET['logout']=="ok"){
    $_SESSION = [];
    session_destroy();

}
?>

<?php
if (empty($_SESSION['userstatus'])) {
    header('Location:index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #eef2f7;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */

        .sidebar {
            width: 260px;
            background: #1f2937;
            color: #fff;
            padding: 25px;
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 35px;
            font-size: 24px;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar a {
            display: block;
            text-decoration: none;
            color: #fff;
            padding: 14px;
            border-radius: 8px;
            transition: .3s;
            font-size: 16px;
        }

        .sidebar a:hover {
            background: #374151;
            transform: translateX(5px);
        }

        /* Conteúdo */

        .main {
            flex: 1;
            margin-left: 260px;
            padding: 35px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #1f2937;
        }

        .header strong {
            color: #555;
        }

        /* Cards */

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: #fff;
            border: none;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .08);
            transition: .3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            color: #777;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .card p {
            font-size: 34px;
            color: #2563eb;
            font-weight: bold;
        }

        /* Tabela */

        table {
            width: 100%;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            border-collapse: collapse;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .08);
        }

        table th {
            background: #2563eb;
            color: #fff;
            padding: 15px;
            text-align: left;
        }

        table td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        table tr:hover {
            background: #f8fafc;
        }

        .status {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 30px;
            color: #fff;
            font-size: 13px;
        }

        .ativo {
            background: #16a34a;
        }

        .pendente {
            background: #f59e0b;
        }

        /* Responsivo */

        @media(max-width:768px) {

            .layout {
                flex-direction: column;
            }

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }

            .header {
                flex-direction: column;
                gap: 10px;
                align-items: flex-start;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

        }
    </style>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous" />

</head>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Deseja realmente encerrar a sessão?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a href="?logout=ok" class="btn btn-primary">Confirmar</a>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">

        <div class="col-12">

            <aside class="sidebar">
                <h2>Painel Admin</h2>

                <ul>
                    <li><a href="#">🏠 Dashboard</a></li>
                    <li><a href="#">👥 Usuários</a></li>
                    <li><a href="#">📦 Produtos</a></li>
                    <li><a href="#">🛒 Pedidos</a></li>
                    <li><a href="#">📊 Relatórios</a></li>
                    <li><a href="#">⚙ Configurações</a></li>
                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">🚪 Sair</a></li>
                </ul>
            </aside>

            <main class="main">

                <div class="header">
                    <h1>Dashboard</h1>
                    <strong>Administrador</strong>
                </div>

                <div class="cards">

                    <div class="card">
                        <h3>Usuários</h3>
                        <p>1.245</p>
                    </div>

                    <div class="card">
                        <h3>Pedidos</h3>
                        <p>358</p>
                    </div>

                    <div class="card">
                        <h3>Vendas</h3>
                        <p>R$ 82.430</p>
                    </div>

                    <div class="card">
                        <h3>Produtos</h3>
                        <p>520</p>
                    </div>

                </div>

                <table>

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Pedido</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>001</td>
                            <td>João Silva</td>
                            <td>Notebook</td>
                            <td><span class="status ativo">Concluído</span></td>
                        </tr>

                        <tr>
                            <td>002</td>
                            <td>Maria Souza</td>
                            <td>Mouse Gamer</td>
                            <td><span class="status pendente">Pendente</span></td>
                        </tr>

                        <tr>
                            <td>003</td>
                            <td>Carlos Lima</td>
                            <td>Teclado Mecânico</td>
                            <td><span class="status ativo">Concluído</span></td>
                        </tr>

                    </tbody>

                </table>

            </main>

        </div>



    </div>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>