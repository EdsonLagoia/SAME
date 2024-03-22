<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistema do Serviço de Arquivo Médico</title>
        <!-- CSS -->
        <link href="/css/style.css" rel="stylesheet">
        <!-- JQuery -->
        <script src="/js/jquery.min.js" type="text/javascript"></script>
        <!-- FontAwesome -->
        <link href="/fontawesome/css/fontawesome.css" rel="stylesheet">
        <link href="/fontawesome/css/all.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <script src="/js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <!-- DataTables -->
        <link href="/css/datatables.min.css" rel="stylesheet">
        <script src="/js/datatables.min.js" type="text/javascript"></script>
        <!-- JQuery Mask -->
        <script src="/js/jquery.mask.min.js" type="text/javascript"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="title-menu" href="/">
                    <img src="/img/logo.png" alt="Logo SAME" class="img-responsive">
                    Sistema do SAME
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/user">Usuários</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/patient">Pacientes</a>
                        </li>
                    </ul>
                    <form class="d-flex" action="../../logout" method="post">
                        @csrf
                        <button type="submit" id="logout" title="Sair">
                            Sair
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        <main
            @if(isset($home))
                class="d-flex align-items-center"
            @else
                class="content"
            @endif
            style="height: calc(100vh - 55px)"
        >
            <div class="container bg-primary system">
                <div class="container">
                    @include('layout.notification')
                    
                    @yield('content')
                </div>
            </div>
        </main>

        <script src="/js/notification.js" type="text/javascript"></script>
        <script src="/js/table.js" type="text/javascript"></script>
        <script src="/js/forms.js" type="text/javascript"></script>
    </body>
</html>
