@extends('layouts.app')

@section('content')
<section id="inicio" class="hero-section text-white text-center position-relative overflow-hidden">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="3"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/img/img1.png') }}" class="d-block carousel-img" alt="Slide 1">
                <div class="carousel-caption">
                    <h1 class="display-4 fw-bold">Comunicación Avanzada</h1>
                    <p class="lead">Soluciones tecnológicas para empresas modernas</p>
                    <a href="#contacto" class="btn btn-light btn-lg mt-3">Contáctanos</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/img2.png') }}" class="d-block carousel-img" alt="Slide 2">
                <div class="carousel-caption">
                    <h1 class="display-4 fw-bold">Innovación Empresarial</h1>
                    <p class="lead">Tecnología de vanguardia para tu negocio</p>
                    <a href="#contacto" class="btn btn-light btn-lg mt-3">Contáctanos</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/img3.png') }}" class="d-block carousel-img" alt="Slide 3">
                <div class="carousel-caption">
                    <h1 class="display-4 fw-bold">Conectividad Total</h1>
                    <p class="lead">Integra tus sistemas con soluciones robustas</p>
                    <a href="#contacto" class="btn btn-light btn-lg mt-3">Contáctanos</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/img4.png') }}" class="d-block carousel-img" alt="Slide 4">
                <div class="carousel-caption">
                    <h1 class="display-4 fw-bold">Soporte Especializado</h1>
                    <p class="lead">Equipo dedicado a tu servicio 24/7</p>
                    <a href="#contacto" class="btn btn-light btn-lg mt-3">Contáctanos</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/img5.png') }}" class="d-block carousel-img" alt="Slide 5">
                <div class="carousel-caption">
                    <h1 class="display-4 fw-bold">Confianza y Seguridad</h1>
                    <p class="lead">Protección garantizada para tus comunicaciones</p>
                    <a href="#contacto" class="btn btn-light btn-lg mt-3">Contáctanos</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>

<section id="nosotros" class="py-5 bg-white">
    <div class="container">
        <h2 class="text-center mb-4">Quiénes Somos</h2>
        <div class="row align-items-center">
            <div class="col-md-6">
                <p>VONEXT S.A es una empresa líder en soluciones de comunicación empresarial.
                Con años de experiencia, ayudamos a las organizaciones a optimizar sus
                procesos de comunicación interna y externa.</p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('assets/img/nosotros.gif') }}" alt="Nosotros" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<section id="servicios" class="py-5" style="background-color: #e8f4fc;">
    <div class="container">
        <h2 class="text-center mb-4">Nuestros Servicios</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Mensajería Corporativa</h5>
                        <p class="card-text">Soluciones de correo electrónico empresariales seguras y confiables.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Integración API</h5>
                        <p class="card-text">Conecta tus sistemas con nuestras APIs de comunicación.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Soporte 24/7</h5>
                        <p class="card-text">Equipo de expertos disponible para ayudarte en todo momento.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contacto" class="py-5 bg-white">
    <div class="container">
        <h2 class="text-center mb-4">Contáctanos</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form id="contactForm" action="{{ route('contact.send') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre *</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico *</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="asunto" class="form-label">Asunto *</label>
                        <select class="form-select" id="asunto" name="asunto" required>
                            <option value="">Seleccione una opción</option>
                            <option value="soporte">Soporte Técnico</option>
                            <option value="ventas">Ventas</option>
                            <option value="info">Información General</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje *</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100" id="submitBtn">
                        Enviar Mensaje
                    </button>
                </form>

                <div id="formResponse" class="mt-3 d-none"></div>
            </div>
        </div>
    </div>
</section>
@endsection
