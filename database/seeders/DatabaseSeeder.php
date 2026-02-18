<?php

namespace Database\Seeders;

// Importações necessárias adicionadas:
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// Importações originais mantidas:
use App\Models\Tema;
use App\Models\Comando;
use App\Models\Guia;
use App\Models\GuiaItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // === 1. CRIAR USUÁRIO ADMIN ===
        // Verifica se já existe para não duplicar erro
        if (!User::where('email', 'contato@andersonls.com.br')->exists()) {
            User::factory()->create([
                'name' => 'Anderson Siqueira',
                'email' => 'contato@andersonls.com.br',
                'password' => Hash::make('41526389'),
            ]);
        }

        // === 2. CRIAR TEMAS E COMANDOS (COMPLETO) ===
        $dadosComandos = [
            [
                'categoria' => "Instalação & Start",
                'icone' => "bi-power",
                'comandos' => [
                    ['cmd' => "composer create-project laravel/laravel .", 'desc' => "Instala Laravel no diretório atual."],
                    ['cmd' => "laravel new app --git --pest", 'desc' => "Instalador global com Git e Pest."],
                    ['cmd' => "php artisan serve", 'desc' => "Inicia servidor local (8000)."],
                    ['cmd' => "php artisan down --secret='123'", 'desc' => "Modo manutenção (acesso via /123)."],
                    ['cmd' => "php artisan up", 'desc' => "Remove modo de manutenção."],
                    ['cmd' => "php artisan env:encrypt", 'desc' => "Encripta arquivo .env (segurança)."],
                    ['cmd' => "php artisan env:decrypt", 'desc' => "Decripta arquivo .env."]
                ]
            ],
            [
                'categoria' => "Laravel Sail (Docker)",
                'icone' => "bi-docker",
                'comandos' => [
                    ['cmd' => "./vendor/bin/sail up -d", 'desc' => "Inicia containers em background."],
                    ['cmd' => "./vendor/bin/sail stop", 'desc' => "Para todos os containers."],
                    ['cmd' => "./vendor/bin/sail artisan migrate", 'desc' => "Roda comando dentro do container."],
                    ['cmd' => "./vendor/bin/sail composer require pacote", 'desc' => "Composer via container."],
                    ['cmd' => "./vendor/bin/sail root-shell", 'desc' => "Acessa terminal como Root."],
                    ['cmd' => "php artisan sail:install", 'desc' => "Reinstala/Configura docker-compose."]
                ]
            ],
            [
                'categoria' => "Geradores (Make)",
                'icone' => "bi-magic",
                'comandos' => [
                    ['cmd' => "php artisan make:model Produto -mfc", 'desc' => "Model + Migration + Factory + Controller."],
                    ['cmd' => "php artisan make:controller Api/UserController --api", 'desc' => "Controller API limpo."],
                    ['cmd' => "php artisan make:request StoreUserRequest", 'desc' => "Request para validação."],
                    ['cmd' => "php artisan make:resource UserResource", 'desc' => "API Resource (JSON)."],
                    ['cmd' => "php artisan make:component Alert --view", 'desc' => "Componente Blade simples."],
                    ['cmd' => "php artisan make:middleware CheckAdmin", 'desc' => "Middleware de rota."],
                    ['cmd' => "php artisan make:policy PostPolicy --model=Post", 'desc' => "Policy de autorização."],
                    ['cmd' => "php artisan make:observer UserObserver --model=User", 'desc' => "Observer de Model."],
                    ['cmd' => "php artisan make:rule Uppercase", 'desc' => "Regra de validação customizada."],
                    ['cmd' => "php artisan make:test UserTest", 'desc' => "Cria arquivo de Teste."]
                ]
            ],
            [
                'categoria' => "Banco de Dados & Eloquent",
                'icone' => "bi-database-fill-gear",
                'comandos' => [
                    ['cmd' => "php artisan migrate", 'desc' => "Roda migrações pendentes."],
                    ['cmd' => "php artisan migrate:fresh --seed", 'desc' => "Reseta banco e roda seeds."],
                    ['cmd' => "php artisan migrate:rollback --step=1", 'desc' => "Desfaz a última migração."],
                    ['cmd' => "php artisan db:seed", 'desc' => "Executa DatabaseSeeder."],
                    ['cmd' => "php artisan db:table users", 'desc' => "Mostra registros da tabela no terminal."],
                    ['cmd' => "php artisan db:show", 'desc' => "Resumo do banco (Tamanho, conexões)."],
                    ['cmd' => "php artisan model:show User", 'desc' => "Inspeciona Model (colunas e relações)."],
                    ['cmd' => "php artisan db:wipe", 'desc' => "Apaga todas as tabelas (sem rollback)."]
                ]
            ],
            [
                'categoria' => "Frontend & Assets",
                'icone' => "bi-filetype-js",
                'comandos' => [
                    ['cmd' => "npm install", 'desc' => "Instala dependências do Node."],
                    ['cmd' => "npm run dev", 'desc' => "Servidor Vite (Hot Reload)."],
                    ['cmd' => "npm run build", 'desc' => "Compila para Produção."],
                    ['cmd' => "php artisan storage:link", 'desc' => "Link simbólico public/storage."]
                ]
            ],
            [
                'categoria' => "Limpeza & Cache",
                'icone' => "bi-stars",
                'comandos' => [
                    ['cmd' => "php artisan optimize:clear", 'desc' => "Limpa TODOS os caches (Dev)."],
                    ['cmd' => "php artisan optimize", 'desc' => "Gera cache de Config/Rotas (Prod)."],
                    ['cmd' => "php artisan config:clear", 'desc' => "Limpa cache de configuração."],
                    ['cmd' => "php artisan view:clear", 'desc' => "Limpa views compiladas."],
                    ['cmd' => "php artisan route:clear", 'desc' => "Limpa cache de rotas."],
                    ['cmd' => "php artisan cache:clear", 'desc' => "Limpa cache da aplicação (Redis/File)."]
                ]
            ],
            [
                'categoria' => "Filas & Agendamento",
                'icone' => "bi-clock-history",
                'comandos' => [
                    ['cmd' => "php artisan queue:work --tries=3", 'desc' => "Processa fila com tentativas."],
                    ['cmd' => "php artisan queue:listen", 'desc' => "Ouve fila (bom para dev)."],
                    ['cmd' => "php artisan queue:retry all", 'desc' => "Reprocessa falhas."],
                    ['cmd' => "php artisan queue:monitor default", 'desc' => "Monitora tamanho da fila."],
                    ['cmd' => "php artisan schedule:work", 'desc' => "Roda agendador localmente (Cron)."],
                    ['cmd' => "php artisan schedule:list", 'desc' => "Lista tarefas agendadas e horários."]
                ]
            ],
            [
                'categoria' => "Segurança & Auth",
                'icone' => "bi-shield-lock",
                'comandos' => [
                    ['cmd' => "php artisan key:generate", 'desc' => "Gera nova APP_KEY."],
                    ['cmd' => "php artisan install:api", 'desc' => "Instala Sanctum/Passport."],
                    ['cmd' => "php artisan auth:clear-resets", 'desc' => "Limpa tokens de senha expirados."],
                    ['cmd' => "composer require laravel/breeze --dev", 'desc' => "Instala Breeze (Login)."]
                ]
            ],
            [
                'categoria' => "Utilidades & Debug",
                'icone' => "bi-bug",
                'comandos' => [
                    ['cmd' => "php artisan tinker", 'desc' => "Console interativo (REPL)."],
                    ['cmd' => "php artisan route:list --except-vendor", 'desc' => "Lista suas rotas."],
                    ['cmd' => "php artisan about", 'desc' => "Info do sistema e drivers."],
                    ['cmd' => "php artisan docs session", 'desc' => "Abre docs sobre Session."],
                    ['cmd' => "php artisan vendor:publish", 'desc' => "Publica configs de pacotes."],
                    ['cmd' => "php artisan stub:publish", 'desc' => "Personaliza arquivos 'make'."]
                ]
            ]
        ];

        $ordemTema = 0;
        foreach ($dadosComandos as $secao) {
            // Cria o Tema
            $tema = Tema::create([
                'titulo' => $secao['categoria'],
                'icone' => $secao['icone'],
                'slug' => Str::slug($secao['categoria']),
                'ordem' => $ordemTema++
            ]);

            $ordemCmd = 0;
            foreach ($secao['comandos'] as $cmd) {
                // Cria os Comandos vinculados ao Tema
                Comando::create([
                    'tema_id' => $tema->id,
                    'titulo' => $cmd['desc'], // Título no banco = Descrição do JSON
                    'codigo' => $cmd['cmd'],  // Comando no banco = Cmd do JSON
                    'descricao' => null,      // Campo extra opcional
                    'ordem' => $ordemCmd++
                ]);
            }
        }

        // === 3. CRIAR GUIAS (Início Rápido e Helpers) ===
        
        // Guia 1: Início Rápido (Lista Simples)
        $guiaInicio = Guia::create([
            'titulo' => 'Setup Inicial',
            'subtitulo' => 'Início Rápido',
            'icone' => 'bi-rocket-takeoff-fill',
            'classe_cor' => 'bg-red-soft',
            'layout' => 'lista_simples',
            'ordem' => 0
        ]);

        $passosInicio = [
            ['conteudo' => '<code>composer create-project laravel/laravel app</code>'],
            ['conteudo' => '<code>cd app</code>'],
            ['conteudo' => 'Configurar <code>.env</code> (DB, App URL)'],
            ['conteudo' => '<code>php artisan migrate</code>'],
            ['conteudo' => '<code>npm run dev</code> <small class="text-muted">+ artisan serve</small>'],
        ];

        foreach ($passosInicio as $idx => $passo) {
            GuiaItem::create([
                'guia_id' => $guiaInicio->id,
                'conteudo' => $passo['conteudo'],
                'ordem' => $idx + 1
            ]);
        }

        // Guia 2: Helper Global (Passo a Passo com Código)
        $guiaHelper = Guia::create([
            'titulo' => 'Dica Pro: Helper Global',
            'subtitulo' => 'Boas Práticas',
            'icone' => 'bi-code-slash',
            'classe_cor' => 'bg-blue-soft',
            'layout' => 'passo_a_passo',
            'ordem' => 1
        ]);

        GuiaItem::create([
            'guia_id' => $guiaHelper->id,
            'titulo_passo' => 'Passo 1',
            'conteudo' => 'Criar arquivo: <code>app/Helpers/custom.php</code>',
            // Usando nowdoc para evitar problemas com aspas no código PHP
            'codigo' => <<<'PHP'
if (!function_exists('money_br')) {
    function money_br($value) {
        return 'R$ ' . number_format($value, 2, ',', '.');
    }
}
PHP
            ,
            'ordem' => 1
        ]);

        GuiaItem::create([
            'guia_id' => $guiaHelper->id,
            'titulo_passo' => 'Passo 2',
            'conteudo' => 'Editar <code>composer.json</code>:',
            'codigo' => <<<'JSON'
"autoload": {
    "psr-4": { ... },
    "files": ["app/Helpers/custom.php"]
}
JSON
            ,
            'ordem' => 2
        ]);
        
        // Finalização (Helper Item 3 - comando de dump)
        GuiaItem::create([
            'guia_id' => $guiaHelper->id,
            'titulo_passo' => 'Finalizar',
            'conteudo' => 'Execute no terminal:',
            'codigo' => 'composer dump-autoload',
            'ordem' => 3
        ]);
    }
}