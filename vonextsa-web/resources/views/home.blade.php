@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section id="inicio" class="hero-section">
    <div class="container position-relative">
        <div class="row min-vh-100 align-items-center">
            <div class="col-lg-7">
                <span class="hero-badge">Soluciones de Comunicación Empresarial</span>
                <h1 class="hero-title">Conectamos tu negocio con el futuro</h1>
                <p class="hero-subtitle">Ofrecemos soluciones tecnológicas integrales que transforman la manera en que tu empresa se comunica, opera y crece.</p>
                <div class="hero-cta">
                    <a href="#contacto" class="btn btn-primary btn-lg me-2">
                        <i class="bi bi-send me-2"></i>Contáctanos
                    </a>
                    <a href="#servicios" class="btn btn-outline-light btn-lg">
                        <i class="bi bi-collection me-2"></i>Ver Servicios
                    </a>
                </div>
                <div class="hero-stats mt-5">
                    <div class="stat-item">
                        <span class="stat-number">+10</span>
                        <span class="stat-label">Años de experiencia</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Clientes atendidos</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">24/7</span>
                        <span class="stat-label">Soporte disponible</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block text-center">
                <div class="hero-visual">
                    <h2 class="hero-logo-text">VONEXT</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-scroll">
        <a href="#nosotros" class="scroll-indicator" aria-label="Ir a nosotros">
            <i class="bi bi-chevron-down"></i>
        </a>
    </div>
</section>

<!-- Sobre Nosotros Section -->
<section id="nosotros" class="about-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="about-image-wrapper">
                    <img src="{{ asset('assets/img/nosotros.gif') }}" alt="Sobre VONEXT" class="img-fluid about-img" loading="lazy">
                    <div class="about-image-accent"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <span class="section-badge">Sobre Nosotros</span>
                    <h2 class="section-title">Innovación y compromiso en cada solución</h2>
                    <p class="section-text">VONEXT S.A. es una empresa líder en soluciones de comunicación empresarial, comprometida con la excelencia y la innovación tecnológica.</p>
                    <p class="section-text">Con años de experiencia en el mercado, ayudamos a las organizaciones a optimizar sus procesos de comunicación interna y externa, proporcionando herramientas tecnológicas de última generación.</p>
                    <div class="about-features">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <div class="feature-text">
                                <h5>Seguridad</h5>
                                <p>Protección de datos con estándares internacionales</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="bi bi-graph-up-arrow"></i>
                            </div>
                            <div class="feature-text">
                                <h5>Escalabilidad</h5>
                                <p>Soluciones que crecen con tu negocio</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="feature-text">
                                <h5>Soporte</h5>
                                <p>Equipo dedicado disponible 24/7</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Servicios Section -->
<section id="servicios" class="services-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-badge">Nuestros Servicios</span>
            <h2 class="section-title mx-auto">Soluciones integrales para tu empresa</h2>
            <p class="section-subtitle mx-auto">Brindamos servicios especializados adaptados a las necesidades de cada cliente</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-envelope-paper"></i>
                    </div>
                    <h3 class="service-title">Mensajería Corporativa</h3>
                    <p class="service-desc">Soluciones de correo electrónico empresariales seguras, confiables y escalables para tu organización.</p>
                    <ul class="service-list">
                        <li><i class="bi bi-check2"></i>Correo empresarial</li>
                        <li><i class="bi bi-check2"></i>Protección contra spam</li>
                        <li><i class="bi bi-check2"></i>Almacenamiento seguro</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-plug"></i>
                    </div>
                    <h3 class="service-title">Integración API</h3>
                    <p class="service-desc">Conecta tus sistemas con nuestras APIs de comunicación para optimizar procesos empresariales.</p>
                    <ul class="service-list">
                        <li><i class="bi bi-check2"></i>APIs RESTful</li>
                        <li><i class="bi bi-check2"></i>Documentación completa</li>
                        <li><i class="bi bi-check2"></i>Soporte técnico dedicado</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-headset"></i>
                    </div>
                    <h3 class="service-title">Soporte 24/7</h3>
                    <p class="service-desc">Equipo de expertos disponible permanentemente para resolver cualquier incidencia.</p>
                    <ul class="service-list">
                        <li><i class="bi bi-check2"></i>Atención inmediata</li>
                        <li><i class="bi bi-check2"></i>Equipo especializado</li>
                        <li><i class="bi bi-check2"></i>Monitoreo continuo</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contacto Section -->
<section id="contacto" class="contact-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-badge">Contacto</span>
            <h2 class="section-title mx-auto">¿Necesitas más información?</h2>
            <p class="section-subtitle mx-auto">Escríbenos y nuestro equipo te responderá a la brevedad</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contact-card">
                    <form id="contactForm" action="{{ route('contact.send') }}" method="POST" class="contact-form">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nombre" class="form-label">Nombre completo *</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre" required autocomplete="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Correo electrónico *</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="tu@email.com" required autocomplete="email">
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="asunto" class="form-label">Asunto *</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-chat-dots"></i></span>
                                    <select class="form-select" id="asunto" name="asunto" required>
                                        <option value="" selected disabled>Selecciona una opción</option>
                                        <option value="soporte">Soporte Técnico</option>
                                        <option value="ventas">Ventas</option>
                                        <option value="info">Información General</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="mensaje" class="form-label">Mensaje *</label>
                                <div class="input-group">
                                    <span class="input-group-text align-self-start pt-2"><i class="bi bi-chat-square-text"></i></span>
                                    <textarea class="form-control" id="mensaje" name="mensaje" rows="5" placeholder="¿En qué podemos ayudarte?" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg px-5" id="submitBtn">
                                <i class="bi bi-send me-2"></i>Enviar Mensaje
                            </button>
                        </div>
                    </form>
                    <div id="formResponse" class="mt-4 d-none"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection