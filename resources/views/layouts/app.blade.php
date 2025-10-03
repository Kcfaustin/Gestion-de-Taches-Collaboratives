
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $pageTitle ?? config('app.name') }}</title>


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Scripts -->
        @if(app()->environment('production'))
            <!-- Fallback CSS - Try multiple paths -->
            @if(file_exists(public_path('build/assets/app-Dydjg6F-.css')))
                <link rel="stylesheet" href="{{ secure_asset('build/assets/app-Dydjg6F-.css') }}">
            @elseif(file_exists(public_path('build/assets/app.css')))
                <link rel="stylesheet" href="{{ secure_asset('build/assets/app.css') }}">
            @elseif(file_exists(public_path('build/app.css')))
                <link rel="stylesheet" href="{{ secure_asset('build/app.css') }}">
            @else
                <!-- Inline critical CSS as fallback -->
                <style>
                    body { font-family: 'Inter', sans-serif; }
                    .bg-gray-100 { background-color: #f3f4f6; }
                    .min-h-screen { min-height: 100vh; }
                    .container-fluid { padding: 0; }
                    .container-responsive { padding: 1rem; }
                </style>
            @endif
            
            <!-- Fallback JS - Try multiple paths -->
            @if(file_exists(public_path('build/assets/js-K89dAo7v.js')))
                <script type="module" src="{{ secure_asset('build/assets/js-K89dAo7v.js') }}"></script>
            @elseif(file_exists(public_path('build/assets/js.js')))
                <script type="module" src="{{ secure_asset('build/assets/js.js') }}"></script>
            @elseif(file_exists(public_path('build/js.js')))
                <script type="module" src="{{ secure_asset('build/js.js') }}"></script>
            @endif
        @else
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        <!-- Critical CSS for Dashboard and Forms -->
        @if(app()->environment('production'))
            <link rel="stylesheet" href="{{ secure_asset('css/production.css') }}">
            <style>
                /* Form styles */
                .form-control {
                    border-radius: 8px;
                    border: 1px solid #d1d5db;
                    padding: 0.75rem 1rem;
                    font-size: 1rem;
                    transition: all 0.3s ease;
                }
                
                .form-control:focus {
                    border-color: #0d6efd;
                    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
                }
                
                .form-label {
                    font-weight: 600;
                    color: #374151;
                    margin-bottom: 0.5rem;
                }
                
                .btn {
                    border-radius: 8px;
                    font-weight: 600;
                    padding: 0.75rem 1.5rem;
                    transition: all 0.3s ease;
                }
                
                .btn-primary {
                    background: linear-gradient(135deg, #0d6efd, #0b5ed7);
                    border: none;
                }
                
                .btn-primary:hover {
                    background: linear-gradient(135deg, #0b5ed7, #0a58ca);
                    transform: translateY(-2px);
                    box-shadow: 0 8px 25px rgba(13, 110, 253, 0.4);
                }
                
                .btn-outline-primary {
                    border: 2px solid #0d6efd;
                    color: #0d6efd;
                    background: transparent;
                }
                
                .btn-outline-primary:hover {
                    background: #0d6efd;
                    color: white;
                    transform: translateY(-2px);
                }
                
                /* Card styles */
                .card {
                    border-radius: 12px;
                    border: 1px solid #e5e7eb;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
                    transition: all 0.3s ease;
                }
                
                .card:hover {
                    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
                    transform: translateY(-2px);
                }
                
                .card-header {
                    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
                    border-bottom: 1px solid #e5e7eb;
                    border-radius: 12px 12px 0 0;
                    padding: 1.5rem;
                }
                
                .card-body {
                    padding: 1.5rem;
                }
                
                /* Dashboard styles */
                .dashboard-card {
                    background: white;
                    border-radius: 12px;
                    padding: 1.5rem;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
                    border: 1px solid #e5e7eb;
                    transition: all 0.3s ease;
                }
                
                .dashboard-card:hover {
                    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
                    transform: translateY(-2px);
                }
                
                .stats-card {
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    color: white;
                    border-radius: 12px;
                    padding: 1.5rem;
                    text-align: center;
                }
                
                .stats-card h3 {
                    font-size: 2rem;
                    font-weight: 700;
                    margin-bottom: 0.5rem;
                }
                
                .stats-card p {
                    opacity: 0.9;
                    margin: 0;
                }
                
                /* Table styles */
                .table {
                    border-radius: 8px;
                    overflow: hidden;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
                }
                
                .table thead th {
                    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
                    border: none;
                    font-weight: 600;
                    color: #374151;
                    padding: 1rem;
                }
                
                .table tbody td {
                    padding: 1rem;
                    border-color: #f3f4f6;
                }
                
                .table tbody tr:hover {
                    background-color: #f8f9fa;
                }
                
                /* Alert styles */
                .alert {
                    border-radius: 8px;
                    border: none;
                    padding: 1rem 1.25rem;
                    margin-bottom: 1rem;
                }
                
                .alert-success {
                    background: linear-gradient(135deg, #d1fae5, #a7f3d0);
                    color: #065f46;
                }
                
                .alert-danger {
                    background: linear-gradient(135deg, #fee2e2, #fecaca);
                    color: #991b1b;
                }
                
                .alert-warning {
                    background: linear-gradient(135deg, #fef3c7, #fde68a);
                    color: #92400e;
                }
                
                .alert-info {
                    background: linear-gradient(135deg, #dbeafe, #bfdbfe);
                    color: #1e40af;
                }
                
                /* Badge styles */
                .badge {
                    display: inline-flex !important;
                    align-items: center !important;
                    justify-content: center !important;
                    font-weight: 600 !important;
                    font-size: 0.875rem !important;
                    padding: 0.5rem 0.75rem;
                    border-radius: 6px;
                }
                
                .badge i {
                    display: inline-block !important;
                    opacity: 1 !important;
                    color: inherit !important;
                    margin-right: 0.25rem;
                }
                
                /* Utility classes */
                .text-primary { color: #0d6efd !important; }
                .text-success { color: #198754 !important; }
                .text-warning { color: #ffc107 !important; }
                .text-danger { color: #dc3545 !important; }
                .text-info { color: #0dcaf0 !important; }
                .text-muted { color: #6c757d !important; }
                
                .bg-primary { background-color: #0d6efd !important; }
                .bg-success { background-color: #198754 !important; }
                .bg-warning { background-color: #ffc107 !important; }
                .bg-danger { background-color: #dc3545 !important; }
                .bg-info { background-color: #0dcaf0 !important; }
                .bg-light { background-color: #f8f9fa !important; }
                
                .border-primary { border-color: #0d6efd !important; }
                .border-success { border-color: #198754 !important; }
                .border-warning { border-color: #ffc107 !important; }
                .border-danger { border-color: #dc3545 !important; }
                .border-info { border-color: #0dcaf0 !important; }
                
                /* Responsive utilities */
                @media (max-width: 768px) {
                    .card-body { padding: 1rem; }
                    .dashboard-card { padding: 1rem; }
                    .stats-card h3 { font-size: 1.5rem; }
                }
            </style>
        @endif

        <!-- Meta tags for better mobile experience -->
        <meta name="theme-color" content="#0d6efd">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main id="main-content" class="container-fluid px-0">
                <div class="container-responsive py-3 py-sm-4">
                    {{ $slot }}
                </div>
            </main>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    console.log("Script chargé."); // Log de confirmation
                    document.querySelectorAll(".ajax-link").forEach((link) => {
                        link.addEventListener("click", function (e) {
                            e.preventDefault(); // Empêche le comportement par défaut
                            const url = this.getAttribute("href");

                            console.log("Chargement de :", url); // Vérifier le lien intercepté
                            fetch(url)
                                .then((response) => {
                                    if (!response.ok) {
                                        throw new Error('Network response was not ok');
                                    }
                                    return response.text();
                                })
                                .then((html) => {
                                    const parser = new DOMParser();
                                    const newDocument = parser.parseFromString(html, "text/html");
                                    const newContent = newDocument.querySelector("#main-content");
                                    const mainContent = document.querySelector("#main-content");

                                    if (newContent && mainContent) {
                                        mainContent.innerHTML = newContent.innerHTML;
                                        history.pushState(null, "", url); // Met à jour l'URL dans la barre d'adresse
                                    } else {
                                        console.warn("Element #main-content not found, redirecting normally");
                                        window.location.href = url;
                                    }
                                })
                                .catch((err) => {
                                    console.error("Erreur de chargement :", err);
                                    // En cas d'erreur, redirige normalement
                                    window.location.href = url;
                                });
                        });
                    });
                });
            </script>
        </div>

        <!-- jQuery (loaded BEFORE stack scripts) -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Production JavaScript -->
        @if(app()->environment('production'))
            <script src="{{ secure_asset('js/production.js') }}"></script>
        @endif

        <!-- Scripts pushed by pages (DataTables, etc.) -->
        @stack('scripts')
    </body>
</html>
