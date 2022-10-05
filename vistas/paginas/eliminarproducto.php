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
<table class="table">
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
            <td><?php echo $value["nombre_prod"]; ?></td>
            <td><?php echo $value["categoria"]; ?></td>
            <td><?php echo $value["precio_costo"]; ?></td>
            <td><?php echo $value["precio_venta"]; ?></td>
            <td><?php echo $value["stockactual"]; ?></td>
            <td>
                <div class= "btn-group">
                    <form method="post">
                        <input type="hidden" value = "<?php echo $value["id"]; ?>" name="eliminarProducto">
                        <button type="submit" class ="btn btn-danger"><i class="fa-solid fa-delete-left"></i></button>
                        <?php
                            $eliminar = new ControladorFormularios();
                            $eliminar->ctrEliminarProducto();
                        ?>
                    </form>
            </div>
            
            </td>
        </tr>
    <?php endforeach ?>
    <div class= "btn-group">
                <div class="px-1">
                <a href="index.php?pagina=inicio" label = "Crear Alumno" class ="btn btn-warning"><i class="fa-solid fa-backward"></i></i></i></a>
                </div>
    </div>
    </tbody>
</table>