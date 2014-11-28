<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Firma Digital - ADSIB</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/firmas.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- BarMenu -->
    <nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Firma Digital</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="verificar_f.php">Verificar</a>
                    </li>
                    <li>
                        <a href="firmar_f.php">Firmar</a>
                    </li>
                    <li>
                        <a href="verificar_pdf.php">Verificar PDF - ODT</a>
                    </li>
                    <li>
                        <a href="#">Firmar PDF - ODT</a>
                    </li>
                    <li>
                        <a href="#">Generar Llaves</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Contenido de la pagina -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h1> Firma Digital </h1>
                <p>Verifica un archivo en cualquier formato, usando una llave publica y un archivo con la firma.</p>
                <br>
                <form name="formulario" enctype="multipart/form-data" action="verificar.php" method="POST">
                    <label for="inputFile">Archivo</label>
                    <input name="uploadedfile" type="file" id="inputFile">
                    <p class="help-block">Suba el archivo que desea verificar.</p>
    
                    <label for="inputFile">Firma</label>
                    <input name="uploadedsign" type="file" id="inputFile">
                    <p class="help-block">Suba el archivo con la firma binaria, por ejemplo: "firmado.sig".</p>
                    
                    <label for="inputFile">Llave Publica</label>
                    <input name="uploadedcertificate" value="algo" type="file" onclick="document.formulario.enviar.disabled=!document.formulario.enviar.disabled">
                    <p class="help-block">Suba su llave publica para verificar la Firma.</p>
             
                    <input class="btn btn-default btn-lg" name="enviar" type="submit" value="Verificar Firma"  disabled/>
                </form>

                <!-- Standard button -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>