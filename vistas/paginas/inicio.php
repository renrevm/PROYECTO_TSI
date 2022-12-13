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

<title>Carrito de compras</title>
</head>
<body>


<?php 

$carrito_mio=$_SESSION['carrito'];
$_SESSION['carrito']=$carrito_mio;

// contamos nuestro carrito
if(isset($_SESSION['carrito'])){
    for($i=0;$i<=count($carrito_mio)-1;$i ++){
    if($carrito_mio[$i]!=NULL){ 
    $total_cantidad = $carrito_mio['cantidad'];
    $total_cantidad ++ ;
    $total_cantidad += $total_cantidad;
    }}}
    else{
      print('hola falle');
    }
?>





<!-- MODAL CARRITO -->
<div class="modal fade" id="modal_cart" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
   
   
     
			<div class="modal-body">
				<div>
					<div class="p-2">
						<ul class="list-group mb-3">
							<?php
							if(isset($_SESSION['carrito'])){
							$total=0;
							for($i=0;$i<=count($carrito_mio)-1;$i ++){
							if($carrito_mio[$i]!=NULL){
						
            ?>
							<li class="list-group-item d-flex justify-content-between lh-condensed">
								<div class="row col-12" >
									<div class="col-6 p-0" style="text-align: left; color: #000000;"><h6 class="my-0">Cantidad: <?php echo $carrito_mio[$i]['cantidad'] ?> : <?php echo $carrito_mio[$i]['titulo']; // echo substr($carrito_mio[$i]['titulo'],0,10); echo utf8_decode($titulomostrado)."..."; ?></h6>
									</div>
									<div class="col-6 p-0"  style="text-align: right; color: #000000;" >
									<span   style="text-align: right; color: #000000;"><?php echo $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad'];    ?> $</span>
									</div>
								</div>
							</li>
							<?php
							$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
							}
							}
							}
							?>
							<li class="list-group-item d-flex justify-content-between">
							<span  style="text-align: left; color: #000000;">Total (CLP)</span>
							<strong  style="text-align: left; color: #000000;"><?php
							if(isset($_SESSION['carrito'])){
							$total=0;
							for($i=0;$i<=count($carrito_mio)-1;$i ++){
							if($carrito_mio[$i]!=NULL){ 
							$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
							}}}
							echo $total; ?> $</strong>
							</li>
						</ul>
					</div>
				</div>
			</div>
			


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <a type="button" class="btn btn-primary" href="borrarcarro.php">Vaciar carrito</a>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL CARRITO -->

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



<!-- ARTICULOS -->
<div class="container mt-5">
<div class="row" style="justify-content: center;">

<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="10" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 1" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/art.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Producto 1</h5>
                        <p class="card-text">Descripción - Precio 10$</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>



<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="20" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 2" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/art.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Producto 2</h5>
                        <p class="card-text">Descripción - Precio 20$</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>


<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="30" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 3" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/art.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Producto 3</h5>
                        <p class="card-text">Descripción - Precio 30$</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>




</div>
</div>
<!-- END ARTICULOS -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>
</html>


