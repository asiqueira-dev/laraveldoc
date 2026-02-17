-- Criar o banco de dados
CREATE DATABASE laravel_doc;
USE laravel_doc;

-- Criar a tabela categoria
CREATE TABLE categoria (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    categoria VARCHAR(255) NOT NULL,
    status_cadastro TINYINT(1) DEFAULT 1
);

-- Criar a tabela comandos
CREATE TABLE comandos (
    id_comando INT AUTO_INCREMENT PRIMARY KEY,
    id_categoria INT NOT NULL,
    comando TEXT NOT NULL,
    descricao TEXT NOT NULL,
    FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria)
);

-- Insere as categorias na tabela `categoria`
INSERT INTO categoria (categoria) VALUES
('Gerenciamento de Projeto'),
('Banco de Dados'),
('Autenticação'),
('Rotas e Middleware'),
('Cache e Otimização'),
('Tradução e Internacionalização'),
('Tarefas e Filas'),
('Testes'),
('Eventos e Listeners'),
('Gerenciamento de Arquivos e Storage'),
('Políticas e Permissões'),
('Requests e Validações'),
('Criação de Componentes Frontend'),
('Utilitários');

-- Insere os comandos na tabela `comandos` com base nas categorias
INSERT INTO comandos (id_categoria, comando, descricao) VALUES
-- Gerenciamento de Projeto (id_categoria = 1)
(1, "composer create-project laravel/laravel nome-do-projeto", "Cria um novo projeto Laravel."),
(1, "composer create-project laravel/laravel .", "Cria um novo projeto, estando dentro da pasta."),
(1, "php artisan serve", "Inicia o servidor de desenvolvimento."),
(1, "php artisan key:generate", "Gera novamente a APP_KEY no arquivo .env."),
(1, "php artisan about", "Exibe informações sobre a instalação do Laravel."),

-- Banco de Dados (id_categoria = 2)
(2, "php artisan make:model NomeDoModelo -m", "Cria um novo modelo Eloquent e um arquivo de migração."),
(2, "php artisan make:seeder NomeDoSeeder", "Cria uma classe de seeder para popular o banco de dados."),
(2, "php artisan db:seed", "Executa os seeders para popular o banco de dados."),
(2, "php artisan migrate", "Executa as migrações no banco de dados."),
(2, "php artisan migrate:refresh", "Desfaz todas as migrações e executa-as novamente (ideal para testes)."),
(2, "php artisan migrate:refresh --seed", "Desfaz todas as migrações, recria-as e executa os seeders automaticamente."),
(2, "php artisan make:factory NomeDaFactory", "Cria uma factory para gerar dados fictícios para o banco de dados."),
(2, "php artisan make:model NomeDoModelo -mf", "Cria um modelo com a migração e a factory."),
(2, "php artisan migrate:rollback", "Desfaz as últimas migrações aplicadas no banco de dados."),
(2, "php artisan migrate:reset", "Desfaz todas as migrações aplicadas no banco de dados."),
(2, "php artisan migrate:status", "Exibe o status das migrações (executadas ou pendentes)."),
(2, "php artisan db:wipe", "Exclui todas as tabelas, visualizações e dados do banco de dados."),
(2, "php artisan migrate:fresh", "Limpa o banco de dados e aplica todas as migrações."),

-- Autenticação (id_categoria = 3)
(3, "composer require laravel/ui", "Adiciona a biblioteca laravel/ui ao projeto."),
(3, "php artisan ui bootstrap --auth", "Cria a autenticação utilizando Bootstrap."),
(3, "php artisan ui vue --auth", "Cria a autenticação utilizando Vue.js."),
(3, "php artisan ui react --auth", "Cria a autenticação utilizando React."),
(3, "npm install && npm run dev", "Instala dependências Node.js e compila assets para o frontend."),

-- Rotas e Middleware (id_categoria = 4)
(4, "php artisan make:middleware NomeDoMiddleware", "Cria um novo middleware."),

-- Cache e Otimização (id_categoria = 5)
(5, "php artisan config:cache", "Recria o arquivo de cache de configurações."),
(5, "php artisan config:clear", "Limpa o cache de configurações."),
(5, "php artisan cache:clear", "Limpa o cache da aplicação."),
(5, "php artisan route:cache", "Gera o cache de rotas para melhorar o desempenho."),
(5, "php artisan route:clear", "Limpa o cache de rotas."),
(5, "php artisan view:cache", "Gera o cache das views compiladas."),
(5, "php artisan view:clear", "Limpa o cache das views compiladas."),
(5, "php artisan optimize", "Realiza otimizações para a aplicação."),

-- Tradução e Internacionalização (id_categoria = 6)
(6, "php artisan lang:publish", "Publica os arquivos de idioma do Laravel para personalização."),

-- Tarefas e Filas (id_categoria = 7)
(7, "php artisan make:job NomeDoJob", "Cria um job para execução assíncrona."),
(7, "php artisan queue:work", "Processa as filas de trabalho."),
(7, "php artisan queue:table", "Cria uma migração para a tabela de filas no banco de dados."),

-- Testes (id_categoria = 8)
(8, "php artisan make:test NomeDoTeste", "Cria uma classe de teste."),
(8, "php artisan test", "Executa os testes automatizados."),

-- Eventos e Listeners (id_categoria = 9)
(9, "php artisan make:event NomeDoEvento", "Cria um novo evento."),
(9, "php artisan make:listener NomeDoListener", "Cria um novo listener."),

-- Gerenciamento de Arquivos e Storage (id_categoria = 10)
(10, "php artisan storage:link", "Cria um link simbólico para acesso aos arquivos públicos."),

-- Políticas e Permissões (id_categoria = 11)
(11, "php artisan make:policy NomeDaPolicy", "Cria uma policy para gerenciar permissões de usuários."),

-- Requests e Validações (id_categoria = 12)
(12, "php artisan make:request NomeDoRequest", "Cria uma classe de request para validação de dados de entrada."),

-- Criação de Componentes Frontend (id_categoria = 13)
(13, "php artisan make:component NomeDoComponente", "Cria um componente Blade."),
(13, "npm install && npm run build", "Instala dependências do Node.js e cria os builds dos assets."),

-- Utilitários (id_categoria = 14)
(14, "php artisan list", "Lista todos os comandos disponíveis no Artisan."),
(14, "php artisan help nome_do_comando", "Exibe detalhes e opções para um comando específico do Artisan."),
(14, "php artisan env", "Exibe as variáveis de ambiente.");

