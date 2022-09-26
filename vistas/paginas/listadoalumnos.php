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

$usuarios = ControladorFormularios::ctrSeleccionarRegistrosAlumnos(null, null);
//$notas = ControladorFormularios::ctrSeleccionarRegistrosNotas(null,null);
//$usuarios = $notas;
?>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Rut</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha de Nacimiento</th>
            <th>Nota 1</th>
            <th>Nota 2</th>
            <th>Nota 3</th>
            <th>Nota 4</th>
            <th>Promedio</th>
            <th>Eliminar Alumno</th>
        </tr>
    </thead>
    <tbody>

    <?php foreach ($usuarios as $key => $value): ?>
        <tr>
            <td><?php echo ($key+1); ?></td>
            <td><?php echo $value["rut"]; ?></td>
            <td><?php echo $value["nombre"]; ?></td>
            <td><?php echo $value["apellido"]; ?></td>
            <td><?php echo $value["fecha_nac"]; ?></td>
            <td><?php echo $value["nota1"]; ?></td>
            <td><?php echo $value["nota2"]; ?></td>
            <td><?php echo $value["nota3"]; ?></td>
            <td><?php echo $value["nota4"]; ?></td>
            <?php
            $promedio = ($value["nota1"] + $value["nota2"] + $value["nota3"] + $value["nota4"])/4
            ?>
            <td><?php echo $promedio; ?></td>
            <td>
                <div class= "btn-group">
                    <form method="post">
                        <input type="hidden" value = "<?php echo $value["rut"]; ?>" name="eliminarAlumno">
                        <button type="submit" class ="btn btn-danger"><i class="fa-solid fa-delete-left"></i></button>
                        <?php
                            $eliminar = new ControladorFormularios();
                            $eliminar->ctrEliminarAlumno();
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