<?php require_once 'componentes/config.php'; ?>
<?php require_once 'componentes/conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StockMaster - Gestão de Categorias</title>
    
    <meta name="description" content="Gerenciamento de categorias de produtos do sistema StockMaster.">
    <meta name="author" content="Especialista Front-end">
    
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'><path d='M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6z'/></svg>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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

        /* --- WRAPPER E CONTEÚDO PRINCIPAL --- */
        .dashboard-wrapper {
            margin-left: var(--sidebar-width);
            transition: all var(--transition-speed) ease;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex-grow: 1;
            padding: 2rem;
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
            </button>
        </div>

        <div class="user-profile-box p-3 text-center border-bottom border-secondary border-opacity-25">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80" alt="Foto do Administrador" class="rounded-circle mb-2 object-fit-cover shadow-sm" width="64" height="64">
            <h6 class="mb-0 fw-semibold text-white">Ana Silva</h6>
            <small class="text-white-50">Administrador</small>
        </div>

        <div class="overflow-y-auto flex-grow-1 py-3">
            <?php require_once 'componentes/nav.php'; ?>
        </div>
    </aside>

    <div class="dashboard-wrapper">
        
        <?php require_once 'componentes/header.php'; ?>

        <main>
            <article>
                <!-- CABEÇALHO DA PÁGINA -->
                <div class="d-flex flex-column flex-xl-row justify-content-between align-items-start align-items-xl-center mb-4 gap-3">
                    <div>
                        <h1 class="h2 fw-bold mb-1">Categorias de Produtos</h1>
                        <p class="text-muted mb-0">Gerencie as categorias utilizadas para organizar o estoque.</p>
                        <nav aria-label="breadcrumb" class="mt-2">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
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

                <!-- CARDS RESUMO -->
                <div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-xl-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body d-flex align-items-center gap-3">
                                <div class="bg-primary-subtle text-primary p-3 rounded-circle fs-3">
                                    <i class="bi bi-tags"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-0">Total de Categorias</h6>
                                    <h3 class="fw-bold mb-0">12</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body d-flex align-items-center gap-3">
                                <div class="bg-success-subtle text-success p-3 rounded-circle fs-3">
                                    <i class="bi bi-check-circle"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-0">Categorias Ativas</h6>
                                    <h3 class="fw-bold mb-0">10</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body d-flex align-items-center gap-3">
                                <div class="bg-danger-subtle text-danger p-3 rounded-circle fs-3">
                                    <i class="bi bi-x-circle"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-0">Categorias Inativas</h6>
                                    <h3 class="fw-bold mb-0">2</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TABELA DE CATEGORIAS -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" style="width: 80px;">ID</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Descrição</th>
                                        <th scope="col" style="width: 120px;">Status</th>
                                        <th scope="col" style="width: 180px;">Criado em</th>
                                        <th scope="col" style="width: 120px;" class="text-end">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Exemplo de Registro 1 -->
                                    <tr>
                                        <td class="fw-bold">#1</td>
                                        <td class="fw-semibold">Eletrônicos</td>
                                        <td class="text-muted">Dispositivos eletrônicos, componentes e acessórios.</td>
                                        <td><span class="badge bg-success-subtle text-success px-2 py-1">Ativo</span></td>
                                        <td class="text-muted">15/01/2026 10:30</td>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-outline-primary me-1" title="Editar"><i class="bi bi-pencil"></i></button>
                                            <button class="btn btn-sm btn-outline-danger" title="Excluir"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                    <!-- Exemplo de Registro 2 -->
                                    <tr>
                                        <td class="fw-bold">#2</td>
                                        <td class="fw-semibold">Alimentos</td>
                                        <td class="text-muted">Produtos alimentícios não perecíveis.</td>
                                        <td><span class="badge bg-success-subtle text-success px-2 py-1">Ativo</span></td>
                                        <td class="text-muted">18/01/2026 14:15</td>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-outline-primary me-1" title="Editar"><i class="bi bi-pencil"></i></button>
                                            <button class="btn btn-sm btn-outline-danger" title="Excluir"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                    <!-- Exemplo de Registro 3 -->
                                    <tr>
                                        <td class="fw-bold">#3</td>
                                        <td class="fw-semibold">Vestuário</td>
                                        <td class="text-muted">Roupas, calçados e acessórios de moda.</td>
                                        <td><span class="badge bg-danger-subtle text-danger px-2 py-1">Inativo</span></td>
                                        <td class="text-muted">02/02/2026 09:00</td>
                                        <td class="text-end">
                                            <button class="btn btn-sm btn-outline-primary me-1" title="Editar"><i class="bi bi-pencil"></i></button>
                                            <button class="btn btn-sm btn-outline-danger" title="Excluir"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </article>
        </main>

        <?php require_once 'componentes/footer.php'; ?>
    </div>

    <!-- MODAL NOVA CATEGORIA -->
    <div class="modal fade" id="modalNovaCategoria" tabindex="-1" aria-labelledby="modalNovaCategoriaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="modalNovaCategoriaLabel"><i class="bi bi-plus-circle me-2"></i>Cadastrar Nova Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <form id="formNovaCategoria">
                    <div class="modal-body row g-3">
                        <div class="col-12">
                            <label for="catNome" class="form-label">Nome da Categoria <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="catNome" maxlength="80" placeholder="Ex: Eletrônicos" required>
                        </div>
                        <div class="col-12">
                            <label for="catStatus" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-select" id="catStatus" required>
                                <option value="ativo" selected>Ativo</option>
                                <option value="inativo">Inativo</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="catDescricao" class="form-label">Descrição</label>
                            <textarea class="form-control" id="catDescricao" rows="3" maxlength="255" placeholder="Descrição opcional da categoria..."></textarea>
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
            // Data atual
            const dateBadge = document.getElementById('currentDate');
            const hoje = new Date();
            dateBadge.innerHTML = `<i class="bi bi-calendar3 me-1"></i> ${hoje.toLocaleDateString('pt-BR', { day: '2-digit', month: '2-digit', year: 'numeric' })}`;

            // Toggle Sidebar
            const btnToggleSidebar = document.getElementById('btnToggleSidebar');
            const btnMobileToggle = document.getElementById('btnMobileToggle');
            const body = document.body;

            if (btnToggleSidebar) {
                btnToggleSidebar.addEventListener('click', () => {
                    body.classList.toggle('sidebar-collapsed');
                });
            }

            if (btnMobileToggle) {
                btnMobileToggle.addEventListener('click', (e) => {
                    e.stopPropagation();
                    body.classList.toggle('sidebar-open');
                });
            }

            document.addEventListener('click', (e) => {
                if (body.classList.contains('sidebar-open') && !e.target.closest('#sidebar') && !e.target.closest('#btnMobileToggle')) {
                    body.classList.remove('sidebar-open');
                }
            });

            // Toggle Tema
            const btnThemeToggle = document.getElementById('btnThemeToggle');
            const themeIcon = document.getElementById('themeIcon');
            const htmlElement = document.documentElement;

            if (btnThemeToggle) {
                btnThemeToggle.addEventListener('click', () => {
                    const currentTheme = htmlElement.getAttribute('data-bs-theme');
                    if (currentTheme === 'light') {
                        htmlElement.setAttribute('data-bs-theme', 'dark');
                        if (themeIcon) themeIcon.className = 'bi bi-sun-fill';
                    } else {
                        htmlElement.setAttribute('data-bs-theme', 'light');
                        if (themeIcon) themeIcon.className = 'bi bi-moon-stars-fill';
                    }
                });
            }

            // Simulação de Submissão de Formulário
            document.getElementById('formNovaCategoria').addEventListener('submit', (e) => {
                e.preventDefault();
                const modalEl = document.getElementById('modalNovaCategoria');
                const modalInstance = bootstrap.Modal.getInstance(modalEl);
                modalInstance.hide();
                alert('Categoria cadastrada com sucesso!');
                e.target.reset();
            });
        });
    </script>
</body>
</html>