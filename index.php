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
                <small>v1.2.0 &bull; Laravel 12</small>
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
                            placeholder="Buscar comando (ex: controller, sail, auth)..." autocomplete="off">
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
                                    <h3 class="card-title mb-0">Receita: Helper Global</h3>
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
                    <span>Referência de Comandos</span>
                </div>

                <div id="commands-container"></div>

                <footer class="app-footer">
                    <p>Desenvolvido com <i class="bi bi-heart-fill text-danger mx-1"></i> para Laravel 12 & PHP 8.2+</p>
                </footer>
            </div>
        </main>

        <button id="backToTop" class="btn-back-top" onclick="scrollToTop()">
            <i class="bi bi-arrow-up"></i>
        </button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    /* === DADOS DOS COMANDOS (EXPANDIDO) === */
    const commandData = [{
            category: "Ciclo de Vida & Instalação",
            icon: "bi-box-seam",
            id: "lifecycle",
            commands: [{
                    cmd: "composer create-project laravel/laravel .",
                    desc: "Instala Laravel no diretório atual (vazio)."
                },
                {
                    cmd: "laravel new app --git --pest",
                    desc: "Instalador global com Git e Pest já configurados."
                },
                {
                    cmd: "php artisan serve",
                    desc: "Inicia servidor de desenvolvimento."
                },
                {
                    cmd: "php artisan down --secret='123'",
                    desc: "Modo manutenção com bypass via URL/123."
                },
                {
                    cmd: "php artisan up",
                    desc: "Coloca a aplicação online novamente."
                },
                {
                    cmd: "php artisan about",
                    desc: "Overview completa (Drivers, Versões, Cache)."
                }
            ]
        },
        {
            category: "Laravel Sail (Docker)",
            icon: "bi-docker",
            id: "sail",
            commands: [{
                    cmd: "./vendor/bin/sail up -d",
                    desc: "Sobe os containers Docker em background."
                },
                {
                    cmd: "./vendor/bin/sail stop",
                    desc: "Para os containers."
                },
                {
                    cmd: "./vendor/bin/sail artisan migrate",
                    desc: "Roda comando artisan DENTRO do container."
                },
                {
                    cmd: "./vendor/bin/sail composer require pacote",
                    desc: "Composer via container."
                },
                {
                    cmd: "./vendor/bin/sail shell",
                    desc: "Acessa o terminal do container da aplicação."
                },
                {
                    cmd: "php artisan sail:install",
                    desc: "Instala/Reconfigura o docker-compose.yml."
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
                    desc: "Controller API (sem create/edit)."
                },
                {
                    cmd: "php artisan make:request StoreUserRequest",
                    desc: "Form Request para validação."
                },
                {
                    cmd: "php artisan make:resource UserResource",
                    desc: "API Resource (JSON Transformer)."
                },
                {
                    cmd: "php artisan make:component Alert --view",
                    desc: "Componente Blade (apenas view)."
                },
                {
                    cmd: "php artisan make:job ProcessPodcast",
                    desc: "Job para processamento em fila."
                },
                {
                    cmd: "php artisan make:mail WelcomeEmail",
                    desc: "Classe de envio de e-mail (Mailable)."
                },
                {
                    cmd: "php artisan make:notification InvoicePaid",
                    desc: "Notificação (Email/Database/Slack)."
                },
                {
                    cmd: "php artisan make:enum UserStatus",
                    desc: "PHP Enum (Laravel 11+)."
                },
                {
                    cmd: "php artisan make:trait Searchable",
                    desc: "Cria uma Trait."
                },
                {
                    cmd: "php artisan make:scope ActiveScope",
                    desc: "Cria um Query Scope reutilizável."
                }
            ]
        },
        {
            category: "Banco de Dados & Migrations",
            icon: "bi-database-fill-gear",
            id: "db",
            commands: [{
                    cmd: "php artisan migrate",
                    desc: "Executa migrações pendentes."
                },
                {
                    cmd: "php artisan migrate:fresh --seed",
                    desc: "Destrói DB, recria tabelas e roda seeds."
                },
                {
                    cmd: "php artisan migrate:status",
                    desc: "Verifica quais migrações já rodaram."
                },
                {
                    cmd: "php artisan db:seed --class=UserSeeder",
                    desc: "Roda um Seeder específico."
                },
                {
                    cmd: "php artisan db:show",
                    desc: "Painel visual do banco (Tabelas e tamanhos)."
                },
                {
                    cmd: "php artisan db:monitor",
                    desc: "Verifica conexões ativas no banco."
                },
                {
                    cmd: "php artisan schema:dump",
                    desc: "Exporta schema atual para arquivo SQL (Performance)."
                },
                {
                    cmd: "php artisan model:prune",
                    desc: "Remove modelos antigos (Soft Deletes/Prunable)."
                }
            ]
        },
        {
            category: "NPM & Vite (Frontend)",
            icon: "bi-filetype-js",
            id: "npm",
            commands: [{
                    cmd: "npm install && npm run dev",
                    desc: "Instala libs e roda servidor Vite."
                },
                {
                    cmd: "npm run build",
                    desc: "Compilação otimizada para produção."
                },
                {
                    cmd: "php artisan storage:link",
                    desc: "Link simbólico para arquivos públicos."
                }
            ]
        },
        {
            category: "Cache & Performance",
            icon: "bi-lightning-charge-fill",
            id: "optimize",
            commands: [{
                    cmd: "php artisan optimize",
                    desc: "Cacheia Configs, Rotas e Arquivos (PROD)."
                },
                {
                    cmd: "php artisan optimize:clear",
                    desc: "Limpa TODOS os caches (Dev)."
                },
                {
                    cmd: "php artisan route:list --except-vendor",
                    desc: "Lista rotas da aplicação (oculta libs)."
                },
                {
                    cmd: "php artisan config:clear",
                    desc: "Limpa cache de configuração."
                },
                {
                    cmd: "php artisan view:cache",
                    desc: "Pré-compila todas as views Blade."
                }
            ]
        },
        {
            category: "Filas (Queues)",
            icon: "bi-layers-half",
            id: "queue",
            commands: [{
                    cmd: "php artisan queue:work --tries=3",
                    desc: "Processa fila com máx de 3 tentativas."
                },
                {
                    cmd: "php artisan queue:listen",
                    desc: "Ouve fila (recarrega código a cada job - lento)."
                },
                {
                    cmd: "php artisan queue:retry all",
                    desc: "Tenta reprocessar todos jobs falhados."
                },
                {
                    cmd: "php artisan queue:failed",
                    desc: "Lista jobs que deram erro."
                },
                {
                    cmd: "php artisan queue:clear",
                    desc: "Limpa a fila (Cuidado)."
                }
            ]
        },
        {
            category: "Segurança & Auth",
            icon: "bi-shield-lock-fill",
            id: "security",
            commands: [{
                    cmd: "composer require laravel/breeze --dev",
                    desc: "Instala pacote de Auth leve."
                },
                {
                    cmd: "php artisan install:api",
                    desc: "Configura Sanctum para API Tokens."
                },
                {
                    cmd: "php artisan key:generate",
                    desc: "Rotaciona a chave de criptografia (APP_KEY)."
                },
                {
                    cmd: "php artisan auth:clear-resets",
                    desc: "Limpa tokens de reset de senha expirados."
                }
            ]
        },
        {
            category: "Utilitários & Debug",
            icon: "bi-bug-fill",
            id: "utils",
            commands: [{
                    cmd: "php artisan tinker",
                    desc: "Shell interativo PHP (REPL)."
                },
                {
                    cmd: "php artisan docs session",
                    desc: "Abre a documentação sobre Session (L11+)."
                },
                {
                    cmd: "php artisan inspect:views",
                    desc: "Analisa views em busca de erros (L11+)."
                },
                {
                    cmd: "php artisan stub:publish",
                    desc: "Publica stubs para personalizar 'artisan make'."
                },
                {
                    cmd: "php artisan lang:publish",
                    desc: "Publica arquivos de tradução."
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
                const cmdHtml = c.cmd.replace(/(--[\w-]+)/g, '<span class="opt">$1</span>')
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