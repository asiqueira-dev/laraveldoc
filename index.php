<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comandos Laravel</title>
    <link rel="shortcut icon" href="images/iconlaravel.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>
</head>

<body>
    <div class="container my-5">
        <h1 class="mb-4">Guia Laravel</h1>

        <!-- Pré-requisitos -->
        <section class="mb-5">
            <h2>Pré-requisitos para Criar e Desenvolver um Projeto Laravel</h2>
            <p>Antes de começar a trabalhar com Laravel, certifique-se de ter os seguintes requisitos instalados:</p>
            <ul>
                <li><strong>PHP:</strong> Versão 8.1 ou superior.</li>
                <li><strong>Composer:</strong> Gerenciador de dependências para PHP.</li>
                <li><strong>Banco de Dados:</strong> MySQL, PostgreSQL, SQLite ou outro suportado pelo Laravel.</li>
                <li><strong>Node.js e NPM:</strong> Necessários para compilação de assets front-end (opcional, mas
                    recomendado).</li>
            </ul>
        </section>

        <!-- Criando um Novo Projeto Laravel -->
        <section class="mb-5">
            <h2>Passo a Passo para Criar um Novo Projeto Laravel</h2>
            <ol>
                <li>
                    Abra o terminal e execute o comando:
                    <strong>composer create-project laravel/laravel nome-do-projeto</strong>
                </li>
                <li>
                    Entre na pasta do projeto recém-criado:
                    <strong>cd nome-do-projeto</strong>
                </li>
                <li>
                    Inicie o servidor local de desenvolvimento:
                    <strong>php artisan serve</strong>
                </li>
                <li>
                    Abra o navegador e acesse:
                    <strong>http://localhost:8000</strong>
                </li>
            </ol>
        </section>

        <!-- Criação do Helper -->
        <section class="mb-5">
            <h2>Criação do Helper</h2>
            <p>
                Crie um arquivo de helper para sua aplicação. O helper é importante para personalizar funções
                específicas do seu projeto. Caso não saiba como fazer, siga as orientações abaixo:
            </p>
            <ol>
                <li>
                    Criação do Arquivo helpers.php
                    <br>
                    <strong>
                        Crie uma pasta chamada <code>Helper</code> dentro de <code>app</code> e, em seguida,
                        <a href="https://drive.usercontent.google.com/u/0/uc?id=11hChm426c2DiavXsvUj_bVH1xiRCcLeR&export=download"
                            target="_blank">
                            baixe aqui
                        </a> o arquivo e coloque-o dentro desta pasta.
                    </strong>
                </li>
                <li>
                    Registro no <code>composer.json</code>
                    <br>
                    <strong>Registre o helper no autoload do arquivo <code>composer.json</code> dentro de
                        autoload</strong>
                    <br>
                    <img src="images/registro_helper.png" width="300" height="200"
                        alt="Registro do helper no composer.json">
                </li>
                <li>
                    Atualização do Composer:
                    <strong>composer update</strong>
                </li>
            </ol>
        </section>

        <!-- Executando Projeto Laravel Clonado -->
        <section class="mb-5">
            <h2>Passo a Passo para Executar um Projeto Laravel Clonado do GitHub</h2>
            <ol>
                <li>
                    Clone o repositório desejado:
                    <strong>git clone https://github.com/usuario/repositorio.git</strong>
                </li>
                <li>
                    Entre na pasta do projeto:
                    <strong>cd repositorio</strong>
                </li>
                <li>
                    Instale as dependências do projeto:
                    <strong>composer install</strong>
                </li>
                <li>
                    Copie o arquivo <code>.env.example</code> para <code>.env</code>:
                    <strong>cp .env.example .env</strong>
                </li>
                <li>
                    Gere a chave da aplicação:
                    <strong>php artisan key:generate</strong>
                </li>
                <li>
                    Configure as informações do banco de dados no arquivo <code>.env</code>.
                </li>
                <li>
                    Execute as migrações para criar as tabelas no banco de dados:
                    <strong>php artisan migrate</strong>
                </li>
                <li>
                    Inicie o servidor local de desenvolvimento:
                    <strong>php artisan serve</strong>
                </li>
            </ol>
        </section>

        <!-- Comandos Laravel Organizados -->
        <h1 class="mb-4">Comandos Laravel Organizados</h1>
        <p class="text-muted">Clique no botão "Copiar" para copiar os comandos para sua área de transferência.</p>

        <div id="categories-list">
            <!-- Categorias e comandos serão carregados dinamicamente aqui -->
        </div>
    </div>


    <script>
    // const commandCategories = {
    //     "Gerenciamento de Projeto": [{
    //             command: "composer create-project laravel/laravel nome-do-projeto",
    //             description: "Cria um novo projeto Laravel."
    //         },
    //         {
    //             command: "composer create-project laravel/laravel .",
    //             description: "Cria um novo projeto, estando dentro da pasta."
    //         },
    //         {
    //             command: "php artisan serve",
    //             description: "Inicia o servidor de desenvolvimento."
    //         },
    //         {
    //             command: "php artisan key:generate",
    //             description: "Gera novamente a APP_KEY no arquivo .env."
    //         }
    //     ],
    //     "Banco de Dados": [{
    //             command: "php artisan make:model NomeDoModelo -m",
    //             description: "Cria um novo modelo Eloquent e um arquivo de migração."
    //         },
    //         {
    //             command: "php artisan make:seeder NomeDoSeeder",
    //             description: "Cria uma classe de seeder para popular o banco de dados."
    //         },
    //         {
    //             command: "php artisan db:seed",
    //             description: "Executa os seeders para popular o banco de dados."
    //         },
    //         {
    //             command: "php artisan migrate",
    //             description: "Executa as migrações no banco de dados."
    //         },
    //         {
    //             command: "php artisan migrate:refresh",
    //             description: "Desfaz todas as migrações e executa-as novamente (ideal para testes)."
    //         },
    //         {
    //             command: "php artisan migrate:refresh --seed",
    //             description: "Desfaz todas as migrações, recria-as e executa os seeders automaticamente."
    //         },
    //         {
    //             command: "php artisan make:factory NomeDaFactory",
    //             description: "Cria uma factory para gerar dados fictícios para o banco de dados."
    //         },
    //         {
    //             command: "php artisan make:model NomeDoModelo -mf",
    //             description: "Cria um modelo com a migração e a factory."
    //         },
    //         {
    //             command: "php artisan migrate:rollback",
    //             description: "Desfaz as últimas migrações aplicadas no banco de dados."
    //         },
    //         {
    //             command: "php artisan migrate:reset",
    //             description: "Desfaz todas as migrações aplicadas no banco de dados."
    //         },
    //         {
    //             command: "php artisan migrate:status",
    //             description: "Exibe o status das migrações (executadas ou pendentes)."
    //         },
    //         {
    //             command: "php artisan db:wipe",
    //             description: "Exclui todas as tabelas, visualizações e dados do banco de dados."
    //         }
    //     ],
    //     "Autenticação": [{
    //             command: "composer require laravel/ui",
    //             description: "Instala o pacote de scaffolding de autenticação (Laravel UI)."
    //         },
    //         {
    //             command: "php artisan ui bootstrap --auth",
    //             description: "Gera a autenticação com Bootstrap e views padrão."
    //         },
    //         {
    //             command: "composer require laravel/breeze --dev",
    //             description: "Instala o Laravel Breeze, uma solução leve para autenticação."
    //         },
    //         {
    //             command: "php artisan breeze:install",
    //             description: "Configura o Laravel Breeze no projeto."
    //         },
    //         {
    //             command: "composer require laravel/sanctum",
    //             description: "Instala o Laravel Sanctum para autenticação de API."
    //         },
    //         {
    //             command: "php artisan vendor:publish --provider=\"Laravel\\Sanctum\\SanctumServiceProvider\"",
    //             description: "Publica o arquivo de configuração do Laravel Sanctum."
    //         }
    //     ],
    //     "Rotas e Middleware": [{
    //             command: "php artisan route:list",
    //             description: "Lista todas as rotas registradas no projeto."
    //         },
    //         {
    //             command: "php artisan make:middleware NomeDoMiddleware",
    //             description: "Cria um middleware para tratamento de requisições HTTP."
    //         },
    //         {
    //             command: "php artisan route:cache",
    //             description: "Gera um cache para as rotas, melhorando o desempenho."
    //         }
    //     ],
    //     "Cache e Otimização": [{
    //             command: "php artisan config:cache",
    //             description: "Gera um arquivo cache para as configurações do projeto."
    //         },
    //         {
    //             command: "php artisan cache:clear",
    //             description: "Limpa todo o cache do sistema."
    //         },
    //         {
    //             command: "php artisan config:clear",
    //             description: "Remove o cache das configurações do sistema."
    //         },
    //         {
    //             command: "php artisan optimize",
    //             description: "Otimiza o cache de arquivos de configuração, rotas e eventos."
    //         },
    //         {
    //             command: "php artisan optimize:clear",
    //             description: "Limpa todos os caches de configuração, rotas, eventos e views."
    //         }
    //     ],
    //     "Tradução e Internacionalização": [{
    //             command: "composer require laravel-lang/publisher --dev",
    //             description: "Instala o pacote para traduzir o Laravel para português."
    //         },
    //         {
    //             command: "php artisan lang:add pt",
    //             description: "Adiciona os arquivos de tradução para português no projeto."
    //         }
    //     ],
    //     "Tarefas e Filas": [{
    //             command: "php artisan make:job NomeDoJob",
    //             description: "Cria um job para processamento em filas (queue)."
    //         },
    //         {
    //             command: "php artisan queue:work",
    //             description: "Processa jobs em filas do sistema."
    //         }
    //     ],
    //     "Testes": [{
    //             command: "php artisan test",
    //             description: "Executa todos os testes do projeto."
    //         },
    //         {
    //             command: "php artisan make:test NomeDoTeste",
    //             description: "Cria uma classe de teste para validação de código."
    //         },
    //         {
    //             command: "php artisan make:test NomeDoTeste --unit",
    //             description: "Cria uma classe de teste unitário para validação de métodos específicos."
    //         }
    //     ],
    //     "Eventos e Listeners": [{
    //             command: "php artisan make:event NomeDoEvento",
    //             description: "Cria um evento para disparar ações no sistema."
    //         },
    //         {
    //             command: "php artisan make:listener NomeDoListener",
    //             description: "Cria um listener para reagir a eventos no sistema."
    //         }
    //     ],
    //     "Gerenciamento de Arquivos e Storage": [{
    //         command: "php artisan storage:link",
    //         description: "Cria um link simbólico para o diretório 'storage/app/public'."
    //     }],
    //     "Políticas e Permissões": [{
    //         command: "php artisan make:policy NomeDaPolicy",
    //         description: "Cria uma policy para gerenciar permissões de usuários."
    //     }],
    //     "Requests e Validações": [{
    //         command: "php artisan make:request NomeDoRequest",
    //         description: "Cria uma classe de request para validação de dados de entrada."
    //     }],
    //     "Utilitários": [{
    //             command: "php artisan list",
    //             description: "Lista todos os comandos disponíveis no Artisan."
    //         },
    //         {
    //             command: "php artisan help nome_do_comando",
    //             description: "Exibe detalhes e opções para um comando específico do Artisan."
    //         },
    //         {
    //             command: "php artisan make:component NomeDoComponente",
    //             description: "Gera um componente Blade com lógica PHP e template para reutilização na interface."
    //         }
    //     ]
    // };

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
            }
        ],
        "Banco de Dados": [{
                command: "php artisan make:model NomeDoModelo -m",
                description: "Cria um novo modelo Eloquent e um arquivo de migração."
            },
            {
                command: "php artisan make:seeder NomeDoSeeder",
                description: "Cria uma classe de seeder para popular o banco de dados."
            },
            {
                command: "php artisan db:seed",
                description: "Executa os seeders para popular o banco de dados."
            },
            {
                command: "php artisan migrate",
                description: "Executa as migrações no banco de dados."
            },
            {
                command: "php artisan migrate:refresh",
                description: "Desfaz todas as migrações e executa-as novamente (ideal para testes)."
            },
            {
                command: "php artisan migrate:refresh --seed",
                description: "Desfaz todas as migrações, recria-as e executa os seeders automaticamente."
            },
            {
                command: "php artisan make:factory NomeDaFactory",
                description: "Cria uma factory para gerar dados fictícios para o banco de dados."
            },
            {
                command: "php artisan make:model NomeDoModelo -mf",
                description: "Cria um modelo com a migração e a factory."
            },
            {
                command: "php artisan migrate:rollback",
                description: "Desfaz as últimas migrações aplicadas no banco de dados."
            },
            {
                command: "php artisan migrate:reset",
                description: "Desfaz todas as migrações aplicadas no banco de dados."
            },
            {
                command: "php artisan migrate:status",
                description: "Exibe o status das migrações (executadas ou pendentes)."
            },
            {
                command: "php artisan db:wipe",
                description: "Exclui todas as tabelas, visualizações e dados do banco de dados."
            },
            {
                command: "php artisan migrate:fresh",
                description: "Limpa o banco de dados e aplica todas as migrações."
            }
        ],
        "Autenticação": [{
                command: "composer require laravel/ui",
                description: "Instala o pacote de scaffolding de autenticação (Laravel UI)."
            },
            {
                command: "php artisan ui bootstrap --auth",
                description: "Gera a autenticação com Bootstrap e views padrão."
            },
            {
                command: "composer require laravel/breeze --dev",
                description: "Instala o Laravel Breeze, uma solução leve para autenticação."
            },
            {
                command: "php artisan breeze:install",
                description: "Configura o Laravel Breeze no projeto."
            },
            {
                command: "composer require laravel/sanctum",
                description: "Instala o Laravel Sanctum para autenticação de API."
            },
            {
                command: "php artisan vendor:publish --provider=\"Laravel\\Sanctum\\SanctumServiceProvider\"",
                description: "Publica o arquivo de configuração do Laravel Sanctum."
            }
        ],
        "Rotas e Middleware": [{
                command: "php artisan route:list",
                description: "Lista todas as rotas registradas no projeto."
            },
            {
                command: "php artisan make:middleware NomeDoMiddleware",
                description: "Cria um middleware para tratamento de requisições HTTP."
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
                command: "php artisan config:cache",
                description: "Gera um arquivo cache para as configurações do projeto."
            },
            {
                command: "php artisan cache:clear",
                description: "Limpa todo o cache do sistema."
            },
            {
                command: "php artisan config:clear",
                description: "Remove o cache das configurações do sistema."
            },
            {
                command: "php artisan optimize",
                description: "Otimiza o cache de arquivos de configuração, rotas e eventos."
            },
            {
                command: "php artisan optimize:clear",
                description: "Limpa todos os caches de configuração, rotas, eventos e views."
            },
            {
                command: "php artisan view:clear",
                description: "Limpa o cache de views compiladas."
            }
        ],
        "Tradução e Internacionalização": [{
                command: "php artisan lang:publish",
                description: "Scaffold do diretório lang."
            },

            {
                command: "composer require lucascudo/laravel-pt-br-localization --dev",
                description: "Instale o pacote."
            },
            {
                command: "php artisan vendor:publish --tag=laravel-pt-br-localization",
                description: "Publique as traduções."
            }
        ],
        "Tarefas e Filas": [{
                command: "php artisan make:job NomeDoJob",
                description: "Cria um job para processamento em filas (queue)."
            },
            {
                command: "php artisan queue:work",
                description: "Processa jobs em filas do sistema."
            },
            {
                command: "php artisan queue:listen",
                description: "Escuta as filas e processa jobs em tempo real."
            },
            {
                command: "php artisan queue:restart",
                description: "Reinicia todos os workers de filas."
            }
        ],
        "Testes": [{
                command: "php artisan test",
                description: "Executa todos os testes do projeto."
            },
            {
                command: "php artisan make:test NomeDoTeste",
                description: "Cria uma classe de teste para validação de código."
            },
            {
                command: "php artisan make:test NomeDoTeste --unit",
                description: "Cria uma classe de teste unitário para validação de métodos específicos."
            }
        ],
        "Eventos e Listeners": [{
                command: "php artisan make:event NomeDoEvento",
                description: "Cria um evento para disparar ações no sistema."
            },
            {
                command: "php artisan make:listener NomeDoListener",
                description: "Cria um listener para reagir a eventos no sistema."
            }
        ],
        "Gerenciamento de Arquivos e Storage": [{
            command: "php artisan storage:link",
            description: "Cria um link simbólico para o diretório 'storage/app/public'."
        }],
        "Políticas e Permissões": [{
            command: "php artisan make:policy NomeDaPolicy",
            description: "Cria uma policy para gerenciar permissões de usuários."
        }],
        "Requests e Validações": [{
                command: "php artisan make:request NomeDoRequest",
                description: "Cria uma classe de request para validação de dados de entrada."
            },
            {
                command: "composer require laravellegends/pt-br-validator",
                description: "Instalar a biblioteca de Validação"
            }
        ],
        "Criação de Componentes Frontend": [{
                command: "php artisan make:component NomeDoComponente",
                description: "Gera um componente Blade com lógica PHP e template para reutilização na interface."
            },
            {
                command: "php artisan make:component NomeDaPasta/NomeDoComponente",
                description: "Gera um componente Blade com lógica PHP e template para reutilização na interface em pasta separadas"
            }
        ],
        "Utilitários": [{
                command: "php artisan list",
                description: "Lista todos os comandos disponíveis no Artisan."
            },
            {
                command: "php artisan help nome_do_comando",
                description: "Exibe detalhes e opções para um comando específico do Artisan."
            },
            {
                command: "php artisan env",
                description: "Exibe as variáveis de ambiente."
            }

        ]
    };


    // Função para copiar texto para a área de transferência
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            alert(`Comando copiado: ${text}`);
        }).catch(err => {
            console.error('Não foi possível copiar o texto:', err);
        });
    }

    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            alert('Comando copiado para a área de transferência: ' + text);
        }).catch(err => {
            console.error('Erro ao copiar o texto: ', err);
        });
    }

    // Renderizar categorias e comandos dinamicamente
    function renderCategories(commandCategories) {
        const categoriesList = document.getElementById('categories-list');

        for (const [category, commands] of Object.entries(commandCategories)) {
            const categoryBox = document.createElement('div');
            categoryBox.className = 'category-box';

            const categoryTitle = document.createElement('h2');
            categoryTitle.textContent = category;
            categoryBox.appendChild(categoryTitle);

            commands.forEach(({
                command,
                description
            }) => {
                const commandBox = document.createElement('div');
                commandBox.className = 'command-box';

                commandBox.innerHTML = `
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <p class="mb-1"><strong>${description}</strong></p>
                                <code>${command}</code>
                            </div>
                            <button class="btn btn-primary btn-sm ms-3" onclick="copyToClipboard('${command}')">Copiar</button>
                        </div>
                    `;

                categoryBox.appendChild(commandBox);
            });

            categoriesList.appendChild(categoryBox);
        }
    }

    // Renderizar os comandos no carregamento da página
    renderCategories(commandCategories);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>