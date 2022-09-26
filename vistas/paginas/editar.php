<?php
if(isset($_GET["id"])){   
    $item = "id";
    $valor = $_GET["id"]; 
    $usuario = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);
}
?>
<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-light" method="post">
        <div class="form-group">
            
            <div class="input-group"> 
                <div class="input-group-prepend"> 
                    <span class ="input-group-text"><i class="fa-solid fa-person-rays"></i> </span>
                </div>
                <input type="text" class="form-control" value="<?php echo $usuario["nombre"]; ?>" placeholder = "Escriba su nombre" id="nombre" name="actualizarNombre">
            </div>
        </div>
        <div class="form-group">
            
            <div class ="input-group"> 
                <div class="input-group-prepend"> 
                        <span class ="input-group-text"><i class="fa-solid fa-envelope"></i> </span>
                </div>
                <input type="email" class="form-control" value="<?php echo $usuario["email"]; ?>" placeholder = "Escriba su Email" id="email" name="actualizarMail">
            </div>
        </div>
        <div class="form-group">
            
            <div class="input-group">
                <div class="input-group-prepend"> 
                    <span class ="input-group-text"><i class="fa-solid fa-key"></i></span>
                </div>
                <input type="password" class="form-control"  placeholder = "Escriba su contraseña" id="pwd" name="actualizarPassword">
                <input type="hidden" name="passwordActual" value="<?php echo $usuario["password"]; ?>">
                <input type="hidden" name="idUsuario" value="<?php echo $usuario["id"]; ?>">
            </div>
        </div> 

        <?php 
        $actualizar = ControladorFormularios::ctrActualizarRegistro();
        if($actualizar == "ok"){
            echo '<script>
                if (window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);

                }
            
            </script>';
            echo '<div class="alert alert-success"> El usuario ha sido actualizado exitosamente.</div>
            
            <script>
            
                setTimeout(function(){
                    window.location = "index.php?pagina=inicio";

                },3000);
            
            </script>


            ';
            }
        
        ?>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>  
</div>