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
        <!-- JavaScript -->
        <script src="/js/notification.js" type="text/javascript"></script>
    </head>
    <body>        
        <main class="d-flex align-items-center justify-content-center" style="height: 100vh">
            <div class="col-sm-4 system bg-primary">
                <div class="mb-2 text-center">
                    <img src="/img/logo.png" alt="Logo SAME" class="img-responsive mb-3" width="30%">
                    <h3>Sistema do Serviço de Arquivo Médico</h3>
                </div>
                
                @include('layout.notification')
                
                @yield('content')
            </div>
        </main>
    </body>
</html>
