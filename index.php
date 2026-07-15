<?php require_once '/componentes/config.php' ?>
<?php require_once __DIR__ . '/componentes/rotas.php' ?>
<?php require_once 'componentes/conexao.php' ?>

<?php /* if(!empty($_SESSION['adminstatus'])){
    header('Location:admin/');
    exit();
    
    }*/
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <!-- Configurações Fundamentais -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - StockMaster | Sistema de Controle de Estoque</title>

    <!-- Meta Tags para SEO e Navegador -->
    <meta name="description" content="Acesse o StockMaster, seu sistema inteligente e moderno para controle, gestão e otimização de estoque.">
    <meta name="keywords" content="controle de estoque, gestão de estoque, ERP, inventário, login, logística">
    <meta name="author" content="StockMaster Systems">
    <meta name="theme-color" content="#0d6efd">

    <!-- Favicon (SVG dinâmico via Data URI) -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%230d6efd'><path d='M8.186 1.113a.5.5 0 0 0-.372 0L1.84 3.5l2.47.988L8 2.912l3.69 1.576 2.47-.988-6.033-2.387zM15 4.239l-2.47.988L8 3.65 3.47 5.227 1 4.239V12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4.239z'/></svg>">

    <!-- Google Fonts (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons 1.11.3 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Estilos Customizados (CSS3 + Variáveis) -->
    <style>
        :root {
            --font-main: 'Poppins', system-ui, -apple-system, sans-serif;
            --bg-gradient: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0d6efd 100%);
            --card-bg: rgba(255, 255, 255, 0.98);
            --card-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
            --primary-color: #0d6efd;
            --primary-hover: #0b5ed7;
            --text-muted: #64748b;
        }

        body {
            font-family: var(--font-main);
            background: var(--bg-gradient);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin: 0;
            color: #334155;
        }

        .login-page {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .login-container {
            width: 100%;
            max-width: 440px;
        }

        .login-card {
            background: var(--card-bg);
            border-radius: 1.25rem;
            box-shadow: var(--card-shadow);
            padding: 2.5rem 2rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .brand-icon {
            width: 56px;
            height: 56px;
            background-color: rgba(13, 110, 253, 0.1);
            color: var(--primary-color);
            border-radius: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            margin-bottom: 1rem;
        }

        .form-floating>.form-control {
            border-radius: 0.75rem;
            border: 1px solid #cbd5e1;
        }

        .form-floating>.form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        }

        .btn-toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 5;
            background: none;
            border: none;
            color: var(--text-muted);
            padding: 0.5rem;
            cursor: pointer;
            border-radius: 0.5rem;
            transition: color 0.2s;
        }

        .btn-toggle-password:hover,
        .btn-toggle-password:focus {
            color: var(--primary-color);
            outline: none;
        }

        .btn-submit {
            padding: 0.8rem;
            border-radius: 0.75rem;
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.3px;
            transition: all 0.3s ease;
        }

        footer {
            text-align: center;
            padding: 1.25rem 1rem;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.875rem;
        }

        footer a {
            color: #fff;
            text-decoration: underline;
        }

        footer a:hover {
            color: #cbd5e1;
        }

        /* Animação para feedback de validação */
        .shake {
            animation: shake 0.4s cubic-bezier(.36, .07, .19, .97) both;
        }

        @keyframes shake {

            10%,
            90% {
                transform: translate3d(-1px, 0, 0);
            }

            20%,
            80% {
                transform: translate3d(2px, 0, 0);
            }

            30%,
            50%,
            70% {
                transform: translate3d(-4px, 0, 0);
            }

            40%,
            60% {
                transform: translate3d(4px, 0, 0);
            }
        }
    </style>
</head>

