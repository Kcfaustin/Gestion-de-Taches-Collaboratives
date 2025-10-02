<!DOCTYPE html>
<html lang="en">
<body>
    <nav class="navbar navbar-expand-lg navbar-dark shadow-lg sticky-top">
        <div class="container-fluid px-3 px-sm-4">
            <!-- Logo -->
            <a class="navbar-brand fw-bold fs-4 text-white" href="{{ url('/') }}">
                <i class="bi bi-check-circle-fill text-primary me-2"></i>
                <span class="d-none d-sm-inline">Gestion Des Tâches</span>
                <span class="d-inline d-sm-none">GDT</span>
            </a>

            <!-- Hamburger Menu Button -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Content -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="d-flex w-100 justify-content-between align-items-center mt-3 mt-lg-0">
                    <!-- Navigation Links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link fw-medium text-light {{ request()->is('/') ? 'active text-primary' : '' }}"
                               href="{{ url('/') }}">
                                <i class="bi bi-house me-1"></i>Accueil
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-medium text-light {{ request()->is('about') ? 'active text-primary' : '' }}"
                               href="{{ url('/about') }}">
                                <i class="bi bi-info-circle me-1"></i>À propos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-medium text-light {{ request()->is('contact') ? 'active text-primary' : '' }}"
                               href="{{ url('/contact') }}">
                                <i class="bi bi-envelope me-1"></i>Contact
                            </a>
                        </li>
                    </ul>

                    <!-- Login & Register Buttons -->
                    <div class="d-flex gap-2 flex-wrap">
                        <a href="{{ route('login') }}" class="btn btn-outline-light fw-medium px-3 py-2 auth-btn-login">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Connexion
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-primary fw-medium px-3 py-2 shadow auth-btn-register">
                            <i class="bi bi-person-plus me-1"></i>Inscription
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </nav>

    <style>
        /* Navbar Professional Styles */
        .navbar {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d3748 100%) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255,255,255,0.1);
            z-index: 1050 !important;
        }

        .navbar-brand {
            font-weight: 700 !important;
            font-size: 1.5rem !important;
            color: #ffffff !important;
            text-decoration: none !important;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .navbar-brand:hover {
            color: #ffffff !important;
            transform: scale(1.02);
            transition: all 0.3s ease;
        }

        .navbar-brand i {
            color: #0d6efd !important;
            margin-right: 0.5rem;
        }

        /* Navigation Links */
        .nav-link {
            color: #f8f9fa !important;
            font-weight: 500;
            transition: all 0.3s ease;
            border-radius: 8px;
            margin: 0 0.25rem;
            padding: 0.5rem 1rem !important;
        }

        .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
            color: #ffffff !important;
            transform: translateY(-1px);
        }

        .nav-link.active {
            background-color: rgba(13, 110, 253, 0.2);
            color: #0d6efd !important;
        }

        .nav-link i {
            margin-right: 0.25rem;
            opacity: 0.8;
        }

        /* Auth Buttons Styling */
        .auth-btn-login {
            border: 2px solid rgba(255,255,255,0.8) !important;
            color: #ffffff !important;
            background: transparent !important;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none !important;
            cursor: pointer !important;
            border-radius: 8px !important;
            padding: 0.5rem 1.25rem !important;
        }

        .auth-btn-login:hover {
            background-color: #ffffff !important;
            color: #1a1a1a !important;
            border-color: #ffffff !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255,255,255,0.2);
        }

        .auth-btn-register {
            background: linear-gradient(135deg, #0d6efd, #0b5ed7) !important;
            border: 2px solid transparent !important;
            color: #ffffff !important;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none !important;
            cursor: pointer !important;
            border-radius: 8px !important;
            padding: 0.5rem 1.25rem !important;
        }

        .auth-btn-register:hover {
            background: linear-gradient(135deg, #0b5ed7, #0a58ca) !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(13, 110, 253, 0.4);
            color: #ffffff !important;
        }

        .btn-primary {
            background: linear-gradient(135deg, #0d6efd, #0b5ed7);
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #0b5ed7, #0a58ca);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
        }

        /* Enhanced auth buttons */
        .auth-btn-login {
            border: 2px solid rgba(255,255,255,0.8);
            color: #ffffff !important;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none !important;
            cursor: pointer !important;
            pointer-events: auto !important;
            position: relative;
            z-index: 20;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .auth-btn-login:hover {
            background-color: #ffffff !important;
            color: #1a1a1a !important;
            border-color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255,255,255,0.2);
            text-decoration: none !important;
        }

        .auth-btn-register {
            background: linear-gradient(135deg, #0d6efd, #0b5ed7) !important;
            border: 2px solid transparent;
            color: #ffffff !important;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none !important;
            cursor: pointer !important;
            pointer-events: auto !important;
            position: relative;
            z-index: 20;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .auth-btn-register:hover {
            background: linear-gradient(135deg, #0b5ed7, #0a58ca) !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(13, 110, 253, 0.4);
            text-decoration: none !important;
        }

        @media (max-width: 991.98px) {
            .navbar-collapse {
                background-color: rgba(26, 26, 26, 0.95);
                border-radius: 0.5rem;
                margin-top: 1rem;
                padding: 1.5rem;
                border: 1px solid rgba(255,255,255,0.1);
            }

            .d-flex.gap-2 {
                flex-direction: column;
                gap: 0.5rem !important;
                width: 100%;
            }

            .auth-btn-login,
            .auth-btn-register {
                text-align: center;
                width: 100%;
                padding: 0.75rem 1rem !important;
                font-size: 1rem;
            }
        }

        /* Ensure navbar buttons are always clickable */
        .auth-btn-login,
        .auth-btn-register {
            pointer-events: auto !important;
            user-select: none !important;
            cursor: pointer !important;
            position: relative !important;
            z-index: 1000 !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        /* Fix any potential overlay issues */
        .navbar {
            z-index: 1050 !important;
        }

        .navbar-collapse {
            z-index: 1051 !important;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ensure navbar buttons are clickable
            const authButtons = document.querySelectorAll('.auth-btn-login, .auth-btn-register');

            authButtons.forEach(btn => {
                btn.addEventListener('click', function(e) {
                    console.log('Auth button clicked:', this.textContent.trim());
                    // Force navigation if needed
                    if (this.href) {
                        window.location.href = this.href;
                    }
                });
            });
        });
    </script>
</body>
</html>
