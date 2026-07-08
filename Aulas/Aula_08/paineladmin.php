<?php require_once dirname(__DIR__) . '../componentes/rotas.php' ?>
<?php require_once dirname(__DIR__) . '../componentes/config.php' ?>


<?php 
if(empty($_SESSION['userstatus']))
    header('Location:index.php');
exit();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Painel Administrativo</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background:#f4f6f9;
}

.container{
    display:flex;
    min-height:100vh;
}

/* Sidebar */
.sidebar{
    width:250px;
    background:#1f2937;
    color:#fff;
    padding:20px;
}

.sidebar h2{
    text-align:center;
    margin-bottom:30px;
}

.sidebar ul{
    list-style:none;
}

.sidebar li{
    margin:15px 0;
}

.sidebar a{
    text-decoration:none;
    color:white;
    display:block;
    padding:12px;
    border-radius:8px;
    transition:.3s;
}

.sidebar a:hover{
    background:#374151;
}

/* Conteúdo */
.main{
    flex:1;
    padding:30px;
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
}

.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
}

.card{
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 2px 8px rgba(0,0,0,.1);
}

.card h3{
    color:#555;
    margin-bottom:10px;
}

.card p{
    font-size:30px;
    font-weight:bold;
    color:#2563eb;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
    margin-top:30px;
    border-radius:10px;
    overflow:hidden;
    box-shadow:0 2px 8px rgba(0,0,0,.1);
}

table th{
    background:#2563eb;
    color:white;
    padding:15px;
}

table td{
    padding:15px;
    border-bottom:1px solid #eee;
}

.status{
    padding:5px 12px;
    border-radius:20px;
    color:white;
    font-size:13px;
}

.ativo{
    background:#16a34a;
}

.pendente{
    background:#f59e0b;
}

@media(max-width:768px){
    .container{
        flex-direction:column;
    }

    .sidebar{
        width:100%;
    }
}
</style>

</head>
<body>

<div class="container">

    <aside class="sidebar">
        <h2>Painel Admin</h2>

        <ul>
            <li><a href="#">🏠 Dashboard</a></li>
            <li><a href="#">👥 Usuários</a></li>
            <li><a href="#">📦 Produtos</a></li>
            <li><a href="#">🛒 Pedidos</a></li>
            <li><a href="#">📊 Relatórios</a></li>
            <li><a href="#">⚙ Configurações</a></li>
            <li><a href="#">🚪 Sair</a></li>
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

</body>
</html>