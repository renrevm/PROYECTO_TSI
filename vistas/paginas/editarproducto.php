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
    $usuario = ControladorFormularios::ctrSeleccionarRegistroProductos($item, $valor);
}
?>
<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-light" method="post">
        <table class="table">
            <thead>
                <tr>
                    <th>SKU</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Precio Costo</th>
                    <th>Precio Venta</th>
                    <th>Stock Disponibles</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="number" class="form-control" value="<?php echo $usuario["SKU"]; ?>" id="SKU" name="actualizarSKU" min="0"></td>
                    <td><input type="text" class="form-control" value="<?php echo $usuario["nombre_producto"]; ?>" id="nombre_producto" name="actualizarNombre"></td>
                    <td><select class="form-control" name="actualizarCategoria" id="actualizarCategoria">
                            <option value="<?php echo $usuario["id_categoria"]; ?>"><?php echo $usuario["nombre_categoria"]; ?></option>
                            
                        </select></td>
                    <td><input type="number" class="form-control" value="<?php echo $usuario["precio_costo"]; ?>" id="precio_costo" name="actualizarPrecioCosto" min="0"></td>
                    <td><input type="number" class="form-control" value="<?php echo $usuario["precio_venta"]; ?>" id="precio_venta" name="actualizarPrecioVenta" min="0"></td>
                    <td><input type="number" class="form-control" value="<?php echo $usuario["stockactual"]; ?>" id="stockactual" name="actualizarStockActual"></td>
                    <input type="hidden" name="id" value="<?php echo $usuario["id"]; ?>">
                    <input type="hidden" name="id" value="<?php echo $usuario["id"]; ?>">
                    <input type="hidden" name="id_categoria" value="<?php echo $usuario["id_categoria"]; ?>">
                    <td>
                        <?php 
                        /*
                                <div class="form-group">
            <label for="categoria">Categoria:</label>
            <div class="input-group"> 
                <div class="input-group-prepend"> 
                    <span class ="input-group-text"><i class="fa-solid fa-person-rays"></i> </span>
                </div>
                <select class="form-control" id="categoria" name="crearCategoria">
                    <option value="1">Carnes</option>
                    <option value="2">Accesorios</option>
                    <option value="3">Picoteo</option>
                    <option value="4">Liquidos</option>
                </select>
        </div>*/ 
                            $actualizar = ControladorFormularios::ctrActualizarProducto();

                            if($actualizar == "ok"){
                                echo '<script>
                                    if (window.history.replaceState){
                                        window.history.replaceState(null, null, window.location.href);

                                    }
                                
                                </script>';
                                echo '<div class="alert alert-success"> El producto ha sido actualizado.</div>
                                <script>
                            
                                setTimeout(function(){
                                    window.location = "index.php?pagina=modificarproducto";

                                },1000);
                            
                                </script>'; 
                            }
                        ?>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                    </td>                
                </tr>
            </tbody>
        </table>
        <div class= "btn-group">
                <div class="px-1">
                <a href="index.php?pagina=modificarproducto" label = "Crear Producto" class ="btn btn-warning"><i class="fa-solid fa-backward"></i></i></i></a>
                </div>
        </div>
    </form>
</div>