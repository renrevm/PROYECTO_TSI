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
if(isset($_GET["id"])){   
    $item = "SKU";
    $valor = $_GET["id"]; 
    $usuario = ControladorFormularios::ctrSeleccionarProd($item, $valor);
    
}
$user = ControladorFormularios::ctrSeleccionarIdVenta(null, null);
?>
<div>

</div>
<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-light" method="post">
        <div>
            
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>SKU</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Precio Costo</th>
                    <th>Precio Venta</th>
                    <th>Stock Disponibles</th>

                
        
                 
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="number" readonly=»readonly class="form-control" value="<?php echo $usuario["id"]; ?>" id="id" name="id" min="0"></td>
                    <td><input type="number" readonly=»readonly class="form-control" value="<?php echo $usuario["SKU"]; ?>" id="SKU" name="actualizarSKU" min="0"></td>
                    <td><input type="text" readonly=»readonly class="form-control" value="<?php echo $usuario["nombre_producto"]; ?>" id="nombre_producto" name="actualizarNombre"></td>
                    <td><select class="form-control" name="actualizarCategoria" id="actualizarCategoria">
                            <option value="<?php echo $usuario["id_categoria"]; ?>"> <?php echo $usuario["id_categoria"]; ?></option>
                            
                        </select></td>
                    <td><input type="number" readonly=»readonly class="form-control" value="<?php echo $usuario["precio_costo"]; ?>" id="precio_costo" name="actualizarPrecioCosto" min="0"></td>
                    <td><input type="number"  readonly=»readonly class="form-control" value="<?php echo $usuario["precio_venta"]; ?>" id="anadirPrecio" name="anadirPrecio" min="0"></td>
                    <td><input type="number" readonly=»readonly class="form-control" value="<?php echo $usuario["stockactual"]; ?>" id="stockactual" name="actualizarStockActual"></td>
                 
                    <td>
                            <?php 
                                $actualizar = ControladorFormularios::ctrAnadirAlCarro();
                                if($actualizar == "ok"){
                                    echo '<script>
                                        if (window.history.replaceState){
                                            window.history.replaceState(null, null, window.location.href);

                                        }
                                    
                                    </script>';
                                    echo '<div class="alert alert-success"> El producto ha sido añadido al carro.</div>
                                    <script>
                                
                                    setTimeout(function(){
                                        window.location = "index.php?pagina=compra";

                                    },1000);
                                
                                    </script>'; 
                                }
                            ?>
                            <button type="submit" class="btn btn-primary">Añadir </button>
                    </td>                
                </tr>
            </tbody>
        </table>
        <div class= "btn-group">
                <div class="px-1">
                <a href="index.php?pagina=compra" label = "Volver a compra" class ="btn btn-warning"><i class="fa-solid fa-backward"></i></i></i></a>
                </div>
        </div>
    </form>
</div>