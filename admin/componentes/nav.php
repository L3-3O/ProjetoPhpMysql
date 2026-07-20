 <nav class="nav flex-column h-100" aria-label="Menu Principal">
                <a class="nav-link active" href="#" aria-current="page">
                    <i class="bi bi-speedometer2"></i>
                    <span class="nav-text">Dashboard</span>
                </a>

                <div>
                    <a class="nav-link dropdown-toggle" href="#menuProdutos" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="menuProdutos">
                        <i class="bi bi-box-seam"></i>
                        <span class="nav-text flex-grow-1">Produtos</span>
                    </a>
                    <div class="collapse submenu" id="menuProdutos">
                        <nav class="nav flex-column">
                            <a class="nav-link" href="#">Listar produtos</a>
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalNovoProduto">Novo produto</a>
                            <a class="nav-link" href="produtos.php">Produtos</a>
                        </nav>
                    </div>
                </div>

                <a class="nav-link" href="categorias.php">
                    <i class="bi bi-tags"></i>
                    <span class="nav-text">Categorias</span>
                </a>

                <div>
                    <a class="nav-link dropdown-toggle" href="#menuEstoque" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="menuEstoque">
                        <i class="bi bi-boxes"></i>
                        <span class="nav-text flex-grow-1">Estoque</span>
                    </a>
                    <div class="collapse submenu" id="menuEstoque">
                        <nav class="nav flex-column">
                            <a class="nav-link" href="estoque_entrada.php">Estoque</a>
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalEntradaEstoque">Entrada de estoque</a>
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalSaidaEstoque">Saída de estoque</a>
                            
                        </nav>
                    </div>
                </div>

                <a class="nav-link" href="#">
                    <i class="bi bi-arrow-down-circle"></i>
                    <span class="nav-text">Entradas</span>
                </a>
                <a class="nav-link" href="#">
                    <i class="bi bi-arrow-up-circle"></i>
                    <span class="nav-text">Saídas</span>
                </a>
                <a class="nav-link" href="#">
                    <i class="bi bi-truck"></i>
                    <span class="nav-text">Fornecedores</span>
                </a>
                <a class="nav-link" href="#">
                    <i class="bi bi-people"></i>
                    <span class="nav-text">Clientes</span>
                </a>
                <a class="nav-link" href="#">
                    <i class="bi bi-cart"></i>
                    <span class="nav-text">Pedidos</span>
                </a>

                <div>
                    <a class="nav-link dropdown-toggle" href="#menuRelatorios" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="menuRelatorios">
                        <i class="bi bi-graph-up-arrow"></i>
                        <span class="nav-text flex-grow-1">Relatórios</span>
                    </a>
                    <div class="collapse submenu" id="menuRelatorios">
                        <nav class="nav flex-column">
                            <a class="nav-link" href="#">Relatório Financeiro</a>
                            <a class="nav-link" href="#">Giro de Estoque</a>
                            <a class="nav-link" href="#">Curva ABC</a>
                        </nav>
                    </div>
                </div>

                <a class="nav-link" href="#">
                    <i class="bi bi-person-gear"></i>
                    <span class="nav-text">Usuários</span>
                </a>
                <a class="nav-link" href="#">
                    <i class="bi bi-gear"></i>
                    <span class="nav-text">Configurações</span>
                </a>

                <hr class="text-secondary mx-3 my-2 opacity-25">

                <a class="nav-link text-danger mt-auto" href="/admin/sair.php">
                    <i class="bi bi-box-arrow-left"></i>
                    <span class="nav-text">Sair</span>
                </a>
            </nav>