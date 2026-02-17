<!DOCTYPE html>
<html lang="pt-BR" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 12 Master Guide | Comandos & Referência</title>
    <link rel="shortcut icon" href="https://laravel.com/img/favicon/favicon.ico">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="app-layout">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <a href="#" class="brand-logo">
                    <i class="bi bi-box-seam-fill"></i> Laravel Guide
                </a>
            </div>
            <nav class="sidebar-nav" id="sidebarNav">
            </nav>
        </aside>

        <main class="main-content">

            <header class="top-header">
                <div class="d-flex align-items-center flex-grow-1">
                    <button class="mobile-menu-btn" onclick="toggleSidebar()">
                        <i class="bi bi-list"></i>
                    </button>

                    <div class="search-wrapper">
                        <i class="bi bi-search search-icon"></i>
                        <input type="text" id="searchInput" class="search-input"
                            placeholder="Buscar comando (ex: controller, migrate, npm)...">
                    </div>
                </div>

                <div class="d-flex align-items-center ms-3">
                    <div class="theme-toggle" id="themeToggle">
                        <i class="bi bi-moon-stars"></i>
                    </div>
                </div>
            </header>

            <div class="container-fluid mb-5 p-0">
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="info-card shadow-sm">
                            <h3><i class="bi bi-rocket-takeoff me-2"></i>Início Rápido</h3>
                            <ol>
                                <li><code>composer create-project laravel/laravel app</code></li>
                                <li><code>cd app</code></li>
                                <li><code>composer install</code> & <code>npm install</code></li>
                                <li>Configurar <code>.env</code></li>
                                <li><code>php artisan migrate</code></li>
                                <li><code>npm run dev</code> (Vite)</li>
                                <li><code>php artisan serve</code></li>
                            </ol>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-6">
                        <div class="info-card shadow-sm">
                            <h3><i class="bi bi-magic me-2"></i>Guia: Criar Helper Global</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="helper-step">
                                        <strong>1. Criar Arquivo</strong><br>
                                        Crie <code>app/Helpers/functions.php</code>
                                    </div>
                                    <div class="helper-step">
                                        <strong>2. Adicionar Função</strong><br>
                                        <small>Exemplo:</small><br>
                                        <code>if (!function_exists('format_currency')) { ... }</code>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="helper-step">
                                        <strong>3. Registrar no composer.json</strong><br>
                                        No array "autoload":
                                        <pre class="mb-0 mt-1"
                                            style="background: var(--code-bg); color: var(--code-text); padding: 5px; border-radius: 4px; font-size: 0.8em;">"files": ["app/Helpers/functions.php"]</pre>
                                    </div>
                                    <div class="helper-step">
                                        <strong>4. Atualizar</strong><br>
                                        Execute: <code>composer dump-autoload</code>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="border-secondary opacity-25 my-5">

            <div id="commands-container">
            </div>

            <footer class="mt-5 py-4 text-center text-muted border-top border-secondary border-opacity-25">
                <p class="mb-0 small">Guia Atualizado para Laravel 12, PHP 8.2+ e Vite.</p>
            </footer>

        </main>
    </div>

    <div class="toast-container">
        <div id="copyToast" class="toast align-items-center text-white bg-success border-0" role="alert"
            aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-check-circle-fill me-2"></i> Comando copiado!
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    // === DADOS COMPLETOS ===
    // Organizados por categoria, com ícone e comandos atualizados
    const commandData = [{
            category: "Ciclo de Vida & Instalação",
            icon: "bi-box-seam",
            id: "lifecycle",
            commands: [{
                    cmd: "composer create-project laravel/laravel nome-projeto",
                    desc: "Cria novo projeto Laravel."
                },
                {
                    cmd: "laravel new nome-projeto",
                    desc: "Cria projeto via instalador global."
                },
                {
                    cmd: "php artisan serve",
                    desc: "Inicia servidor local (http://localhost:8000)."
                },
                {
                    cmd: "php artisan down",
                    desc: "Coloca site em modo manutenção (503)."
                },
                {
                    cmd: "php artisan up",
                    desc: "Remove modo de manutenção."
                },
                {
                    cmd: "php artisan about",
                    desc: "Mostra detalhes do ambiente (Versão, Cache, Drivers)."
                }
            ]
        },
        {
            category: "Composer (Dependências)",
            icon: "bi-cloud-download",
            id: "composer",
            commands: [{
                    cmd: "composer install",
                    desc: "Instala dependências listadas no composer.lock."
                },
                {
                    cmd: "composer update",
                    desc: "Atualiza dependências para versões mais recentes permitidas."
                },
                {
                    cmd: "composer require nome/pacote",
                    desc: "Adiciona um novo pacote ao projeto."
                },
                {
                    cmd: "composer remove nome/pacote",
                    desc: "Remove um pacote instalado."
                },
                {
                    cmd: "composer dump-autoload",
                    desc: "Regera o mapa de classes (útil ao criar Helpers ou mudar pastas)."
                },
                {
                    cmd: "composer show",
                    desc: "Lista todos os pacotes instalados."
                }
            ]
        },
        {
            category: "NPM & Vite (Frontend)",
            icon: "bi-filetype-js",
            id: "npm",
            commands: [{
                    cmd: "npm install",
                    desc: "Instala dependências Node (node_modules)."
                },
                {
                    cmd: "npm run dev",
                    desc: "Inicia servidor Vite para desenvolvimento (Hot Reload)."
                },
                {
                    cmd: "npm run build",
                    desc: "Compila assets para produção (pasta public/build)."
                },
                {
                    cmd: "npm update",
                    desc: "Atualiza pacotes NPM."
                }
            ]
        },
        {
            category: "Artisan Make (Geradores)",
            icon: "bi-code-square",
            id: "make",
            commands: [{
                    cmd: "php artisan make:controller NomeController",
                    desc: "Cria Controller simples."
                },
                {
                    cmd: "php artisan make:controller NomeController --resource",
                    desc: "Cria Controller com métodos CRUD."
                },
                {
                    cmd: "php artisan make:model Nome -mfc",
                    desc: "Cria Model + Migration + Factory + Controller."
                },
                {
                    cmd: "php artisan make:migration create_tabela_table",
                    desc: "Cria arquivo de migração."
                },
                {
                    cmd: "php artisan make:seeder NomeSeeder",
                    desc: "Cria classe para popular banco."
                },
                {
                    cmd: "php artisan make:request NomeRequest",
                    desc: "Cria Form Request (validação)."
                },
                {
                    cmd: "php artisan make:resource NomeResource",
                    desc: "Cria API Resource (transformação JSON)."
                },
                {
                    cmd: "php artisan make:component NomeComponente",
                    desc: "Cria componente Blade."
                },
                {
                    cmd: "php artisan make:job NomeJob",
                    desc: "Cria Job para filas."
                },
                {
                    cmd: "php artisan make:test NomeTeste",
                    desc: "Cria teste (Feature)."
                },
                {
                    cmd: "php artisan make:enum NomeEnum",
                    desc: "Cria Enum PHP (Laravel 11+)."
                },
                {
                    cmd: "php artisan make:class NomeClasse",
                    desc: "Cria classe genérica (Laravel 11+)."
                },
                {
                    cmd: "php artisan make:interface NomeInterface",
                    desc: "Cria Interface (Laravel 11+)."
                },
                {
                    cmd: "php artisan make:observer NomeObserver",
                    desc: "Cria Observer para Models."
                }
            ]
        },
        {
            category: "Banco de Dados",
            icon: "bi-database",
            id: "db",
            commands: [{
                    cmd: "php artisan migrate",
                    desc: "Executa migrações pendentes."
                },
                {
                    cmd: "php artisan migrate:fresh --seed",
                    desc: "Apaga tudo, recria tabelas e roda seeders."
                },
                {
                    cmd: "php artisan migrate:rollback",
                    desc: "Reverte o último lote de migrações."
                },
                {
                    cmd: "php artisan migrate:status",
                    desc: "Mostra quais migrações já rodaram."
                },
                {
                    cmd: "php artisan db:seed",
                    desc: "Roda os seeders (DatabaseSeeder)."
                },
                {
                    cmd: "php artisan db:show",
                    desc: "Mostra visão geral do banco de dados (Tamanho, conexões)."
                },
                {
                    cmd: "php artisan db:table nome_tabela",
                    desc: "Mostra detalhes e registros de uma tabela específica."
                },
                {
                    cmd: "php artisan model:show NomeModel",
                    desc: "Inspeciona atributos e relações de um Model."
                },
                {
                    cmd: "php artisan db:wipe",
                    desc: "Remove todas as tabelas (sem rodar rollback)."
                }
            ]
        },
        {
            category: "Cache & Otimização",
            icon: "bi-speedometer2",
            id: "optimize",
            commands: [{
                    cmd: "php artisan optimize",
                    desc: "Cache de config, rotas e arquivos (Produção)."
                },
                {
                    cmd: "php artisan optimize:clear",
                    desc: "Limpa TODOS os caches (Config, Route, View, Event)."
                },
                {
                    cmd: "php artisan config:clear",
                    desc: "Limpa apenas cache de configuração (útil ao mexer no .env)."
                },
                {
                    cmd: "php artisan route:list",
                    desc: "Lista todas as rotas registradas."
                },
                {
                    cmd: "php artisan route:clear",
                    desc: "Limpa cache de rotas."
                },
                {
                    cmd: "php artisan view:clear",
                    desc: "Limpa views Blade compiladas."
                }
            ]
        },
        {
            category: "Configuração & Instalação (Laravel 11/12)",
            icon: "bi-gear-wide-connected",
            id: "install",
            commands: [{
                    cmd: "php artisan install:api",
                    desc: "Instala e configura Laravel Sanctum para API."
                },
                {
                    cmd: "php artisan install:broadcasting",
                    desc: "Instala Laravel Reverb ou Pusher para sockets."
                },
                {
                    cmd: "php artisan key:generate",
                    desc: "Gera nova APP_KEY no .env."
                },
                {
                    cmd: "php artisan storage:link",
                    desc: "Cria atalho simbólico public/storage."
                },
                {
                    cmd: "php artisan vendor:publish",
                    desc: "Publica arquivos de configuração de pacotes."
                }
            ]
        },
        {
            category: "Filas (Queues)",
            icon: "bi-layers",
            id: "queue",
            commands: [{
                    cmd: "php artisan queue:work",
                    desc: "Inicia worker para processar fila."
                },
                {
                    cmd: "php artisan queue:listen",
                    desc: "Ouve filas (reinicia script a cada job - dev)."
                },
                {
                    cmd: "php artisan queue:retry all",
                    desc: "Tenta reprocessar jobs falhados."
                },
                {
                    cmd: "php artisan queue:clear",
                    desc: "Limpa todos os jobs da fila."
                },
                {
                    cmd: "php artisan schedule:work",
                    desc: "Executa agendador de tarefas localmente."
                }
            ]
        },
        {
            category: "Testes & Debug",
            icon: "bi-bug",
            id: "debug",
            commands: [{
                    cmd: "php artisan tinker",
                    desc: "Console interativo PHP (REPL)."
                },
                {
                    cmd: "php artisan test",
                    desc: "Executa suite de testes (Pest ou PHPUnit)."
                },
                {
                    cmd: "php artisan test --filter=NomeMetodo",
                    desc: "Executa apenas um teste específico."
                },
                {
                    cmd: "php artisan env",
                    desc: "Exibe o ambiente atual (local/production)."
                }
            ]
        }
    ];

    // === RENDERIZAÇÃO ===
    const commandsContainer = document.getElementById('commands-container');
    const sidebarNav = document.getElementById('sidebarNav');
    const searchInput = document.getElementById('searchInput');

    function renderAll() {
        // Limpar
        commandsContainer.innerHTML = '';
        sidebarNav.innerHTML = '';

        commandData.forEach(section => {
            // 1. Renderizar link na Sidebar
            const navItem = document.createElement('a');
            navItem.href = `#${section.id}`;
            navItem.className = 'nav-link';
            navItem.innerHTML = `<i class="bi ${section.icon}"></i> ${section.category}`;
            sidebarNav.appendChild(navItem);

            // 2. Renderizar Seção Principal
            const sectionDiv = document.createElement('div');
            sectionDiv.className = 'category-section';
            sectionDiv.id = section.id;

            const title = document.createElement('h2');
            title.className = 'category-title';
            title.innerHTML = `<i class="bi ${section.icon}"></i> ${section.category}`;
            sectionDiv.appendChild(title);

            const grid = document.createElement('div');
            grid.className = 'commands-grid';

            section.commands.forEach(c => {
                const card = document.createElement('div');
                card.className = 'command-card';
                card.innerHTML = `
                        <div class="command-desc">${c.desc}</div>
                        <div class="code-container">
                            <span class="code-text">${c.cmd}</span>
                            <button class="btn-copy-icon" onclick="copyText('${c.cmd}')" title="Copiar">
                                <i class="bi bi-clipboard"></i>
                            </button>
                        </div>
                    `;
                grid.appendChild(card);
            });

            sectionDiv.appendChild(grid);
            commandsContainer.appendChild(sectionDiv);
        });

        // Scroll Spy Simplificado (Highlight sidebar)
        window.addEventListener('scroll', onScrollSpy);
    }

    // === FUNCIONALIDADES ===

    // 1. Copiar com Toast
    function copyText(text) {
        navigator.clipboard.writeText(text).then(() => {
            const toastEl = document.getElementById('copyToast');
            const toast = new bootstrap.Toast(toastEl);
            toast.show();
        });
    }

    // 2. Busca (Filtra sidebar E cards)
    searchInput.addEventListener('input', (e) => {
        const term = e.target.value.toLowerCase();
        const sections = document.querySelectorAll('.category-section');
        const links = document.querySelectorAll('.sidebar-nav .nav-link');

        sections.forEach(section => {
            const cards = section.querySelectorAll('.command-card');
            let hasVisible = false;

            cards.forEach(card => {
                const txt = card.textContent.toLowerCase();
                if (txt.includes(term)) {
                    card.style.display = 'flex';
                    hasVisible = true;
                } else {
                    card.style.display = 'none';
                }
            });

            // Esconde a seção se não tiver cards visíveis
            section.style.display = hasVisible ? 'block' : 'none';

            // Esconde link da sidebar
            const link = document.querySelector(`a[href="#${section.id}"]`);
            if (link) link.style.display = hasVisible ? 'flex' : 'none';
        });
    });

    // 3. Dark Mode
    const themeToggle = document.getElementById('themeToggle');
    const html = document.documentElement;

    // Carregar tema salvo
    if (localStorage.getItem('theme') === 'dark') {
        html.setAttribute('data-theme', 'dark');
        themeToggle.innerHTML = '<i class="bi bi-sun-fill"></i>';
    }

    themeToggle.addEventListener('click', () => {
        if (html.getAttribute('data-theme') === 'light') {
            html.setAttribute('data-theme', 'dark');
            themeToggle.innerHTML = '<i class="bi bi-sun-fill"></i>';
            localStorage.setItem('theme', 'dark');
        } else {
            html.setAttribute('data-theme', 'light');
            themeToggle.innerHTML = '<i class="bi bi-moon-stars"></i>';
            localStorage.setItem('theme', 'light');
        }
    });

    // 4. Mobile Sidebar
    const sidebar = document.getElementById('sidebar');

    function toggleSidebar() {
        sidebar.classList.toggle('open');
    }

    // Fechar sidebar ao clicar fora (mobile)
    document.addEventListener('click', (e) => {
        if (window.innerWidth < 992) {
            if (!sidebar.contains(e.target) && !e.target.closest('.mobile-menu-btn')) {
                sidebar.classList.remove('open');
            }
        }
    });

    // 5. Scroll Spy (Ativar link da sidebar ao rolar)
    function onScrollSpy() {
        const sections = document.querySelectorAll('.category-section');
        const navLinks = document.querySelectorAll('.nav-link');

        let current = '';
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
    }

    // Init
    document.addEventListener('DOMContentLoaded', renderAll);
    </script>
</body>

</html>