<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>SIGLAB - Sistema de Laboratorio</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>

        body {
            background-color: #f4f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        .navbar {
            background: transparent;
            box-shadow: none;
        }

        .hero {
            min-height: 85vh;
            display: flex;
            align-items: center;
        }

        .hero-content {
            max-width: 420px;
            margin-left: 20px;
        }

        .logo-hero {
            height: 65px;
        }

        .subtitle {
            color: #2c3e50;
            font-size: 17px;
        }

        .btn-primary {
            background-color: #2a6fdb;
            border: none;
        }

        .btn-outline-primary {
            border-color: #2a6fdb;
            color: #2a6fdb;
        }

        .social-icons a {
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .social-icons a:hover {
            color: #0d6efd;
            transform: scale(1.2);
        }

        /* SLIDER */

        .carousel-item img {
            border-radius: 20px;
            max-height: 480px;
            object-fit: cover;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        .slide-caption {
            background: rgba(255,255,255,0.92);
            padding: 18px;
            border-radius: 15px;
            margin-top: 15px;
            text-align: center;
        }

        .slide-caption h5 {
            font-weight: 700;
            color: #1e3a5f;
        }

        .slide-caption p {
            margin-bottom: 0;
            color: #555;
        }

        footer {
            padding: 20px;
            text-align: center;
            color: #888;
        }

        @media (max-width: 768px) {

            .hero {
                padding: 40px 0;
            }

            .hero-content {
                margin-left: 0;
                margin-top: 30px;
                text-align: center;
            }

            .hero .btn {
                display: block;
                width: 100%;
                margin-bottom: 10px;
            }

            .carousel-item img {
                max-height: 300px;
            }

        }

    </style>
</head>

<body>

<!-- REDES -->
<nav class="navbar navbar-light bg-transparent py-2">

    <div class="container justify-content-center">

        <div class="d-flex gap-3 social-icons">

            <a href="#" class="text-muted">
                <i class="bi bi-facebook"></i>
            </a>

            <a href="#" class="text-muted">
                <i class="bi bi-twitter-x"></i>
            </a>

            <a href="#" class="text-muted">
                <i class="bi bi-telegram"></i>
            </a>

            <a href="#" class="text-muted">
                <i class="bi bi-instagram"></i>
            </a>

        </div>

    </div>

</nav>

<!-- HERO -->
<section class="hero">

    <div class="container">

        <div class="row align-items-center">

            <!-- SLIDER -->
            <div class="col-md-6 mb-4 mb-md-0">

                <div id="siglabCarousel" class="carousel slide carousel-fade"
                     data-bs-ride="carousel"
                     data-bs-interval="4000">

                    <div class="carousel-inner">

                        <!-- SLIDE 1 -->
                        <div class="carousel-item active">

                            <img src="/images/laboratorio.png"
                                 class="d-block w-100 img-fluid">

                            <div class="slide-caption">

                                <h5>
                                    Gestión de Pacientes
                                </h5>

                                <p>
                                    Administra y organiza la información clínica de forma eficiente.
                                </p>

                            </div>

                        </div>

                        <!-- SLIDE 2 -->
                        <div class="carousel-item">

                            <img src="/images/laboratorio2.png"
                                 class="d-block w-100 img-fluid">

                            <div class="slide-caption">

                                <h5>
                                    Exámenes de Laboratorio
                                </h5>

                                <p>
                                    Control completo de solicitudes, muestras y procesos clínicos.
                                </p>

                            </div>

                        </div>

                        <!-- SLIDE 3 -->
                        <div class="carousel-item">

                            <img src="/images/laboratorio3.png"
                                 class="d-block w-100 img-fluid">

                            <div class="slide-caption">

                                <h5>
                                    Resultados Confiables
                                </h5>

                                <p>
                                    Consulta resultados rápidos, precisos y seguros.
                                </p>

                            </div>

                        </div>

                        <!-- SLIDE 4 -->
                        <div class="carousel-item">

                            <img src="/images/laboratorio4.png"
                                 class="d-block w-100 img-fluid">

                            <div class="slide-caption">

                                <h5>
                                    Seguridad de la Información
                                </h5>

                                <p>
                                    Protección y privacidad garantizada para todos los pacientes.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- CONTENIDO -->
            <div class="col-md-6">

                <div class="hero-content text-center text-md-start">

                    <img src="/images/logo.png"
                         class="logo-hero mb-3 d-block mx-auto mx-md-0">

                    <h1 class="fw-bold">
                        SIGLAB
                    </h1>

                    <p class="subtitle">
                        Sistema de Gestión de Laboratorio Clínico
                    </p>

                    <p class="text-muted">
                        Plataforma moderna para la administración eficiente
                        de pacientes, exámenes y resultados clínicos.
                    </p>

                    <div class="mt-4">

                        <a href="{{ route('login') }}"
                           class="btn btn-primary me-2">

                            Iniciar Sesión

                        </a>

                        <a href="{{ route('register') }}"
                           class="btn btn-outline-primary">

                            Registrarse

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- FOOTER -->
<footer>
    © {{ date('Y') }} SIGLAB - Sistema de Gestión de Laboratorio Clínico
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>