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
$usuarios = ControladorFormularios::ctrMostrarCarrito(null, null);




//$notas = ControladorFormularios::ctrSeleccionarRegistrosNotas(null,null);
//$usuarios = $notas;
?>
<style>
    .center {
  text-align: center;
  border: 3px solid green;
}
</style>
<table class="table" id="tablaxd">
    <thead>
        <tr>
            <th></th>
            <th>SKU</th>
            <th>Nombre</th>
            <th>Precio Costo</th>
            
        </tr>
    </thead>
    <tbody>
    <?php $total = 0 ?>
    <?php $numcompra = 0 ?>
    
    <?php foreach ($usuarios as $key => $value): ?>
        <tr>
        
            <td  ><?php echo ($key+1); ?></td>
            <td  id="sskkuu" name="sskkuu" ><?php echo $value["SKU"]; ?></td>
            
            <td id="nomprod" name="nomprod" ><?php echo $value["nombre_producto"]; ?></td>
            
            <td id="pcosto" name="pcosto" ><?php echo $value["precio_costo"]; ?></td>
            <?php $total = $total + $value["precio_costo"]; ?>
            <td>
                <div class= "btn-group">
                    <form method="post">
                        <input type="hidden" value = "<?php echo $value["producto_id"]; ?>" name="quitarCarro">
                        <button type="submit" class ="btn btn-danger"><i class="fa-solid fa-delete-left"></i></button>
                        <?php
                            $eliminar = new ControladorFormularios();
                            $eliminar->ctrQuitarDelCarroCompra();
                            
                        ?>
                    </form>
            </div>
            
            </td>
            

        </tr>
    <?php endforeach ?>
    <h1> </h1>
    <div class= "btn-group">
                <div class="px-1">
                
                </div>
    </div>
    <div class= column method="post">
        <a href="index.php?pagina=compra" label = "Crear Producto" class ="btn btn-warning"><i class="fa-solid fa-backward"></i></i></i></a>
        <a href="index.php?pagina=carritocompra" label = "Crear Producto" class ="btn btn-warning"><i class="fa-solid fa-refresh"></i></i></i></a>
        <div class="center">
            <h1>Total Factura</h1>
            <h2 id="totalfactura" name="totalfactura" ><?php echo $total  ?></h2>
        </div>
        <div class="row">
            <p>id boleta</p>
            <p id="ncompra" name="ncompra" ><?php echo $numcompra?></p>
        </div>
        <div class = row>
            <form>Busqueda: <input id="txtBusqueda" type="text" onkeyup="Buscar();" /></form>
            <?php
                foreach ($usuarios as $key => $value):
                    $comprar = new ControladorFormularios();
                    $comprar->ctrComprar();
                    if($comprar == "ok"){
                        $numcompra = $numcompra + 1;
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
                    }else{
                        echo '<div class="alert alert-danger"> El producto no ha sido comprado.</div>';
                    }
                endforeach
            ?>
            <button type="submit" class="btn btn-primary">Comprar </button>
        </div>
    </div>
    


    </tbody>
</table>
<script type="text/javascript">// < ![CDATA[
function Buscar() {
            var tabla = document.getElementById('tablaxd');
            var busqueda = document.getElementById('txtBusqueda').value.toLowerCase();
            var cellsOfRow="";
            var found=false;
            var compareWith="";
            for (var i = 1; i < tabla.rows.length; i++) {
                cellsOfRow = tabla.rows[i].getElementsByTagName('td');
                found = false;
                for (var j = 0; j < cellsOfRow.length && !found; j++) { compareWith = cellsOfRow[j].innerHTML.toLowerCase(); if (busqueda.length == 0 || (compareWith.indexOf(busqueda) > -1))
                    {
                        found = true;
                    }
                }
                if(found)
                {
                    tabla.rows[i].style.display = '';
                } else {
                    tabla.rows[i].style.display = 'none';
                }
            }
        }
// ]]></script>