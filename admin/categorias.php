<?php require_once 'componentes/config.php' ?>
<?php //require_once 'componentes/conexao.php' ?>

<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StockMaster - Gerenciar Categorias</title>
    
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

        aside .nav-link:hover, aside .nav-link.active {
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
            </</button>
        </div>

        <div class="user-profile-box p-3 text-center border-bottom border-secondary border-opacity-25">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80" alt="Foto do Administrador" class="rounded-circle mb-2 object-fit-cover shadow-sm" width="64" height="64">
            <h6 class="mb-0 fw-semibold text-white">Ana Silva</h6>
            <small class="text-white-50">Administrador</small>
        </div>

        <div class="overflow-y-auto flex-grow-1 py-3">
              <?php require_once 'componentes/nav.php' ?>
        </div>
    </aside>

    <div class="dashboard-wrapper">
        
        <?php require_once 'componentes/header.php' ?>

        <main>
            <article>
                <!-- CABEÇALHO DA PÁGINA -->
                <div class="d-flex flex-column flex-xl-row justify-content-between align-items-start align-items-xl-center mb-4 gap-3">
                    <div>
                        <h1 class="h2 fw-bold mb-1">Categorias de Produtos</h1>
                        <p class="text-muted mb-0">Gerencie as divisões estruturais do seu controle de estoque.</p>
                        <nav aria-label="breadcrumb" class="mt-2">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Cadastros</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Categorias</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="d-flex flex-wrap gap-2 align-items-center">
                        <span class="badge bg-secondary-subtle text-secondary-emphasis p-2 me-2" id="currentDate">
                            <i class="bi bi-calendar3 me-1"></i> --/--/----
                        </span>
                        <button type="button" class="btn btn-primary d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#modalNovaCategoria">
                            <i class="bi bi-plus-circle"></i> Nova Categoria
                        </button>
                    </div>
                </div>

                <!-- CARDS DE RESUMO (CONTEÚDO ADICIONADO) -->
                <div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-xl-4">
                        <div class="card stat-card border-start border-primary shadow-sm h-100">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-muted text-uppercase small fw-bold">Total de Categorias</span>
                                    <h3 class="mb-0 fw-bold mt-1">12</h3>
                                </div>
                                <div class="bg-primary-subtle text-primary rounded p-3 fs-4">
                                    <i class="bi bi-tags-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-4">
                        <div class="card stat-card border-start border-success shadow-sm h-100">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-muted text-uppercase small fw-bold">Categorias Ativas</span>
                                    <h3 class="mb-0 fw-bold mt-1">10</h3>
                                </div>
                                <div class="bg-success-subtle text-success rounded p-3 fs-4">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-4">
                        <div class="card stat-card border-start border-warning shadow-sm h-100">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-muted text-uppercase small fw-bold">Inativas/Suspensas</span>
                                    <h3 class="mb-0 fw-bold mt-1">2</h3>
                                </div>
                                <div class="bg-warning-subtle text-warning rounded p-3 fs-4">
                                    <i class="bi bi-exclamation-triangle-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CONTEÚDO PRINCIPAL: TABELA DE CATEGORIAS (CONTEÚDO ADICIONADO) -->
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-transparent border-bottom py-3 d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2">
                        <h5 class="mb-0 fw-bold text-body-secondary">Listagem do Banco de Dados</h5>
                        <div class="d-flex gap-2 w-100 w-sm-auto" style="max-width: 300px;">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-light text-muted border-end-0"><i class="bi bi-search"></i></span>
                                <input type="text" class="form-control border-start-0 ps-0" placeholder="Buscar categoria...">
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0 text-nowrap">
                                <thead class="table-light text-uppercase fs-7 fw-semibold border-bottom">
                                    <tr>
                                        <th scope="col" class="ps-4" style="width: 80px;">ID</th>
                                        <th scope="col">Nome (Unique)</th>
                                        <th scope="col">Descrição</th>
                                        <th scope="col" style="width: 120px;">Status</th>
                                        <th scope="col" style="width: 180px;">Criado em</th>
                                        <th scope="col" class="pe-4 text-end" style="width: 100px;">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="ps-4 fw-medium text-muted">1</td>
                                        <td><span class="fw-bold text-body-emphasis">Eletrônicos</span></td>
                                        <td class="text-wrap">Smartphones, Notebooks, Acessórios e periféricos de hardware em geral.</td>
                                        <td><span class="badge bg-success-subtle text-success border border-success-subtle px-2">ativo</span></td>
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
                                        <td><span class="fw-bold text-body-emphasis">Alimentos</span></td>
                                        <td class="text-wrap">Produtos perecíveis e não perecíveis destinados à área de nutrição.</td>
                                        <td><span class="badge bg-success-subtle text-success border border-success-subtle px-2">ativo</span></td>
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
                                        <td><span class="fw-bold text-body-emphasis">Vestuário</span></td>
                                        <td class="text-wrap">Roupas, uniformes profissionais e calçados de segurança.</td>
                                        <td><span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2">inativo</span></td>
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
                        <small class="text-muted">Exibindo 3 de 3 registros em conformidade com o InnoDB (utf8mb4)</small>
                        <nav aria-label="Navegação da tabela">
                            <ul class="pagination pagination-sm mb-0">
                                <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </article>
        </main>

        <?php require_once 'componentes/footer.php' ?>
    </div>

    <!-- MODAL ADICIONAL PARA NOVA CATEGORIA (Mapeado exatamente como na Tabela SQL) -->
    <div class="modal fade" id="modalNovaCategoria" tabindex="-1" aria-labelledby="modalNovaCategoriaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="modalNovaCategoriaLabel"><i class="bi bi-tags me-2 text-primary"></i>Nova Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <form id="formNovaCategoria">
                    <div class="modal-body row g-3">
                        <div class="col-12">
                            <label for="catNome" class="form-label fw-medium">Nome da Categoria <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="catNome" maxlength="80" required placeholder="Ex: Ferramentas">
                            <div class="form-text">Campo único (Unique Key). Limite de 80 caracteres.</div>
                        </div>
                        <div class="col-12">
                            <label for="catDesc" class="form-label fw-medium">Descrição</label>
                            <textarea class="form-control" id="catDesc" rows="3" maxlength="255" placeholder="Breve resumo da categoria..."></textarea>
                        </div>
                        <div class="col-12">
                            <label for="catStatus" class="form-label fw-medium">Status Padrão</label>
                            <select class="form-select" id="catStatus">
                                <option value="ativo" selected>Ativo</option>
                                <option value="inativo">Inativo</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar Categoria</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // --- DATA ATUAL ---
            const dateBadge = document.getElementById('currentDate');
            const hoje = new Date();
            dateBadge.innerHTML = `<i class="bi bi-calendar3 me-1"></i> ${hoje.toLocaleDateString('pt-BR', { day: '2-digit', month: '2-digit', year: 'numeric' })}`;

            // --- MENU LATERAL TOGGLE ---
            const btnToggleSidebar = document.getElementById('btnToggleSidebar');
            const body = document.body;

            if(btnToggleSidebar) {
                btnToggleSidebar.addEventListener('click', () => {
                    body.classList.toggle('sidebar-collapsed');
                });
            }

            // --- DARK MODE THEME SELECTOR ---
            const htmlElement = document.documentElement;
            // Caso queira usar o botão do seu header.php, o script abaixo já está pronto
            const btnThemeToggle = document.getElementById('btnThemeToggle');
            if(btnThemeToggle) {
                btnThemeToggle.addEventListener('click', () => {
                    const currentTheme = htmlElement.getAttribute('data-bs-theme');
                    htmlElement.setAttribute('data-bs-theme', currentTheme === 'light' ? 'dark' : 'light');
                });
            }

            // --- SIMULAÇÃO DO SUBMIT DO MODAL ---
            document.getElementById('formNovaCategoria').addEventListener('submit', (e) => {
                e.preventDefault();
                const modalEl = document.getElementById('modalNovaCategoria');
                const modalInstance = bootstrap.Modal.getInstance(modalEl);
                modalInstance.hide();
                alert('Categoria simulada e registrada seguindo a restrição de banco de dados!');
                e.target.reset();
            });
        });
    </script>
</body>
</html>