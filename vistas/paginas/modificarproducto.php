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
$usuarios = ControladorFormularios::ctrSeleccionarRegistroProductos(null, null);
//$notas = ControladorFormularios::ctrSeleccionarRegistrosNotas(null,null);
//$usuarios = $notas;
?>
<table class="table" id="tablaxd">
    <thead>
        <tr>
            <th></th>
            <th>SKU</th>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>Precio Costo</th>
            <th>Precio Venta</th>
            <th>Stock Actual</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($usuarios as $key => $value): ?>
        <tr>
            <td><?php echo ($key+1); ?></td>
            <td><?php echo $value["SKU"]; ?></td>
            <td><?php echo $value["nombre_producto"]; ?></td>
            <td><?php echo $value["nombre_categoria"]; ?></td>
            <td><?php echo $value["precio_costo"]; ?></td>
            <td><?php echo $value["precio_venta"]; ?></td>
            <td><?php echo $value["stockactual"]; ?></td>
            <td>
                <div class = "btn-group">
                    <div class="px-1">
                    <a href="index.php?pagina=editarproducto&id=<?php echo $value["SKU"]; ?> " class ="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    </div>
                </div>
            </td>
        </tr>
    <?php endforeach ?>
    <div class= "btn-group">
                <div class="px-1">
                <a href="index.php?pagina=inicio" label = "Crear Producto" class ="btn btn-warning"><i class="fa-solid fa-backward"></i></i></i></a>
                </div>
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