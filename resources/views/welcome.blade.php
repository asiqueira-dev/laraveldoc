<!DOCTYPE html>
<html lang="pt-BR" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 12 Master Guide</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="app-layout">

        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <a href="#" class="brand-logo">
                    <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel" width="30">
                    <span>Laravel<span class="text-primary">Guide</span></span>
                </a>
                <button class="btn-close-sidebar d-lg-none" onclick="toggleSidebar()"><i
                        class="bi bi-x-lg"></i></button>
            </div>

            <div class="sidebar-content">
                <div class="sidebar-label">Navegação</div>
                <nav class="sidebar-nav" id="sidebarNav">
                    @foreach ($temas as $tema)
                        <a href="#{{ $tema->slug }}" class="nav-link">
                            <i class="bi {{ $tema->icone }}"></i> {{ $tema->titulo }}
                        </a>
                    @endforeach
                </nav>
            </div>

            <div class="sidebar-footer">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-sm btn-dark w-100 mb-2">Painel Admin</a>
                @else
                    <a href="{{ route('login') }}" class="text-decoration-none text-muted small">Login</a>
                @endauth
            </div>
        </aside>

        <main class="main-content">
            <div class="backdrop-overlay" onclick="toggleSidebar()"></div>

            <header class="top-header">
                <div class="header-left">
                    <button class="mobile-menu-btn" onclick="toggleSidebar()"><i class="bi bi-list"></i></button>
                    <div class="search-wrapper">
                        <i class="bi bi-search search-icon"></i>
                        <input type="text" id="searchInput" class="search-input" placeholder="Buscar comando..."
                            autocomplete="off">
                    </div>
                </div>
                <div class="header-right">
                    <div class="theme-toggle" id="themeToggle"><i class="bi bi-moon-stars"></i></div>
                </div>
            </header>

            <div class="container-fluid content-body">

                <div class="row g-4 mb-5">
                    @foreach ($guias as $guia)
                        <div class="col-xl-{{ $guia->layout == 'lista_simples' ? '4' : '8' }} col-lg-6">
                            <div class="feature-card h-100">
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div class="card-icon {{ $guia->classe_cor }}">
                                        <i class="bi {{ $guia->icone }} text-primary"></i>
                                    </div>
                                    <h3 class="card-title mb-0">{{ $guia->titulo }}</h3>
                                </div>

                                @if ($guia->layout == 'lista_simples')
                                    <ul class="step-list">
                                        @foreach ($guia->itens as $item)
                                            <li>
                                                <span class="step-num">{{ $item->ordem }}</span>
                                                <span>{!! $item->conteudo !!}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <div class="row g-3">
                                        @foreach ($guia->itens as $item)
                                            <div class="col-md-6">
                                                <div class="guide-step">
                                                    <small
                                                        class="text-uppercase text-muted fw-bold">{{ $item->titulo_passo }}</small>
                                                    <div class="mb-1">{!! $item->conteudo !!}</div>
                                                    @if ($item->codigo)
                                                        <pre class="code-snippet"><code>{{ $item->codigo }}</code></pre>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="divider-text"><span>Referência de Comandos</span></div>

                @foreach ($temas as $tema)
                    <div class="category-section" id="{{ $tema->slug }}">
                        <div class="section-header">
                            <div class="icon-box"><i class="bi {{ $tema->icone }}"></i></div>
                            <h2>{{ $tema->titulo }}</h2>
                        </div>

                        <div class="commands-grid">
                            @foreach ($tema->comandos as $cmd)
                                <div class="command-card">
                                    <div class="card-content">
                                        <div class="command-desc">{{ $cmd->titulo }}</div>
                                        <div class="code-wrapper">
                                            <code class="code-line">{!! str_replace(
                                                ['php artisan', '--'],
                                                ['<span class="core">php artisan</span>', '<span class="opt">--</span>'],
                                                $cmd->codigo,
                                            ) !!}</code>
                                        </div>
                                    </div>
                                    <button class="btn-copy"
                                        onclick="copyToClipboard(this, '{{ addslashes($cmd->codigo) }}')">
                                        <i class="bi bi-clipboard"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <footer class="app-footer">
                    <p>Guia Master Laravel 12 &bull; Dinâmico</p>
                </footer>
            </div>
        </main>

        <button id="backToTop" class="btn-back-top" onclick="window.scrollTo({top:0, behavior:'smooth'})"><i
                class="bi bi-arrow-up"></i></button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Função Copiar
        function copyToClipboard(btn, text) {
            navigator.clipboard.writeText(text).then(() => {
                btn.innerHTML = `<i class="bi bi-check-lg"></i>`;
                setTimeout(() => btn.innerHTML = `<i class="bi bi-clipboard"></i>`, 2000);
            });
        }

        // Toggle Sidebar
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('open');
            document.querySelector('.backdrop-overlay').classList.toggle('show');
        }

        // Search Script
        document.getElementById('searchInput').addEventListener('input', (e) => {
            const term = e.target.value.toLowerCase();
            document.querySelectorAll('.category-section').forEach(section => {
                let hasVisible = false;
                section.querySelectorAll('.command-card').forEach(card => {
                    const match = card.textContent.toLowerCase().includes(term);
                    card.style.display = match ? 'flex' : 'none';
                    if (match) hasVisible = true;
                });
                section.style.display = hasVisible ? 'block' : 'none';
            });
        });

        // Theme Toggle
        const themeToggle = document.getElementById('themeToggle');
        const html = document.documentElement;
        if (localStorage.getItem('theme') === 'dark') html.setAttribute('data-theme', 'dark');
        themeToggle.addEventListener('click', () => {
            const next = html.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
            html.setAttribute('data-theme', next);
            localStorage.setItem('theme', next);
        });
    </script>
</body>

</html>
