<?php 
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

    <!-- ---------------------------------------
        PLUGINS DE CSS
    ------------------------------------------->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- ---------------------------------------
        PLUGINS DE JAVASCRIPT
    ------------------------------------------->

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ---------------------------------------
        ULTIMA VERSION DE FONTAWESEOME
    ------------------------------------------->

    <script src="https://kit.fontawesome.com/8cad23170e.js" crossorigin="anonymous"></script>

</head>
<body>

    <!-- ---------------------------------------
    LOGOTIPO
    ------------------------------------------->

    <div class = "container-fluid">
        <h3 class="text-center py-3"></h3>
    </div>

        <!-- ---------------------------------------
    BOTONERA
    ------------------------------------------->
    
    <!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
     <?php if(isset($_SESSION["validarIngreso"])){
    if($_SESSION["validarIngreso"] == "ok"){
        ?>               <a class="navbar-brand" href="index.php?pagina=registro">Registro</a> <?php    } } ?>
    
    <a class="navbar-brand" href="index.php?pagina=ingreso">Ingreso</a>
    <a class="navbar-brand" href="index.php?pagina=inicio">inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        
      </ul>
    </div>
  </div>
</nav>
<!-- END NAVBAR -->
    
        <!-- ---------------------------------------
    CONTENIDO
    ------------------------------------------->
    <div class ="container-fluid bg-light">
        <div class ="container py-5">
           <?php
                #isset() determina si una variable está definida y no es NULL

                if(isset($_GET["pagina"])){
                    if($_GET["pagina"] == "registro" ||
                       $_GET["pagina"] == "ingreso" ||
                       $_GET["pagina"] == "inicio" ||
                       $_GET["pagina"] == "editar" ||
                       $_GET["pagina"] == "listadoalumnos" ||
                       $_GET["pagina"] == "crearproducto" ||
                       $_GET["pagina"] == "modificarproducto" ||
                       $_GET["pagina"] == "editarproducto" ||
                       $_GET["pagina"] == "usuariosprofes" ||
                       $_GET["pagina"] == "eliminarproducto" ||
                       $_GET["pagina"] == "compra" ||
                       $_GET["pagina"] == "venta" ||
                       $_GET["pagina"] == "anadirproducto" ||
                       $_GET["pagina"] == "carritoventa" ||
                       $_GET["pagina"] == "carritocompra" ||
                       $_GET["pagina"] == "salir"){
                       
                        include "paginas/".$_GET["pagina"].".php";
                    }else{
                        include "paginas/error404.php";
                    }
                }else{
                    include "paginas/registro.php";
                }
           ?>
        </div>
    </div>


    

    
</body>
</html>