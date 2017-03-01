<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{config('app.name')}}</title>

        <!-- Bootstrap CSS -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        <div class="jumbotron">
            <div class="container">
                <h1>ANTICOPY</h1>
                <p>Aplicacion para comprobar plagio entre diferentes tipos de documentos</p>
                <p>
                    <a class="btn btn-primary btn-lg">Aprenda mas</a>
                </p>
            </div>
        </div>
        
        <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
            <a class="navbar-brand" href="{{url('/')}}">Principal</a>
            <ul class="nav navbar-nav">
                <!--<li class="active">-->
                <li>
                    <a href="{{url('/archivos')}}">Archivos</a>
                </li>
                <li>
                    <a href="#">Link</a>
                </li>
            </ul>
        </nav>
        
        @yield('cuerpo')

        
        <div class="jumbotron">
            <div class="container">
                <h1>Mas de nosotros :D</h1>
                <p>Contents ...</p>
                <p>
                    <a class="btn btn-primary btn-lg">Learn more</a>
                </p>
            </div>
        </div>
        
        <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </body>
</html>
