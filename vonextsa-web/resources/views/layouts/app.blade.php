<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VONEXT S.A - Comunicación Avanzada</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/logo/logo.jpg') }}" alt="VONEXT" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#inicio">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#nosotros">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="#servicios">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="rs-footer position-relative">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <img src="{{ asset('assets/logo/logo.jpg') }}" alt="VONEXT" height="50" class="mb-3">
                    <p class="footer-contact-info">Soluciones de comunicación empresarial avanzadas para su organización.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h3 class="footer-title">Información de contacto</h3>
                    <div class="footer-contact-info">
                        <p>&#128205; Avenida 6 de diciembre N31-89, Edificio Cosideco, 3rd Piso y Whymper<br>Quito - Ecuador</p>
                        <p>&#128222; <a href="tel:+593000000000">(+593) 2904999</a></p>
                        <p>&#9993; <a href="mailto:info@vonextsa.com">info@vonextsa.com</a></p>
                        <p>&#128241; WhatsApp: (+593) 997566741</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h3 class="footer-title">Horario de atención</h3>
                    <div class="footer-contact-info">
                        <p>Lunes - Viernes<br>09:00 - 18:00</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="copyright mb-0">&copy; 2026. <a href="#">VONEXT S.A</a></p>
                    </div>
                    <div class="col-md-6 text-end">
                        <p class="copyright mb-0">Comunicación Avanzada</p>
                    </div>
                </div>
            </div>
            <img src="{{ asset('assets/img/logodowniz.gif') }}" alt="VONEXT" class="footer-anim-left" width="80">
            <img src="{{ asset('assets/img/logodowndr.gif') }}" alt="VONEXT" class="footer-anim-right" width="80">
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
