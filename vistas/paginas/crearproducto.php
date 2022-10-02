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
?>
<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-light" method="post">
        <div class="form-group">
            <label for="nombre">SKU:</label>
            <div class="input-group"> 
                <div class="input-group-prepend"> 
                    <span class ="input-group-text"><i class="fa-solid fa-person-rays"></i> </span>
                </div>
                <input type="text" class="form-control" id="nombre" name="crearRut">
            </div>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre Producto:</label>
            <div class="input-group"> 
                <div class="input-group-prepend"> 
                    <span class ="input-group-text"><i class="fa-solid fa-person-rays"></i> </span>
                </div>
                <input type="text" class="form-control" id="nombre" name="crearNombre">
            </div>
        </div>
        <div class="form-group">
            <label for="nombre">Categoría:</label>
            <div class="input-group"> 
                <div class="input-group-prepend"> 
                    <span class ="input-group-text"><i class="fa-solid fa-person-rays"></i> </span>
                </div>
                <input type="text" class="form-control" id="nombre" name="crearApellido">
            </div>
        </div>
        <div class="form-group">
            <label for="dte">Precio:</label>
            <div class="input-group">
                <div class="input-group-prepend"> 
                    <span class ="input-group-text"><i class="fa-solid fa-key"></i></span>
                </div>
                <input type="date" class="form-control" id="dte" name="crearFecha">
            </div>
        </div> 
        <?php
        /*
        INSTANCIA DE MÉTODO NO ESTÁTICO
        $registro = new ControladorFormularios();
        $registro -> ctrRegistro();
        */
        /*
        INSTANCIA DE MÉTODO ESTÁTICO
        */
        $registro = ControladorFormularios::ctrRegistroAlumnos();
        if($registro=="ok"){
            
            echo '<script>
                if (window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>';
            echo '<div class="alert alert-success"> El producto ha sido creado exitosamente.</div>';
        }
        ?>
        <button type="submit" class="btn btn-primary">Crear</button>
        <div class= "btn-group">
                <div class="px-1">
                <a href="index.php?pagina=inicio" label = "Crear Producto" class ="btn btn-warning"><i class="fa-solid fa-backward"></i></i></i></a>
                </div>
        </div>
    </form>  
</div>