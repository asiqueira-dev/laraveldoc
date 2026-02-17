<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guia Moderno de Comandos Laravel</title>
    <link rel="shortcut icon" href="images/iconlaravel.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-laravel sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="images/iconlaravel.png" alt="Laravel" width="30" height="30"
                    class="d-inline-block align-text-top me-2">
                Guia de Comandos Laravel
            </a>
            <div class="ms-auto">
                <div class="theme-switch-wrapper form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="themeSwitch">
                    <label class="form-check-label" for="themeSwitch"><i class="bi bi-moon-stars-fill"></i></label>
                </div>
            </div>
        </div>
    </nav>

    <div class="container my-5">

        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title h4">Pré-requisitos</h2>
                        <p>Antes de começar, certifique-se de ter:</p>
                        <ul>
                            <li><strong>PHP:</strong> Versão 8.1 ou superior.</li>
                            <li><strong>Composer:</strong> Gerenciador de dependências.</li>
                            <li><strong>Banco de Dados:</strong> MySQL, PostgreSQL, etc.</li>
                            <li><strong>Node.js e NPM:</strong> Para compilação de assets.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title h4">Criar Novo Projeto</h2>
                        <ol>
                            <li><code>composer create-project laravel/laravel nome-do-projeto</code></li>
                            <li><code>cd nome-do-projeto</code></li>
                            <li><code>php artisan serve</code></li>
                            <li>Acesse: <strong>http://localhost:8000</strong></li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title h4">Projeto Clonado (GitHub)</h2>
                        <ol>
                            <li><code>git clone [url-do-repositorio]</code></li>
                            <li><code>cd [repositorio]</code></li>
                            <li><code>composer install</code></li>
                            <li><code>cp .env.example .env</code></li>
                            <li><code>php artisan key:generate</code></li>
                            <li>Configure o <code>.env</code> (banco de dados).</li>
                            <li><code>php artisan migrate</code></li>
                            <li><code>php artisan serve</code></li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title h4">Criação do Helper</h2>
                        <p>Crie um arquivo de helper para funções personalizadas.</p>
                        <ol>
                            <li>
                                <strong>Criar Arquivo:</strong>
                                <br>
                                Crie <code>app/Helper/helpers.php</code>.
                                <a href="https://drive.usercontent.google.com/u/0/uc?id=11hChm426c2DiavXsvUj_bVH1xiRCcLeR&export=download"
                                    target="_blank" class="btn btn-sm btn-outline-primary mt-1">
                                    <i class="bi bi-download"></i> Baixar Exemplo
                                </a>
                            </li>
                            <li>
                                <strong>Registrar no <code>composer.json</code>:</strong>
                                <br>
                                Adicione em <code>"autoload"</code> -> <code>"files"</code>:
                                <pre class="code-snippet">"files": [
    "app/Helper/helpers.php"
]</pre>
                                <img src="images/registro_helper.png" class="img-fluid mt-2" alt="Registro do helper">
                            </li>
                            <li>
                                <strong>Atualizar Composer:</strong>
                                <br>
                                <code>composer update</code>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-5">

        <h1 class="mb-4">Comandos Laravel Organizados</h1>

        <div class="mb-4">
            <input type="text" id="searchInput" class="form-control form-control-lg"
                placeholder="Digite para buscar um comando ou descrição...">
        </div>

        <div id="categories-list">
        </div>
    </div>

    <button id="btnBackToTop" class="btn btn-primary shadow-lg">
        <i class="bi bi-arrow-up"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    const commandCategories = {
        "Gerenciamento de Projeto": [{
                command: "composer create-project laravel/laravel nome-do-projeto",
                description: "Cria um novo projeto Laravel."
            },
            {
                command: "composer create-project laravel/laravel .",
                description: "Cria um novo projeto, estando dentro da pasta."
            },
            {
                command: "php artisan serve",
                description: "Inicia o servidor de desenvolvimento."
            },
            {
                command: "php artisan key:generate",
                description: "Gera novamente a APP_KEY no arquivo .env."
            },
            {
                command: "php artisan about",
                description: "Exibe informações sobre a instalação do Laravel."
            },
            {
                command: "php artisan install:api",
                description: "(Laravel 11+) Instala o Sanctum e arquivos para modo API."
            },
            {
                command: "php artisan install:broadcasting",
                description: "(Laravel 11+) Instala arquivos para o broadcasting."
            }
        ],
        "Artisan Tinker": [{
            command: "php artisan tinker",
            description: "Inicia um console interativo (REPL) para interagir com a aplicação."
        }],
        "Manutenção": [{
                command: "php artisan down",
                description: "Coloca a aplicação em modo de manutenção."
            },
            {
                command: "php artisan down --secret=\"sua-senha\"",
                description: "Permite bypass da manutenção com um cookie."
            },
            {
                command: "php artisan up",
                description: "Tira a aplicação do modo de manutenção."
            }
        ],
        "Banco de Dados": [{
                command: "php artisan make:model NomeDoModelo -m",
                description: "Cria um novo modelo Eloquent e um arquivo de migração."
            },
            {
                command: "php artisan make:migration nome_da_migracao",
                description: "Cria um novo arquivo de migração (tabela) sem um Model."
            },
            {
                command: "php artisan make:factory NomeDaFactory",
                description: "Cria uma factory para gerar dados fictícios."
            },
            {
                command: "php artisan make:model NomeDoModelo -mf",
                description: "Cria um modelo com a migração e a factory."
            },
            {
                command: "php artisan make:seeder NomeDoSeeder",
                description: "Cria uma classe de seeder."
            },
            {
                command: "php artisan db:seed",
                description: "Executa os seeders para popular o banco."
            },
            {
                command: "php artisan migrate",
                description: "Executa as migrações no banco de dados."
            },
            {
                command: "php artisan migrate:fresh",
                description: "Limpa o banco de dados e aplica todas as migrações."
            },
            {
                command: "php artisan migrate:refresh",
                description: "Desfaz todas as migrações e executa-as novamente."
            },
            {
                command: "php artisan migrate:refresh --seed",
                description: "Desfaz, recria as migrações e executa os seeders."
            },
            {
                command: "php artisan migrate:rollback",
                description: "Desfaz o último lote de migrações."
            },
            {
                command: "php artisan migrate:reset",
                description: "Desfaz todas as migrações aplicadas."
            },
            {
                command: "php artisan migrate:status",
                description: "Exibe o status das migrações."
            },
            {
                command: "php artisan db:wipe",
                description: "Exclui todas as tabelas, views e dados."
            }
        ],
        "Geração de Código (Make)": [{
                command: "php artisan make:controller NomeController",
                description: "Cria um novo Controller."
            },
            {
                command: "php artisan make:controller NomeController --resource",
                description: "Cria um Controller com métodos RESTful (index, create, store, etc.)."
            },
            {
                command: "php artisan make:middleware NomeDoMiddleware",
                description: "Cria um middleware para requisições HTTP."
            },
            {
                command: "php artisan make:request NomeDoRequest",
                description: "Cria uma classe de request para validação de dados."
            },
            {
                command: "php artisan make:resource NomeDoResource",
                description: "Cria uma classe de Resource (transformação de API)."
            },
            {
                command: "php artisan make:mail NomeDoEmail",
                description: "Cria uma classe de Mailable."
            },
            {
                command: "php artisan make:notification NomeDaNotificacao",
                description: "Cria uma classe de Notificação."
            },
            {
                command: "php artisan make:event NomeDoEvento",
                description: "Cria um evento."
            },
            {
                command: "php artisan make:listener NomeDoListener",
                description: "Cria um listener para um evento."
            },
            {
                command: "php artisan make:job NomeDoJob",
                description: "Cria um job para processamento em fila."
            },
            {
                command: "php artisan make:policy NomeDaPolicy",
                description: "Cria uma policy para gerenciamento de permissões."
            },
            {
                command: "php artisan make:component NomeDoComponente",
                description: "Gera um componente Blade."
            },
            {
                command: "php artisan make:component NomeDaPasta/NomeDoComponente",
                description: "Gera um componente Blade em uma subpasta."
            },
            {
                command: "php artisan make:test NomeDoTeste",
                description: "Cria uma classe de teste."
            },
            {
                command: "php artisan make:test NomeDoTeste --unit",
                description: "Cria uma classe de teste unitário."
            },
            {
                command: "php artisan make:class NomeDaClasse",
                description: "Cria uma classe PHP simples."
            },
            {
                command: "php artisan make:enum NomeDoEnum",
                description: "Cria um Enum (PHP 8.1+)."
            },
            {
                command: "php artisan make:interface NomeDaInterface",
                description: "Cria uma Interface."
            },
            {
                command: "php artisan make:trait NomeDoTrait",
                description: "Cria um Trait."
            }
        ],
        "Laravel Volt & Livewire": [{
                command: "composer require livewire/livewire livewire/volt",
                description: "Instala o Livewire e o Volt."
            },
            {
                command: "php artisan volt:install",
                description: "Instala o Volt no projeto (baseado em componentes de arquivo único)."
            },
            {
                command: "php artisan make:livewire NomeDoComponente",
                description: "Cria um componente Livewire (classe e view)."
            }
        ],
        "Autenticação": [{
                command: "composer require laravel/ui",
                description: "Instala o pacote de scaffolding (Laravel UI)."
            },
            {
                command: "php artisan ui bootstrap --auth",
                description: "Gera a autenticação com Bootstrap e views."
            },
            {
                command: "composer require laravel/breeze --dev",
                description: "Instala o Laravel Breeze (solução leve)."
            },
            {
                command: "php artisan breeze:install",
                description: "Configura o Laravel Breeze no projeto (Blade, React ou Vue)."
            },
            {
                command: "composer require laravel/sanctum",
                description: "Instala o Laravel Sanctum (autenticação de API)."
            },
            {
                command: "php artisan vendor:publish --provider=\"Laravel\\Sanctum\\SanctumServiceProvider\"",
                description: "Publica o arquivo de config do Sanctum."
            }
        ],
        "Rotas e Middleware": [{
                command: "php artisan route:list",
                description: "Lista todas as rotas registradas no projeto."
            },
            {
                command: "php artisan route:cache",
                description: "Gera um cache para as rotas, melhorando o desempenho."
            },
            {
                command: "php artisan route:clear",
                description: "Remove o cache das rotas."
            }
        ],
        "Cache e Otimização": [{
                command: "php artisan optimize",
                description: "Otimiza cache de config, rotas e eventos."
            },
            {
                command: "php artisan optimize:clear",
                description: "Limpa todos os caches (config, rotas, views, etc.)."
            },
            {
                command: "php artisan config:cache",
                description: "Gera um cache para as configurações."
            },
            {
                command: "php artisan config:clear",
                description: "Remove o cache das configurações."
            },
            {
                command: "php artisan view:clear",
                description: "Limpa o cache de views compiladas."
            },
            {
                command: "php artisan cache:clear",
                description: "Limpa todo o cache do sistema (Redis, file, etc.)."
            }
        ],
        "Tradução e Validação (PT-BR)": [{
                command: "php artisan lang:publish",
                description: "Publica os arquivos de tradução padrão do Laravel."
            },
            {
                command: "composer require lucascudo/laravel-pt-br-localization --dev",
                description: "Instala o pacote de tradução PT-BR."
            },
            {
                command: "php artisan vendor:publish --tag=laravel-pt-br-localization",
                description: "Publica as traduções PT-BR."
            },
            {
                command: "composer require laravellegends/pt-br-validator",
                description: "Instalar a biblioteca de Validação (CPF, CNPJ, etc.)."
            }
        ],
        "Tarefas e Filas (Queues)": [{
                command: "php artisan queue:work",
                description: "Processa jobs em filas (executa 1 vez)."
            },
            {
                command: "php artisan queue:listen",
                description: "Escuta as filas e processa jobs em tempo real."
            },
            {
                command: "php artisan queue:restart",
                description: "Reinicia todos os workers de filas (após deploy)."
            }
        ],
        "Agendamento (Schedule)": [{
                command: "php artisan schedule:run",
                description: "Executa as tarefas agendadas (deve rodar a cada minuto via Cron)."
            },
            {
                command: "php artisan schedule:list",
                description: "Lista todas as tarefas agendadas."
            },
            {
                command: "php artisan schedule:test",
                description: "Executa uma tarefa agendada específica pelo nome."
            }
        ],
        "Testes": [{
                command: "php artisan test",
                description: "Executa todos os testes do projeto."
            },
            {
                command: "php artisan test --filter=NomeDoTeste",
                description: "Executa um teste ou método específico."
            }
        ],
        "Gerenciamento de Arquivos": [{
            command: "php artisan storage:link",
            description: "Cria o link simbólico 'public/storage' -> 'storage/app/public'."
        }],
        "Utilitários": [{
                command: "php artisan list",
                description: "Lista todos os comandos disponíveis no Artisan."
            },
            {
                command: "php artisan help nome_do_comando",
                description: "Exibe detalhes e opções para um comando."
            },
            {
                command: "php artisan env",
                description: "Exibe a variável de ambiente atual (padrão: production)."
            },
            {
                command: "php artisan config:show database",
                description: "Exibe os valores de configuração (ex: database)."
            },
            {
                command: "php artisan vendor:publish",
                description: "Lista todos os assets publicáveis de pacotes."
            }
        ]
    };


    /**
     * Função para copiar texto para a área de transferência com feedback visual.
     * Removemos o alert() e mudamos o estado do botão.
     */
    function copyToClipboard(button, text) {
        navigator.clipboard.writeText(text).then(() => {
            const originalText = button.innerHTML;
            const originalClass = button.className;

            // Mudar aparência do botão
            button.innerHTML = '<i class="bi bi-check-lg"></i> Copiado!';
            button.classList.remove('btn-primary');
            button.classList.add('btn-success');
            button.disabled = true;

            // Reverter após 2 segundos
            setTimeout(() => {
                button.innerHTML = originalText;
                button.className = originalClass;
                button.disabled = false;
            }, 2000);
        }).catch(err => {
            console.error('Não foi possível copiar o texto:', err);
            // Fallback para o alert se o clipboard falhar
            alert('Erro ao copiar. Copie manualmente: ' + text);
        });
    }

    /**
     * Renderiza as categorias e comandos dinamicamente
     */
    function renderCategories(commandCategories) {
        const categoriesList = document.getElementById('categories-list');
        categoriesList.innerHTML = ''; // Limpa a lista antes de renderizar

        for (const [category, commands] of Object.entries(commandCategories)) {
            // Cria o card da categoria
            const categoryCard = document.createElement('div');
            categoryCard.className = 'card category-box shadow-sm mb-4';

            const cardHeader = document.createElement('div');
            cardHeader.className = 'card-header';
            cardHeader.innerHTML = `<h2>${category}</h2>`;
            categoryCard.appendChild(cardHeader);

            const cardBody = document.createElement('div');
            cardBody.className = 'card-body';

            // Adiciona os comandos
            commands.forEach(({
                command,
                description
            }) => {
                const commandBox = document.createElement('div');
                commandBox.className = 'command-box';

                // Note o (this, '${command}') para passar o botão e o texto
                commandBox.innerHTML = `
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="command-details">
                                <p class="mb-1"><strong>${description}</strong></p>
                                <code>${command}</code>
                            </div>
                            <button class="btn btn-primary btn-copy btn-sm ms-3" onclick="copyToClipboard(this, '${command}')">
                                <i class="bi bi-clipboard"></i> Copiar
                            </button>
                        </div>
                    `;
                cardBody.appendChild(commandBox);
            });

            categoryCard.appendChild(cardBody);
            categoriesList.appendChild(categoryCard);
        }
    }

    /**
     * Funcionalidade de Busca (Filtro)
     */
    function setupSearch() {
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('keyup', () => {
            const filter = searchInput.value.toLowerCase();
            const commandBoxes = document.querySelectorAll('.command-box');
            const categoryBoxes = document.querySelectorAll('.category-box');

            let visibleCategories = new Set();

            // Filtra os comandos
            commandBoxes.forEach(box => {
                const description = box.querySelector('strong').textContent.toLowerCase();
                const command = box.querySelector('code').textContent.toLowerCase();

                if (description.includes(filter) || command.includes(filter)) {
                    box.style.display = 'block';
                    // Marca a categoria pai como visível
                    const parentCategory = box.closest('.category-box');
                    if (parentCategory) {
                        visibleCategories.add(parentCategory);
                    }
                } else {
                    box.style.display = 'none';
                }
            });

            // Mostra/Esconde categorias inteiras
            categoryBoxes.forEach(category => {
                if (visibleCategories.has(category)) {
                    category.style.display = 'block';
                } else {
                    category.style.display = 'none';
                }
            });
        });
    }

    /**
     * Funcionalidade de Dark Mode (Modo Escuro)
     */
    function setupDarkMode() {
        const themeSwitch = document.getElementById('themeSwitch');
        const currentTheme = localStorage.getItem('theme');

        if (currentTheme) {
            document.body.classList.add(currentTheme);
            if (currentTheme === 'dark-mode') {
                themeSwitch.checked = true;
            }
        }

        themeSwitch.addEventListener('change', function() {
            if (this.checked) {
                document.body.classList.add('dark-mode');
                localStorage.setItem('theme', 'dark-mode');
            } else {
                document.body.classList.remove('dark-mode');
                localStorage.setItem('theme', 'light-mode');
            }
        });
    }

    /**
     * Funcionalidade do Botão "Voltar ao Topo"
     */
    function setupBackToTop() {
        const btnBackToTop = document.getElementById('btnBackToTop');

        window.onscroll = () => {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                btnBackToTop.style.display = 'block';
            } else {
                btnBackToTop.style.display = 'none';
            }
        };

        btnBackToTop.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }


    // Inicialização
    document.addEventListener('DOMContentLoaded', () => {
        renderCategories(commandCategories);
        setupSearch();
        setupDarkMode();
        setupBackToTop();
    });
    </script>
</body>

</html>