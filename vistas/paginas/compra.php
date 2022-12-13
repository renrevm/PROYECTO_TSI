<?php
if(isset($_SESSION["validarIngreso"])){
    if($_SESSION["validarIngreso"] != "ok"){
        echo '<script> window.location = "index.php?pagina=ingreso"; </script>';
        return;
    }
}else{
    echo '<script> window.location = "index.php?pagina=ingreso"; </script>';
    return;
}

?>
<div class= "btn-group">
                <div class="px-1">
                <a href="index.php?pagina=inicio" label = "Volver" class ="btn btn-warning"><i class="fa-solid fa-backward"></i></i></i></a>
                </div>
</div>

include("../admin/navbar.php");
include("nav_cart.php");
include("modal_cart.php");