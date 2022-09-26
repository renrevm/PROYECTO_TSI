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
            <th>Crear Alumnos</th>
            <th>Registrar Notas Alumnos</th>
            <th>Eliminar Alumnos</th>
            <th>Cerrar Sesión</th>
        </tr>
    </thead>
    <tbody>

    
        <tr>
            <td>
            <div class= "btn-group">
                <div class="px-1">
                <a href="index.php?pagina=crearalumno" label = "Crear Alumno" class ="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                </div>
            </div>
            </td>
            <td>
                <div class= "btn-group">
                    <div class="px-1">
                    <a href="index.php?pagina=modificarnotas" label = "Modificar Notas" class ="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    </div>
                </div>
            </td>
            <td>
                <div class= "btn-group">
                    <div class="px-1">
                    <a href="index.php?pagina=listadoalumnos" label = "Eliminar Alumno" class ="btn btn-danger"><i class="fa-solid fa-delete-left"></i></a>
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