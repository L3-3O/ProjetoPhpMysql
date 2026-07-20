
<?php require_once 'componentes/config.php' ?>
<?php require_once 'componentes/conexao.php' ?>


<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StockMaster - Sistema de Controle de Estoque</title>

    <meta name="description" content="Dashboard moderno para controle de estoque, gerenciamento de produtos, fornecedores e relatórios financeiros em tempo real.">
    <meta name="keywords" content="estoque, controle de estoque, dashboard, erp, gestão, produtos, logística">
    <meta name="author" content="Especialista Front-end">

    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'><path d='M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6z'/></svg>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        :root {
            --sidebar-width: 260px;
            --sidebar-collapsed-width: 70px;
            --transition-speed: 0.3s;
        }

        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            background-color: var(--bs-body-bg);
        }

        /* --- MENU LATERAL (ASIDE) --- */
        aside {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1030;
            transition: all var(--transition-speed) ease;
            background-color: var(--bs-body-inverse-bg, #1e293b);
            color: #ffffff;
            display: flex;
            flex-direction: column;
        }

        html[data-bs-theme="light"] aside {
            background-color: #0f172a;
        }

        aside .nav-link {
            color: rgba(255, 255, 255, 0.7);
            padding: 0.75rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 10px;
            border-radius: 0.375rem;
            margin: 0.125rem 0.75rem;
            transition: all 0.2s;
        }

        aside .nav-link:hover,
        aside .nav-link.active {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.1);
        }

        aside .submenu .nav-link {
            padding-left: 2.75rem;
            font-size: 0.9rem;
        }

        /* --- WRAPPER E CONTEÚDO PRINCIPAL --- */
        .dashboard-wrapper {
            margin-left: var(--sidebar-width);
            transition: all var(--transition-speed) ease;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header.navbar {
            height: 70px;
            position: sticky;
            top: 0;
            z-index: 1020;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            background-color: var(--bs-body-bg);
            border-bottom: 1px solid var(--bs-border-color);
        }

        main {
            flex-grow: 1;
            padding: 2rem;
        }

        /* --- CARDS DE INDICADORES --- */
        .stat-card {
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
            border: none;
            border-left: 4px solid transparent;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        /* --- ESTADOS RECOLHIDOS (SIDEBAR COLLAPSE) --- */
        body.sidebar-collapsed aside {
            width: var(--sidebar-collapsed-width);
        }

        body.sidebar-collapsed aside .user-profile-box,
        body.sidebar-collapsed aside .nav-text,
        body.sidebar-collapsed aside .dropdown-toggle::after,
        body.sidebar-collapsed aside .brand-text {
            display: none !important;
        }

        body.sidebar-collapsed aside .brand-logo {
            margin: 0 auto;
        }

        body.sidebar-collapsed .dashboard-wrapper {
            margin-left: var(--sidebar-collapsed-width);
        }

        /* Responsividade para telas menores */
        @media (max-width: 991.98px) {
            aside {
                left: calc(-1 * var(--sidebar-width));
            }

            .dashboard-wrapper {
                margin-left: 0 !important;
            }

            body.sidebar-open aside {
                left: 0;
            }
        }
    </style>
</head>

<body>

    <aside id="sidebar" class="shadow">
        <div class="d-flex align-items-center justify-content-between p-3 border-bottom border-secondary border-opacity-25">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none h5 mb-0 gap-2 fw-bold">
                <i class="bi bi-box-seam-fill text-primary brand-logo fs-4"></i>
                <span class="brand-text">StockMaster</span>
            </a>
            <button type="button" class="btn btn-sm btn-link text-white d-none d-lg-block" id="btnToggleSidebar" aria-label="Recolher menu">
                <i class="bi bi-arrow-left-right"></i>
            </button>
        </div>

        <div class="user-profile-box p-3 text-center border-bottom border-secondary border-opacity-25">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80" alt="Foto do Administrador" class="rounded-circle mb-2 object-fit-cover shadow-sm" width="64" height="64">
            <h6 class="mb-0 fw-semibold text-white">Ana Silva</h6>
            <small class="text-white-50">Administrador</small>
        </div>

        <div class="overflow-y-auto flex-grow-1 py-3">
            <!-- NAV -->
            <?php require_once 'componentes/nav.php' ?>
        </div>
    </aside>

    <div class="dashboard-wrapper">

        <!-- HEADER -->
        <?php require_once 'componentes/header.php' ?>

        <main>
            <article>
                <div class="d-flex flex-column flex-xl-row justify-content-between align-items-start align-items-xl-center mb-4 gap-3">
                    <div>
                        <h1 class="h2 fw-bold mb-1">Movimentações de Estoque</h1>
                        <p class="text-muted mb-0">Bem-vinda de volta, Ana Silva. Aqui está o histórico da tabela `movimentacoes_estoque`.</p>
                        <nav aria-label="breadcrumb" class="mt-2">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Movimentações</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="d-flex flex-wrap gap-2 align-items-center">
                        <span class="badge bg-secondary-subtle text-secondary-emphasis p-2 me-2" id="currentDate">
                            <i class="bi bi-calendar3 me-1"></i> --/--/----
                        </span>
                        <button type="button" class="btn btn-primary d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalNovoProduto">
                            <i class="bi bi-plus-circle"></i> Novo Produto
                        </button>
                        <button type="button" class="btn btn-success d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalEntradaEstoque">
                            <i class="bi bi-box-arrow-in-down"></i> Registrar Entrada
                        </button>
                        <button type="button" class="btn btn-danger d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalSaidaEstoque">
                            <i class="bi bi-box-arrow-up"></i> Registrar Saída
                        </button>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-12 ">
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-transparent border-bottom py-3 d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2">
                                <h5 class="mb-0 fw-bold text-body-secondary">Histórico de Movimentações</h5>
                                <div class="d-flex gap-2 w-100 w-sm-auto" style="max-width: 300px;">
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-search"></i></span>
                                        <input type="text" class="form-control border-start-0 ps-0" placeholder="Buscar produto ou tipo...">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0 text-nowrap">
                                        <thead class="table-light text-uppercase fs-7 fw-semibold border-bottom">
                                            <tr>
                                                <th scope="col" class="ps-4" style="width: 80px;">ID</th>
                                                <th scope="col">Produto ID</th>
                                                <th scope="col" style="width: 120px;">Tipo</th>
                                                <th scope="col">Quantidade</th>
                                                <th scope="col">Observação</th>
                                                <th scope="col" style="width: 180px;">Criado em</th>
                                                <th scope="col" class="pe-4 text-end" style="width: 100px;">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="ps-4 fw-medium text-muted">1</td>
                                                <td><span class="fw-bold text-body-emphasis">8842</span> <small class="text-muted">(Notebook Dell)</small></td>
                                                <td><span class="badge bg-success-subtle text-success border border-success-subtle px-2">ENTRADA</span></td>
                                                <td class="fw-bold text-success">+15</td>
                                                <td class="text-wrap">Nota Fiscal Nº 45012 - Lote Inicial</td>
                                                <td><small class="text-muted">15/01/2026 10:24</small></td>
                                                <td class="pe-4 text-end">
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-secondary" title="Editar"><i class="bi bi-pencil"></i></button>
                                                        <button class="btn btn-outline-danger" title="Excluir"><i class="bi bi-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-4 fw-medium text-muted">2</td>
                                                <td><span class="fw-bold text-body-emphasis">1123</span> <small class="text-muted">(Smartphone S24)</small></td>
                                                <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2">SAÍDA</span></td>
                                                <td class="fw-bold text-danger">-2</td>
                                                <td class="text-wrap">Venda/Pedido Balcão #9921</td>
                                                <td><small class="text-muted">18/01/2026 14:10</small></td>
                                                <td class="pe-4 text-end">
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-secondary" title="Editar"><i class="bi bi-pencil"></i></button>
                                                        <button class="btn btn-outline-danger" title="Excluir"><i class="bi bi-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-4 fw-medium text-muted">3</td>
                                                <td><span class="fw-bold text-body-emphasis">8842</span> <small class="text-muted">(Notebook Dell)</small></td>
                                                <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2">SAÍDA</span></td>
                                                <td class="fw-bold text-danger">-1</td>
                                                <td class="text-wrap">Avaria/Dano detectado no display</td>
                                                <td><small class="text-muted">02/02/2026 09:05</small></td>
                                                <td class="pe-4 text-end">
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-secondary" title="Editar"><i class="bi bi-pencil"></i></button>
                                                        <button class="btn btn-outline-danger" title="Excluir"><i class="bi bi-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-top py-3 d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3">
                                <small class="text-muted">Exibindo 3 movimentações mapeadas via InnoDB (utf8mb4_general_ci)</small>
                                <nav aria-label="Navegação da tabela">
                                    <ul class="pagination pagination-sm mb-0">
                                        <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>


                </div>


            </article>
        </main>

        <!-- FOOTER -->
        <?php require_once 'componentes/footer.php' ?>
    </div>

    <!-- MODAL NOVO PRODUTO -->
    <div class="modal fade" id="modalNovoProduto" tabindex="-1" aria-labelledby="modalNovoProdutoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="modalNovoProdutoLabel"><i class="bi bi-plus-circle me-2"></i>Cadastrar Novo Produto</h5>
                    <button type="button" class="btn-close" data-bs-shadow="none" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <form id="formNovoProduto">
                    <div class="modal-body row g-3">
                        <div class="col-md-8">
                            <label for="prodNome" class="form-label">Nome do Produto</label>
                            <input type="text" class="form-control" id="prodNome" required>
                        </div>
                        <div class="col-md-4">
                            <label for="prodSKU" class="form-label">Código SKU</label>
                            <input type="text" class="form-control" id="prodSKU" placeholder="Ex: PROD-123" required>
                        </div>
                        <div class="col-md-6">
                            <label for="prodCategoria" class="form-label">Categoria</label>
                            <select class="form-select" id="prodCategoria" required>
                                <option value="" selected disabled>Selecione...</option>
                                <option>Eletrônicos</option>
                                <option>Alimentos</option>
                                <option>Vestuário</option>
                                <option>Ferramentas</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="prodFornecedor" class="form-label">Fornecedor Principal</label>
                            <select class="form-select" id="prodFornecedor" required>
                                <option value="" selected disabled>Selecione...</option>
                                <option>Distribuidora Alfa</option>
                                <option>Indústria Beta S/A</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="prodQtd" class="form-label">Quantidade Inicial</label>
                            <input type="number" class="form-control" id="prodQtd" min="0" required>
                        </div>
                        <div class="col-md-4">
                            <label for="prodMin" class="form-label">Estoque Mínimo (Alerta)</label>
                            <input type="number" class="form-control" id="prodMin" min="0" required>
                        </div>
                        <div class="col-md-4">
                            <label for="prodPreco" class="form-label">Preço de Custo (R$)</label>
                            <input type="number" class="form-control" id="prodPreco" step="0.01" min="0" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar Produto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL REGISTRAR ENTRADA (Mapeado para a tabela movimentacoes_estoque) -->
    <div class="modal fade" id="modalEntradaEstoque" tabindex="-1" aria-labelledby="modalEntradaEstoqueLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title fw-bold" id="modalEntradaEstoqueLabel"><i class="bi bi-box-arrow-in-down me-2"></i>Registrar Entrada de Estoque</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <form id="formEntrada">
                    <div class="modal-body row g-3">
                        <div class="col-12">
                            <label for="entProdId" class="form-label">Selecione o Produto (produto_id)</label>
                            <select class="form-select" id="entProdId" name="produto_id" required>
                                <option value="" selected disabled>Escolha um produto existente...</option>
                                <option value="8842">Notebook Dell Inspiron (ID: 8842)</option>
                                <option value="1123">Smartphone Samsung S24 (ID: 1123)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="entQtd" class="form-label">Quantidade (quantidade)</label>
                            <input type="number" class="form-control" id="entQtd" name="quantidade" min="1" required>
                        </div>
                        <div class="col-md-6">
                            <label for="entObs" class="form-label">Observação (observacao)</label>
                            <input type="text" class="form-control" id="entObs" name="observacao" placeholder="Ex: NF 45012 ou Lote X" required>
                        </div>
                        <!-- Campo oculto para definir o tipo da movimentacao -->
                        <input type="hidden" name="tipo" value="ENTRADA">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Confirmar Entrada</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL REGISTRAR SAÍDA (Mapeado para a tabela movimentacoes_estoque) -->
    <div class="modal fade" id="modalSaidaEstoque" tabindex="-1" aria-labelledby="modalSaidaEstoqueLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title fw-bold" id="modalSaidaEstoqueLabel"><i class="bi bi-box-arrow-up me-2"></i>Registrar Saída de Estoque</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <form id="formSaida">
                    <div class="modal-body row g-3">
                        <div class="col-12">
                            <label for="saiProdId" class="form-label">Selecione o Produto (produto_id)</label>
                            <select class="form-select" id="saiProdId" name="produto_id" required>
                                <option value="" selected disabled>Escolha um produto existente...</option>
                                <option value="8842">Notebook Dell Inspiron (ID: 8842)</option>
                                <option value="1123">Smartphone Samsung S24 (ID: 1123)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="saiQtd" class="form-label">Quantidade (quantidade)</label>
                            <input type="number" class="form-control" id="saiQtd" name="quantidade" min="1" required>
                        </div>
                        <div class="col-md-6">
                            <label for="saiObs" class="form-label">Motivo / Observação</label>
                            <input type="text" class="form-control" id="saiObs" name="observacao" placeholder="Ex: Venda #9921 ou Avaria" required>
                        </div>
                        <!-- Campo oculto para definir o tipo da movimentacao -->
                        <input type="hidden" name="tipo" value="SAÍDA">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Confirmar Saída</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            // --- CONTROLE DA DATA ATUAL ---
            const dateBadge = document.getElementById('currentDate');
            const hoje = new Date();
            dateBadge.innerHTML = `<i class="bi bi-calendar3 me-1"></i> ${hoje.toLocaleDateString('pt-BR', { day: '2-digit', month: '2-digit', year: 'numeric' })}`;

            // --- RECOLHIMENTO E EXPANSÃO DO MENU LATERAL (DESKTOP / MOBILE) ---
            const btnToggleSidebar = document.getElementById('btnToggleSidebar');
            const btnMobileToggle = document.getElementById('btnMobileToggle');
            const body = document.body;

            if(btnToggleSidebar) {
                btnToggleSidebar.addEventListener('click', () => {
                    body.classList.toggle('sidebar-collapsed');
                });
            }

            if(btnMobileToggle) {
                btnMobileToggle.addEventListener('click', (e) => {
                    e.stopPropagation();
                    body.classList.toggle('sidebar-open');
                });
            }

            // Fecha menu lateral ao clicar fora (no mobile)
            document.addEventListener('click', (e) => {
                if (body.classList.contains('sidebar-open') && !e.target.closest('#sidebar') && !e.target.closest('#btnMobileToggle')) {
                    body.classList.remove('sidebar-open');
                }
            });

            // --- INTERCEPTAÇÃO DOS FORMULÁRIOS PARA SIMULAÇÃO ---
            const fecharModalESalvar = (formId, modalId) => {
                const form = document.getElementById(formId);
                if(form) {
                    form.addEventListener('submit', (e) => {
                        e.preventDefault();
                        const modalEl = document.getElementById(modalId);
                        const modalInstance = bootstrap.Modal.getInstance(modalEl);
                        modalInstance.hide();
                        alert('Movimentação de estoque simulada com sucesso para a estrutura do banco de dados!');
                        e.target.reset();
                    });
                }
            };

            fecharModalESalvar('formNovoProduto', 'modalNovoProduto');
            fecharModalESalvar('formEntrada', 'modalEntradaEstoque');
            fecharModalESalvar('formSaida', 'modalSaidaEstoque');
        });
    </script>
</body>

</html>

