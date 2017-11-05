<!doctype html>
<html>

<head>
    <title>Log in</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/logo1.ico">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <!-- Our Custom CSS -->
    <style>
        body {
            padding-top: 100px;
            background-image: url(images/fondo2.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        form {
            padding: 20px;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.16), 0 2px 15px 0 rgba(0, 0, 0, 0.12) !important;
        }
        
        h4 {
            text-align: center;
        }
        
        .btn {
            border-radius: 0px;
        }
        
        .form-control {
            border-radius: 0px;
            margin-bottom: 10px;
        }
        
        p {
            margin-bottom: 10px;
            margin-top: 10px;
            text-align: center;
        }
        
        .blue {
            color: #337ab7;
        }
        
        .fa {
            color: #337ab7;
        }
        
        .fa-facebook-f {
            padding: 10px 12px 10px 12px;
            border: 1px solid #337ab7;
            border-radius: 50%;
        }
        
        .fa-google-plus {
            padding: 10px 8px 10px 8px;
            border: 1px solid #337ab7;
            border-radius: 50%;
        }
        
        .fa-twitter {
            padding: 10px 8px 10px 8px;
            border: 1px solid #337ab7;
            border-radius: 50%;
        }
        
        i {
            margin-left: 5px;
            margin-right: 5px;
        }
        
        .flip {
            -webkit-perspective: 800;
            perspective: 800;
            position: relative;
        }
        
        .flip .card.flipped {
            -webkit-transform: rotatey(-180deg);
            transform: rotatey(-180deg);
        }
        
        .flip .card {
            height: 100%;
            -webkit-transform-style: preserve-3d;
            -webkit-transition: 0.5s;
            transform-style: preserve-3d;
            transition: 0.5s;
        }
        
        .flip .card .face {
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            z-index: 2;
        }
        
        .flip .card .front {
            position: absolute;
            width: 100%;
            z-index: 1;
        }
        
        .flip .card .back {
            -webkit-transform: rotatey(-180deg);
            transform: rotatey(-180deg);
        }
        
        .inner {
            margin: 0px !important;
        }
    </style>
</head>

<body>
    <script>
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="flip">
                    <div class="card">
                        <div class="face front">
                            <div class="panel panel-default">
                                <form class="form-horizontal" action='application/config/database' method="post">
                                    <br>
                                    <br>
                                    <p class="text-center"> <img src="images/Rio.png"></p>
                                    <h3 class="text-center">Asistente de configuración de la Base de Datos</h3>
                                    <br>
                                    <br>
                                    <select class="form-control text-center" name="motor">
                                        <option class="active" value="" disabled>Seleccione su motor de preferencia</option>
                                        <option value="mysql">MySQL</option>
                                        <option value="mssql">MSSQLServer</option>
                                        <option value="postgresql">PostgreSQL</option>
                                    </select>
                                    <br/>
                                    <button class="btn btn-primary btn-block" type="submit">Aceptar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>

</html>