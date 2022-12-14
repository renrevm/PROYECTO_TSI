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
            
            
            <th>Precio Venta</th>
            
        </tr>
    </thead>
    <tbody>
    <?php $total = 0 ?>
    <?php $numventa = 0 ?>
    
    <?php foreach ($usuarios as $key => $value): ?>
        <tr>
        
            <td  ><?php echo ($key+1); ?></td>
            <td  id="sskkuu" name="sskkuu" ><?php echo $value["SKU"]; ?></td>
            
            <td id="nomprod" name="nomprod" ><?php echo $value["nombre_producto"]; ?></td>
            
            <td id="pcosto" name="pcosto" ><?php echo $value["precio_venta"]; ?></td>
            <?php $total = $total + $value["precio_venta"]; ?>
            <td>
                <div class= "btn-group">
                    <form method="post">
                        <input type="hidden" value = "<?php echo $value["producto_id"]; ?>" name="quitarCarro">
                        <button type="submit" class ="btn btn-danger"><i class="fa-solid fa-delete-left"></i></button>
                        <?php
                            $eliminar = new ControladorFormularios();
                            $eliminar->ctrQuitarDelCarroVenta();
                            
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
        <a href="index.php?pagina=venta" label = "Crear Producto" class ="btn btn-warning"><i class="fa-solid fa-backward"></i></i></i></a>
        <a href="index.php?pagina=carritoventa" label = "Crear Producto" class ="btn btn-warning"><i class="fa-solid fa-refresh"></i></i></i></a>
        <div class="center">
            <h1>Total Boleta</h1>
            <h2 id="totalboleta" name="totalboleta" ><?php echo $total  ?></h2>
        </div>
        <div class="row">
            <p>id boleta</p>
            <p id="nventa" name="nventa" ><?php echo $numventa?></p>
        </div>
        <div class = row>
            <form>Busqueda: <input id="txtBusqueda" type="text" onkeyup="Buscar();" /></form>
            <?php
                foreach ($usuarios as $key => $value):
                    $comprar = ControladorFormularios::ctrVender();
                    if($comprar == "ok"){
                        $numventa = $numventa + 1;
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
                        echo '<div class="alert alert-danger"> El producto no se ha vendido.</div>';
                    }
                endforeach
            ?>
            <button type="submit" class="btn btn-primary">Vender </button>
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