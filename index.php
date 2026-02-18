<!DOCTYPE html>
<html lang="pt-BR" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 12 Master Guide | Anderson Dev</title>
    <link rel="shortcut icon" href="https://laravel.com/img/favicon/favicon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="app-layout">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <a href="#" class="brand-logo">
                    <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel" width="30">
                    <span>Laravel<span class="text-primary">Guide</span></span>
                </a>
                <button class="btn-close-sidebar d-lg-none" onclick="toggleSidebar()">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <div class="sidebar-content">
                <div class="sidebar-label">Navegação</div>
                <nav class="sidebar-nav" id="sidebarNav">
                </nav>
            </div>

            <div class="sidebar-footer">
                <small>v2.0 &bull; Laravel 12</small>
            </div>
        </aside>

        <main class="main-content">
            <div class="backdrop-overlay" onclick="toggleSidebar()"></div>

            <header class="top-header">
                <div class="header-left">
                    <button class="mobile-menu-btn" onclick="toggleSidebar()">
                        <i class="bi bi-list"></i>
                    </button>
                    <div class="search-wrapper">
                        <i class="bi bi-search search-icon"></i>
                        <input type="text" id="searchInput" class="search-input"
                            placeholder="Buscar comando (ex: controller, sail, cache)..." autocomplete="off">
                        <span class="kbd-shortcut d-none d-md-block">/</span>
                    </div>
                </div>

                <div class="header-right">
                    <a href="https://laravel.com/docs" target="_blank" class="btn-doc-link d-none d-sm-flex">
                        Docs Oficial <i class="bi bi-box-arrow-up-right ms-2"></i>
                    </a>
                    <div class="theme-toggle" id="themeToggle" title="Alternar Tema">
                        <i class="bi bi-moon-stars"></i>
                    </div>
                </div>
            </header>

            <div class="container-fluid content-body">

                <div class="row g-4 mb-5">
                    <div class="col-xl-4 col-lg-6">
                        <div class="feature-card h-100">
                            <div class="card-icon bg-red-soft">
                                <i class="bi bi-rocket-takeoff-fill text-primary"></i>
                            </div>
                            <h3 class="card-title">Setup Inicial</h3>
                            <ul class="step-list">
                                <li>
                                    <span class="step-num">1</span>
                                    <code>composer create-project laravel/laravel app</code>
                                </li>
                                <li>
                                    <span class="step-num">2</span>
                                    <code>cd app</code>
                                </li>
                                <li>
                                    <span class="step-num">3</span>
                                    <span>Configurar <code>.env</code> (DB, App URL)</span>
                                </li>
                                <li>
                                    <span class="step-num">4</span>
                                    <code>php artisan migrate</code>
                                </li>
                                <li>
                                    <span class="step-num">5</span>
                                    <code>npm run dev</code> <small class="text-muted">+ artisan serve</small>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-6">
                        <div class="feature-card h-100">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="card-icon bg-blue-soft">
                                        <i class="bi bi-code-slash text-info"></i>
                                    </div>
                                    <h3 class="card-title mb-0">Dica Pro: Helper Global</h3>
                                </div>
                                <span class="badge bg-light text-dark border">Boas Práticas</span>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="guide-step">
                                        <small class="text-uppercase text-muted fw-bold"
                                            style="font-size: 0.7rem;">Passo 1</small>
                                        <div class="mb-1">Criar arquivo: <code>app/Helpers/custom.php</code></div>
                                        <pre class="code-snippet"><code>if (!function_exists('money_br')) {
    function money_br($value) {
        return 'R$ ' . number_format($value, 2, ',', '.');
    }
}</code></pre>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="guide-step">
                                        <small class="text-uppercase text-muted fw-bold"
                                            style="font-size: 0.7rem;">Passo 2</small>
                                        <div class="mb-1">Editar <code>composer.json</code>:</div>
                                        <pre class="code-snippet"><code>"autoload": {
    "psr-4": { ... },
    "files": ["app/Helpers/custom.php"]
}</code></pre>
                                        <div class="mt-2 text-end">
                                            <small class="text-muted">Finalizar:</small>
                                            <code>composer dump-autoload</code>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="divider-text">
                    <span>Referência Completa de Comandos</span>
                </div>

                <div id="commands-container"></div>

                <footer class="app-footer">
                    <p>Guia Master Laravel 12 &bull; Desenvolvido por Anderson Siqueira</p>
                </footer>
            </div>
        </main>

        <button id="backToTop" class="btn-back-top" onclick="scrollToTop()">
            <i class="bi bi-arrow-up"></i>
        </button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    /* === DADOS COMPLETOS E EXPANDIDOS === */
    const commandData = [{
            category: "Instalação & Start",
            icon: "bi-power",
            id: "lifecycle",
            commands: [{
                    cmd: "composer create-project laravel/laravel .",
                    desc: "Instala Laravel no diretório atual."
                },
                {
                    cmd: "laravel new app --git --pest",
                    desc: "Instalador global com Git e Pest."
                },
                {
                    cmd: "php artisan serve",
                    desc: "Inicia servidor local (8000)."
                },
                {
                    cmd: "php artisan down --secret='123'",
                    desc: "Modo manutenção (acesso via /123)."
                },
                {
                    cmd: "php artisan up",
                    desc: "Remove modo de manutenção."
                },
                {
                    cmd: "php artisan env:encrypt",
                    desc: "Encripta arquivo .env (segurança)."
                },
                {
                    cmd: "php artisan env:decrypt",
                    desc: "Decripta arquivo .env."
                }
            ]
        },
        {
            category: "Laravel Sail (Docker)",
            icon: "bi-docker",
            id: "sail",
            commands: [{
                    cmd: "./vendor/bin/sail up -d",
                    desc: "Inicia containers em background."
                },
                {
                    cmd: "./vendor/bin/sail stop",
                    desc: "Para todos os containers."
                },
                {
                    cmd: "./vendor/bin/sail artisan migrate",
                    desc: "Roda comando dentro do container."
                },
                {
                    cmd: "./vendor/bin/sail composer require pacote",
                    desc: "Composer via container."
                },
                {
                    cmd: "./vendor/bin/sail root-shell",
                    desc: "Acessa terminal como Root."
                },
                {
                    cmd: "php artisan sail:install",
                    desc: "Reinstala/Configura docker-compose."
                }
            ]
        },
        {
            category: "Geradores (Make)",
            icon: "bi-magic",
            id: "make",
            commands: [{
                    cmd: "php artisan make:model Produto -mfc",
                    desc: "Model + Migration + Factory + Controller."
                },
                {
                    cmd: "php artisan make:controller Api/UserController --api",
                    desc: "Controller API limpo."
                },
                {
                    cmd: "php artisan make:request StoreUserRequest",
                    desc: "Request para validação."
                },
                {
                    cmd: "php artisan make:resource UserResource",
                    desc: "API Resource (JSON)."
                },
                {
                    cmd: "php artisan make:component Alert --view",
                    desc: "Componente Blade simples."
                },
                {
                    cmd: "php artisan make:middleware CheckAdmin",
                    desc: "Middleware de rota."
                },
                {
                    cmd: "php artisan make:policy PostPolicy --model=Post",
                    desc: "Policy de autorização."
                },
                {
                    cmd: "php artisan make:observer UserObserver --model=User",
                    desc: "Observer de Model."
                },
                {
                    cmd: "php artisan make:rule Uppercase",
                    desc: "Regra de validação customizada."
                },
                {
                    cmd: "php artisan make:test UserTest",
                    desc: "Cria arquivo de Teste."
                }
            ]
        },
        {
            category: "Banco de Dados & Eloquent",
            icon: "bi-database-fill-gear",
            id: "db",
            commands: [{
                    cmd: "php artisan migrate",
                    desc: "Roda migrações pendentes."
                },
                {
                    cmd: "php artisan migrate:fresh --seed",
                    desc: "Reseta banco e roda seeds."
                },
                {
                    cmd: "php artisan migrate:rollback --step=1",
                    desc: "Desfaz a última migração."
                },
                {
                    cmd: "php artisan db:seed",
                    desc: "Executa DatabaseSeeder."
                },
                {
                    cmd: "php artisan db:table users",
                    desc: "Mostra registros da tabela no terminal."
                },
                {
                    cmd: "php artisan db:show",
                    desc: "Resumo do banco (Tamanho, conexões)."
                },
                {
                    cmd: "php artisan model:show User",
                    desc: "Inspeciona Model (colunas e relações)."
                },
                {
                    cmd: "php artisan db:wipe",
                    desc: "Apaga todas as tabelas (sem rollback)."
                }
            ]
        },
        {
            category: "Frontend & Assets",
            icon: "bi-filetype-js",
            id: "npm",
            commands: [{
                    cmd: "npm install",
                    desc: "Instala dependências do Node."
                },
                {
                    cmd: "npm run dev",
                    desc: "Servidor Vite (Hot Reload)."
                },
                {
                    cmd: "npm run build",
                    desc: "Compila para Produção."
                },
                {
                    cmd: "php artisan storage:link",
                    desc: "Link simbólico public/storage."
                }
            ]
        },
        {
            category: "Limpeza & Cache",
            icon: "bi-stars",
            id: "optimize",
            commands: [{
                    cmd: "php artisan optimize:clear",
                    desc: "Limpa TODOS os caches (Dev)."
                },
                {
                    cmd: "php artisan optimize",
                    desc: "Gera cache de Config/Rotas (Prod)."
                },
                {
                    cmd: "php artisan config:clear",
                    desc: "Limpa cache de configuração."
                },
                {
                    cmd: "php artisan view:clear",
                    desc: "Limpa views compiladas."
                },
                {
                    cmd: "php artisan route:clear",
                    desc: "Limpa cache de rotas."
                },
                {
                    cmd: "php artisan cache:clear",
                    desc: "Limpa cache da aplicação (Redis/File)."
                }
            ]
        },
        {
            category: "Filas & Agendamento",
            icon: "bi-clock-history",
            id: "queue",
            commands: [{
                    cmd: "php artisan queue:work --tries=3",
                    desc: "Processa fila."
                },
                {
                    cmd: "php artisan queue:listen",
                    desc: "Ouve fila (bom para dev)."
                },
                {
                    cmd: "php artisan queue:retry all",
                    desc: "Reprocessa falhas."
                },
                {
                    cmd: "php artisan queue:monitor default",
                    desc: "Monitora tamanho da fila."
                },
                {
                    cmd: "php artisan schedule:work",
                    desc: "Roda agendador localmente (Cron)."
                },
                {
                    cmd: "php artisan schedule:list",
                    desc: "Lista tarefas agendadas e horários."
                }
            ]
        },
        {
            category: "Segurança & Auth",
            icon: "bi-shield-lock",
            id: "security",
            commands: [{
                    cmd: "php artisan key:generate",
                    desc: "Gera nova APP_KEY."
                },
                {
                    cmd: "php artisan install:api",
                    desc: "Instala Sanctum/Passport."
                },
                {
                    cmd: "php artisan auth:clear-resets",
                    desc: "Limpa tokens de senha expirados."
                },
                {
                    cmd: "composer require laravel/breeze --dev",
                    desc: "Instala Breeze (Login)."
                }
            ]
        },
        {
            category: "Utilidades & Debug",
            icon: "bi-bug",
            id: "utils",
            commands: [{
                    cmd: "php artisan tinker",
                    desc: "Console interativo (REPL)."
                },
                {
                    cmd: "php artisan route:list --except-vendor",
                    desc: "Lista suas rotas."
                },
                {
                    cmd: "php artisan about",
                    desc: "Info do sistema e drivers."
                },
                {
                    cmd: "php artisan docs session",
                    desc: "Abre docs sobre Session."
                },
                {
                    cmd: "php artisan vendor:publish",
                    desc: "Publica configs de pacotes."
                },
                {
                    cmd: "php artisan stub:publish",
                    desc: "Personaliza arquivos 'make'."
                }
            ]
        }
    ];

    /* === LÓGICA DE RENDERIZAÇÃO === */
    const commandsContainer = document.getElementById('commands-container');
    const sidebarNav = document.getElementById('sidebarNav');
    const searchInput = document.getElementById('searchInput');

    function renderApp() {
        commandsContainer.innerHTML = '';
        sidebarNav.innerHTML = '';

        commandData.forEach(section => {
            // 1. Sidebar Link
            const link = document.createElement('a');
            link.href = `#${section.id}`;
            link.className = 'nav-link';
            link.innerHTML = `<i class="bi ${section.icon}"></i> ${section.category}`;
            // Fecha sidebar no mobile ao clicar
            link.onclick = () => {
                if (window.innerWidth < 992) toggleSidebar();
            };
            sidebarNav.appendChild(link);

            // 2. Seção Principal
            const sectionEl = document.createElement('div');
            sectionEl.className = 'category-section';
            sectionEl.id = section.id;

            const header = document.createElement('div');
            header.className = 'section-header';
            header.innerHTML = `
                <div class="icon-box"><i class="bi ${section.icon}"></i></div>
                <h2>${section.category}</h2>
            `;
            sectionEl.appendChild(header);

            const grid = document.createElement('div');
            grid.className = 'commands-grid';

            section.commands.forEach(c => {
                const card = document.createElement('div');
                card.className = 'command-card';
                // Highlight sintaxe básica
                const cmdHtml = c.cmd.replace(/(--[\w-='"]+)/g, '<span class="opt">$1</span>')
                    .replace(/(php artisan)/g, '<span class="core">$1</span>');

                card.innerHTML = `
                    <div class="card-content">
                        <div class="command-desc">${c.desc}</div>
                        <div class="code-wrapper">
                            <code class="code-line">${cmdHtml}</code>
                        </div>
                    </div>
                    <button class="btn-copy" onclick="copyToClipboard(this, '${c.cmd}')" aria-label="Copiar">
                        <i class="bi bi-clipboard"></i>
                    </button>
                `;
                grid.appendChild(card);
            });

            sectionEl.appendChild(grid);
            commandsContainer.appendChild(sectionEl);
        });

        setupScrollSpy();
    }

    /* === FUNCIONALIDADES === */

    // 1. Copiar Inteligente
    function copyToClipboard(btn, text) {
        navigator.clipboard.writeText(text).then(() => {
            const originalIcon = btn.innerHTML;
            btn.classList.add('copied');
            btn.innerHTML = `<i class="bi bi-check-lg"></i>`;

            setTimeout(() => {
                btn.classList.remove('copied');
                btn.innerHTML = `<i class="bi bi-clipboard"></i>`;
            }, 2000);
        });
    }

    // 2. Busca e Filtro
    searchInput.addEventListener('input', (e) => {
        const term = e.target.value.toLowerCase();

        document.querySelectorAll('.category-section').forEach(section => {
            let hasVisible = false;
            section.querySelectorAll('.command-card').forEach(card => {
                const text = card.textContent.toLowerCase();
                const match = text.includes(term);
                card.style.display = match ? 'flex' : 'none';
                if (match) hasVisible = true;
            });
            section.style.display = hasVisible ? 'block' : 'none';

            // Atualiza sidebar
            const link = document.querySelector(`a[href="#${section.id}"]`);
            if (link) link.style.display = hasVisible ? 'flex' : 'none';
        });
    });

    // Atalho de teclado "/" para busca
    document.addEventListener('keydown', (e) => {
        if (e.key === '/' && document.activeElement !== searchInput) {
            e.preventDefault();
            searchInput.focus();
        }
    });

    // 3. Tema (Dark/Light)
    const themeToggle = document.getElementById('themeToggle');
    const html = document.documentElement;
    const icon = themeToggle.querySelector('i');

    function setTheme(theme) {
        html.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
        icon.className = theme === 'dark' ? 'bi bi-sun-fill' : 'bi bi-moon-stars';
    }

    // Init Theme
    const savedTheme = localStorage.getItem('theme') || 'light';
    setTheme(savedTheme);

    themeToggle.addEventListener('click', () => {
        const current = html.getAttribute('data-theme');
        setTheme(current === 'light' ? 'dark' : 'light');
    });

    // 4. Sidebar Mobile
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('open');
        document.querySelector('.backdrop-overlay').classList.toggle('show');
    }

    // 5. Scroll Spy & Back to Top
    function setupScrollSpy() {
        const sections = document.querySelectorAll('.category-section');
        const navLinks = document.querySelectorAll('.nav-link');
        const backToTopBtn = document.getElementById('backToTop');

        window.addEventListener('scroll', () => {
            let current = '';

            // Back to top visibility
            if (window.scrollY > 300) backToTopBtn.classList.add('show');
            else backToTopBtn.classList.remove('show');

            // Spy logic
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                if (scrollY >= sectionTop - 150) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href').includes(current)) {
                    link.classList.add('active');
                }
            });
        });
    }

    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    // Inicialização
    document.addEventListener('DOMContentLoaded', renderApp);
    </script>
</body>

</html>