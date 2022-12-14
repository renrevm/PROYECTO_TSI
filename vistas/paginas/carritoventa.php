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
    <?php foreach ($usuarios as $key => $value): ?>
        <tr>
            <td><?php echo ($key+1); ?></td>
            <td><?php echo $value["SKU"]; ?></td>
            <td><?php echo $value["nombre_producto"]; ?></td>
            
            
            <td><?php echo $value["precio_venta"]; ?></td>
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
    <div class= "btn-group">
                <div class="px-1">
                <a href="index.php?pagina=inicio" label = "Crear Producto" class ="btn btn-warning"><i class="fa-solid fa-backward"></i></i></i></a>
                </div>
    </div>
    <div class="center">
        <h1>Total Boleta</h1>
        <h2>$<?php  ?></h2>
    </div>
    <form>Busqueda: <input id="txtBusqueda" type="text" onkeyup="Buscar();" /></form>
    
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