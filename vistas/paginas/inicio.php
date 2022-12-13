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

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

<?php
$usuarios = ControladorFormularios::ctrSeleccionarRegistros(null, null);
?>
<table class="table">
    <thead>
        <tr>
            <th>Crear Producto</th>
            <th>Editar Stock</th>
            <th>Compra</th>
            <th>Venta</th>
            <th>Eliminar Producto</th>
            <th>Cerrar Sesión</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
            <div class= "btn-group">
                <div class="px-1">
                <a href="index.php?pagina=crearproducto" label = "Crear Producto" class ="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                </div>
            </div>
            </td>
            <td>
            <div class= "btn-group">
                <div class="px-1">
                <a href="index.php?pagina=modificarproducto" label = "Editar Producto" class ="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                </div>
            </div>
            </td>
            <td>
            <div class= "btn-group">
                <div class="px-1">
                <a href="index.php?pagina=compra" label = "Compra" class ="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                </div>
            </div>
            </td>
            <td>
            <div class= "btn-group">
                <div class="px-1">
                <a href="index.php?pagina=venta" label = "Venta" class ="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                </div>
            </div>
            </td>
            <td>
                <div class= "btn-group">
                    <div class="px-1">
                    <a href="index.php?pagina=eliminarproducto" label = "Eliminar Producto" class ="btn btn-danger"><i class="fa-solid fa-delete-left"></i></a>
                    </div>
                </div>
            </td>
            <td>
                <div class= "btn-group">
                    <div class="px-1">
                    <a href="index.php?pagina=salir" label = "Salir" class ="btn btn-warning"><i class="fa-solid fa-right-from-bracket"></i></i></a>
                    </div>
                </div>
            </td>
        </tr>      
    </tbody>
</table>






<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>
</html>


