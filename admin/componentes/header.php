<header class="navbar navbar-expand px-3 shadow-sm align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-light border d-lg-none" type="button" id="btnMobileToggle" aria-label="Abrir menu">
                    <i class="bi bi-list fs-4"></i>
                </button>
                <form class="d-none d-md-flex" role="search">
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-end-0"><i class="bi bi-search text-muted"></i></span>
                        <input class="form-control border-start-0" type="search" placeholder="Buscar produtos, SKU, lotes..." aria-label="Pesquisar">
                    </div>
                </form>
            </div>

            <div class="d-flex align-items-center gap-3">
                
                <button type="button" class="btn btn-icon btn-light position-relative border" aria-label="Mensagens">
                    <i class="bi bi-chat-left-text"></i>
                </button>

                <button type="button" class="btn btn-icon btn-light position-relative border" aria-label="Notificações">
                    <i class="bi bi-bell"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        3
                        <span class="visually-hidden">notificações não lidas</span>
                    </span>
                </button>

                <button type="button" class="btn btn-light border" id="btnThemeToggle" aria-label="Alternar tema escuro/claro">
                    <i class="bi bi-moon-stars-fill" id="themeIcon"></i>
                </button>

                <div class="dropdown">
                    <button class="btn d-flex align-items-center gap-2 p-0 border-0" type="button" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="componentes/rock.jpg" alt="Foto de Perfil" class="rounded-circle object-fit-cover" width="38" height="38">
                        <span class="d-none d-md-inline fw-medium text-body fs-6">LEØ</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="dropdownUser">
                        <li><a class="dropdown-item d-flex align-items-center gap-2" href="#"><i class="bi bi-person"></i> Meu perfil</a></li>
                        <li><a class="dropdown-item d-flex align-items-center gap-2" href="#"><i class="bi bi-gear"></i> Configurações</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item d-flex align-items-center gap-2 text-danger" href="#"><i class="bi bi-box-arrow-left"></i> Sair</a></li>
                    </ul>
                </div>
            </div>
        </header>