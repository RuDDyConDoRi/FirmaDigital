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
                        <a href="verificar_pdf_back.php">Verificar PDF - ODT</a>
                    </li>
                    <li>
                        <a href="#">Firmar PDF - ODT</a>
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
                <?php
                    error_reporting(E_ALL & ~E_NOTICE);
                    ini_set("display_errors", 1);
                    
                    include_once '../libs/libreria.php';
                    
                    $target_path = "./";
                    $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
                    $archivo_upload = basename( $_FILES['uploadedfile']['name']);
                    if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
                        echo "El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido subido"."<br>";
                    }else{
                        echo "Ha ocurrido un error, trate de nuevo!"."<br>";
                    }

                    $target_path = "./";
                    $target_path = $target_path . basename( $_FILES['uploadedprivkey']['name']);
                    $llave_privada = basename( $_FILES['uploadedprivkey']['name']);
                    if(move_uploaded_file($_FILES['uploadedprivkey']['tmp_name'], $target_path)) {
                        echo "El archivo ". basename( $_FILES['uploadedprivkey']['name']). " ha sido subido"."<br>";
                    }else{
                        echo "Ha ocurrido un error, trate de nuevo!"."<br>";
                    }

                    $pass_llave = $_POST['uploadedpassword'];
                    //echo "el password es:".$pass_llave."<br>";
                    
                    //************* empezamos la verificacion **************************//
                    $Libreria = new Libreria();
                    
                    $fileIn1 = fopen($archivo_upload,"r");
		    $fileIn = "";
		    while(!feof($fileIn1)) {
		        $fileIn.=fgets($fileIn1);
		    }
		    fclose($fileIn1);
		    //echo "archivo: ".$fileIn."<br>";
		
		    $privKey1 = fopen($llave_privada,"r");
		    $privKey = "";
		    while(!feof($privKey1)){
		        $privKey.=fgets($privKey1);
		    }
		    fclose($privKey1);
		    //echo "archivo: ".$privKey."<br>";                  
                    
                    $sig = $Libreria->firmarBinario($fileIn,$privKey);
                    
                    echo " ".$sig."<br>";
                    
                    $firmadoSig = fopen("firmado.sig","a");
                    fwrite($firmadoSig,$sig);
                    fclose($firmadoSig);
                    
                    //shell_exec("openssl dgst -c -sign uploads/".$llave_privada." -out uploads/filefirmado.sig uploads/".$archivo_upload);
                    echo "<h4 style='color: blue;'>Archivo Firmado</h4>"."<br>";

                    //$salida = shell_exec('ls -lart');
                    //echo "<pre>$salida</pre>";
                    echo "<a href='./firmado.sig'> Archivo Con La Firma</a>";
                    echo "<a href='./".$archivo_upload."'> Tu Archivo </a>"
                ?>
                
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