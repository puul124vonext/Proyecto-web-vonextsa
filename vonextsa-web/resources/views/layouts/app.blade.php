<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VONEXT S.A - Soluciones de Comunicación Empresarial</title>
    <meta name="description" content="VONEXT S.A - Empresa líder en soluciones de comunicación empresarial. Mensajería corporativa, integración API y soporte 24/7.">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
        <div class="container" style="max-width: 90%;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#inicio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#nosotros">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#servicios">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">Contacto</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <a href="#contacto" class="btn btn-nav me-3">Contáctanos</a>
                    <a class="navbar-brand d-flex align-items-center" href="#" aria-label="VONEXT S.A - Inicio">
                        <span class="brand-text">VONEXT</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="rs-footer mt-auto">
        <div class="footer-main">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-brand">
                            <img src="{{ asset('assets/img/vonextsa_V2.png') }}" alt="VONEXT" height="50" class="mb-3">
                            <p class="footer-desc">Soluciones de comunicación empresarial avanzadas para organizaciones que buscan eficiencia y confiabilidad.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <h5 class="footer-heading">Contacto</h5>
                        <ul class="footer-links list-unstyled">
                            <li class="mb-2">
                                <i class="bi bi-geo-alt me-2"></i>
                                <span>Avenida 6 de diciembre N31-89, Edificio Cosideco, 3er Piso - Quito, Ecuador</span>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-telephone me-2"></i>
                                <a href="tel:+5932904999">(+593) 2 304 999</a>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-envelope me-2"></i>
                                <a href="mailto:info@vonextsa.com">info@vonextsa.com</a>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-whatsapp me-2"></i>
                                <a href="https://wa.me/593997566741" target="_blank" rel="noopener noreferrer">(+593) 997 566 741</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <h5 class="footer-heading">Horario de Atención</h5>
                        <ul class="footer-links list-unstyled">
                            <li class="mb-2"><i class="bi bi-clock me-2"></i>Lunes - Viernes: 09:00 - 18:00</li>
                            <li class="mb-2"><i class="bi bi-headset me-2"></i>Soporte 24/7 disponible</li>
                        </ul>
                        <div class="social-links mt-3">
                            <a href="https://wa.me/593997566741" target="_blank" rel="noopener noreferrer" class="social-link" aria-label="WhatsApp">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                            <a href="mailto:info@vonextsa.com" class="social-link" aria-label="Email">
                                <i class="bi bi-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="copyright mb-0">&copy; 2026 VONEXT S.A. Todos los derechos reservados.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <button class="btn btn-link p-0 text-decoration-none" data-bs-toggle="modal" data-bs-target="#politicaSeguridadModal">
                            Política de Seguridad
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal Política de Seguridad -->
    <div class="modal fade" id="politicaSeguridadModal" tabindex="-1" aria-labelledby="politicaSeguridadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header border-0 modal-header-custom">
                    <div class="d-flex align-items-center gap-3">
                        <i class="bi bi-shield-check fs-4"></i>
                        <h5 class="modal-title fw-bold" id="politicaSeguridadModalLabel">POLÍTICA GENERAL DE SEGURIDAD DE LA INFORMACIÓN</h5>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-4">
                        <h6 class="text-uppercase text-muted fw-bold small mb-3">Introducción</h6>
                        <p class="text-dark">Orientar nuestro talento humano y recursos para definir directrices que permitan proteger la información de la empresa y de las partes interesadas.</p>
                    </div>
                    <hr class="my-4">
                    <div class="mb-4">
                        <h6 class="text-uppercase text-muted fw-bold small mb-3">Objetivo</h6>
                        <p>Estableciendo un marco de referencia para la gestión de seguridad de la información, a través de la cual se define las funciones, responsabilidades y medidas necesarias para garantizar su integridad y confidencialidad dentro de un marco legal, de mejoramiento continuo y crecimiento sostenido.</p>
                    </div>
                    <hr class="my-4">
                    <div class="mb-4">
                        <h6 class="text-uppercase text-muted fw-bold small mb-3">Alcance</h6>
                        <p>Esta política aplica a todos los colaboradores, proveedores y partes interesadas que interactúen con los sistemas de información de VONEXT S.A.</p>
                    </div>
                    <hr class="my-4">
                    <div class="mb-4">
                        <h6 class="text-uppercase text-muted fw-bold small mb-3">Principios Fundamentales</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Confidencialidad:</strong> Protección de información sensible contra accesos no autorizados.</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Integridad:</strong> Salvaguarda de la precisión y completitud de la información.</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Disponibilidad:</strong> Acceso autorizado a la información cuando se requiera.</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Cumplimiento:</strong> Adherencia a normativas legales y estándares de seguridad.</li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer border-0 bg-light">
                    <button type="button" class="btn btn-primary px-4" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-2"></i>Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
</body>
</html>