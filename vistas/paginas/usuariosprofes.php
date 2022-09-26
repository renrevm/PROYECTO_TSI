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
$usuarios = ControladorFormularios::ctrSeleccionarRegistros(null, null);
?>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Fecha de Creación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

    <?php foreach ($usuarios as $key => $value): ?>
        <tr>
            <td><?php echo ($key+1); ?></td>
            <td><?php echo $value["nombre"]; ?></td>
            <td><?php echo $value["email"]; ?></td>
            <td><?php echo $value["fecha"]; ?></td>
            <td>
            <div class= "btn-group">
                <div class="px-1">
                <a href="index.php?pagina=editar&id=<?php echo $value["id"]; ?> " class ="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                </div>
                <form method="post">
                    <input type="hidden" value = "<?php echo $value["id"]; ?>" name="eliminarRegistro">
                    <button type="submit" class ="btn btn-danger"><i class="fa-solid fa-delete-left"></i></button>
                    <?php
                        $eliminar = new ControladorFormularios();
                        $eliminar->ctrEliminarRegistro();
                    ?>
                </form>
            </div>
            </td>
        </tr>      
    <?php endforeach ?>
    </tbody>
</table>