<body>

    <main class="login-page">
        <section class="login-container">
            <article class="login-card" id="loginCard">

                <!-- Cabeçalho do Card -->
                <header class="text-center mb-4">
                    <div class="brand-icon" aria-hidden="true">
                        <i class="bi bi-box-seam-fill"></i>
                    </div>
                    <h1 class="h3 fw-bold mb-1">StockMaster</h1>
                    <p class="text-muted small">Digite suas credenciais para gerenciar o estoque</p>
                </header>

                <!-- Área de Mensagens / Feedback Geral -->
                <!-- <div id="alertFeedback" class="alert d-none align-items-center" role="alert" aria-live="assertive">
                    <i id="alertIcon" class="bi me-2 fs-5"></i>
                    <div id="alertMessage"></div>
                </div> -->
                <div id="mensagemLogin" class="alert d-none"></div>

                <!-- Formulário de Login -->
                <form id="loginForm" novalidate>

                    <!-- Campo de E-mail / Usuário -->
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="userInput" id="userInput" placeholder="nome@empresa.com" required autocomplete="username">
                        <label for="userInput">E-mail ou Usuário</label>
                        <div class="invalid-feedback">
                            Por favor, informe um e-mail ou usuário válido.
                        </div>
                    </div>

                    <!-- Campo de Senha -->
                    <div class="mb-3 position-relative">
                        <div class="form-floating">
                            <input type="password" class="form-control pe-5" name="passwordInput"id="passwordInput" placeholder="Sua senha" required autocomplete="current-password">
                            <label for="passwordInput">Senha</label>
                            <button type="button" class="btn-toggle-password" id="togglePasswordBtn" aria-label="Mostrar senha" title="Mostrar senha">
                                <i class="bi bi-eye" id="toggleIcon"></i>
                            </button>
                            <div class="invalid-feedback">
                                Por favor, informe sua senha.
                            </div>
                        </div>
                    </div>

                    <!-- Opções Adicionais -->
                    <div class="d-flex justify-content-between align-items-center mb-4 fs-7">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="rememberMe">
                            <label class="form-check-label text-secondary small" for="rememberMe">
                                Lembrar-me
                            </label>
                        </div>
                        <a href="#forgot-password" class="text-decoration-none small fw-medium text-primary">Esqueceu a senha?</a>
                    </div>

                    <!-- Botão de Submissão -->
                    <button type="submit" class="btn btn-primary w-100 btn-submit d-flex justify-content-center align-items-center gap-2" id="btnSubmit">
                        <span id="btnText">Entrar no Sistema</span>
                        <span id="btnSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                    </button>
                </form>

            </article>
        </section>
    </main>

    <!-- Rodapé Semântico -->
    <footer>
        <p class="mb-1">&copy; 2026 StockMaster Control System. Todos os direitos reservados.</p>
        <p class="mb-0">
            <a href="#privacy">Política de Privacidade</a> &bull;
            <a href="#terms">Termos de Uso</a> &bull;
            <a href="#support">Suporte Técnico</a>
        </p>
    </footer>

    <!-- Bootstrap 5.3.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Lógica JavaScript (ES6+) -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const loginForm = document.getElementById('loginForm');
            const userInput = document.getElementById('userInput');
            const passwordInput = document.getElementById('passwordInput');
            const togglePasswordBtn = document.getElementById('togglePasswordBtn');
            const toggleIcon = document.getElementById('toggleIcon');
            const btnSubmit = document.getElementById('btnSubmit');
            const btnText = document.getElementById('btnText');
            const btnSpinner = document.getElementById('btnSpinner');
            const alertFeedback = document.getElementById('alertFeedback');
            const alertIcon = document.getElementById('alertIcon');
            const alertMessage = document.getElementById('alertMessage');
            const loginCard = document.getElementById('loginCard');

            // 1. Mostrar / Ocultar Senha
            togglePasswordBtn.addEventListener('click', () => {
                const isPassword = passwordInput.getAttribute('type') === 'password';
                passwordInput.setAttribute('type', isPassword ? 'text' : 'password');

                // Atualiza o ícone e acessibilidade
                toggleIcon.className = isPassword ? 'bi bi-eye-slash' : 'bi bi-eye';
                const labelText = isPassword ? 'Ocultar senha' : 'Mostrar senha';
                togglePasswordBtn.setAttribute('aria-label', labelText);
                togglePasswordBtn.setAttribute('title', labelText);
            });

            // 2. Exibição de Alertas do Sistema
            const showAlert = (message, type = 'danger') => {
                alertFeedback.className = `alert alert-${type} d-flex align-items-center mb-3`;
                alertIcon.className = `bi me-2 fs-5 ${type === 'danger' ? 'bi-exclamation-triangle-fill' : 'bi-check-circle-fill'}`;
                alertMessage.textContent = message;
                alertFeedback.classList.remove('d-none');
            };

            const hideAlert = () => {
                alertFeedback.classList.add('d-none');
            };

            // 3. Gerenciamento do Estado do Botão (Loading)
            const setLoadingState = (isLoading) => {
                if (isLoading) {
                    btnSubmit.disabled = true;
                    btnSpinner.classList.remove('d-none');
                    btnText.textContent = 'Autenticando...';
                } else {
                    btnSubmit.disabled = false;
                    btnSpinner.classList.add('d-none');
                    btnText.textContent = 'Entrar no Sistema';
                }
            };

            // 4. Submissão e Validação do Formulário
            loginForm.addEventListener('submit', (e) => {
                e.preventDefault();
                hideAlert();

                // Validação Nativa do HTML5
                if (!loginForm.checkValidity()) {
                    e.stopPropagation();
                    loginForm.classList.add('was-validated');

                    // Animação de erro na interface
                    loginCard.classList.remove('shake');
                    void loginCard.offsetWidth; // Força re-flow do DOM
                    loginCard.classList.add('shake');
                    return;
                }

                loginForm.classList.add('was-validated');
                setLoadingState(true);

                // Simulação de requisição de Login (API Async)
                setTimeout(() => {
                    const userVal = userInput.value.trim();
                    const passVal = passwordInput.value.trim();

                    // Credenciais de teste fictícias
                    if (userVal === 'admin@stockmaster.com' && passVal === '123456') {
                        showAlert('Login realizado com sucesso! Redirecionando...', 'success');
                        setTimeout(() => {
                            // Exemplo de redirecionamento futuro: window.location.href = '/dashboard';
                            setLoadingState(false);
                        }, 1500);
                    } else {
                        setLoadingState(false);
                        showAlert('Usuário ou senha inválidos. Tente novamente.', 'danger');

                        // Efeito visual de erro
                        loginCard.classList.remove('shake');
                        void loginCard.offsetWidth;
                        loginCard.classList.add('shake');
                    }
                }, 1200);
            });
        });
    </script>

    <script>
        const formLogin = document.getElementById('loginForm');
        const mensagemLogin = document.getElementById('mensagemLogin');
        const btnEntrar = document.getElementById('btnSubmit');

        formLogin.addEventListener('submit', async function(event) {
            event.preventDefault();

            limparMensagem();

            const dadosFormulario = new FormData(formLogin);

            btnEntrar.disabled = true;
            btnEntrar.textContent = 'Verificando...';

            try {
                const resposta = await fetch(
                    'componentes/LoginUsuario.php', {
                        method: 'POST',
                        body: dadosFormulario,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    }
                );

                const dados = await resposta.json();

                if (!resposta.ok || dados.sucesso !== true) {
                    throw new Error(
                        dados.mensagem || 'Não foi possível realizar o login.'
                    );
                }

                exibirMensagem(dados.mensagem, 'success');

                window.location.href =
                    dados.redirecionar || 'admin/index.php';

            } catch (erro) {
                exibirMensagem(erro.message, 'danger');

                document.getElementById('senha').value = '';
                document.getElementById('senha').focus();

            } finally {
                btnEntrar.disabled = false;
                btnEntrar.textContent = 'Entrar';
            }
        });

        function exibirMensagem(texto, tipo) {
            mensagemLogin.textContent = texto;
            mensagemLogin.className = `alert alert-${tipo}`;
        }

        function limparMensagem() {
            mensagemLogin.textContent = '';
            mensagemLogin.className = 'alert d-none';
        }
    </script>


</body>

</html>