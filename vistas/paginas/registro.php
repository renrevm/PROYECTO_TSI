<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-light" method="post">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <div class="input-group"> 
                <div class="input-group-prepend"> 
                    <span class ="input-group-text"><i class="fa-solid fa-person-rays"></i> </span>
                </div>
                <input type="text" class="form-control" id="nombre" name="registroNombre" required>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <div class ="input-group"> 
                <div class="input-group-prepend"> 
                        <span class ="input-group-text"><i class="fa-solid fa-envelope"></i> </span>
                </div>
            
                <input type="email" class="form-control" id="email" name="registroMail" required>
            </div>
        </div>
        <div class="form-group">
            <label for="pwd">Contraseña:</label>
            <div class="input-group">
                <div class="input-group-prepend"> 
                    <span class ="input-group-text"><i class="fa-solid fa-key"></i></span>
                </div>
                <input type="password" class="form-control" id="pwd" name="registroPassword" required>
            </div>
        </div>
        <div class="form-group">
            <label for="rol">Rol:</label>
            <div class="input-group"> 
                <div class="input-group-prepend"> 
                    <span class ="input-group-text"><i class="fa-solid fa-person-rays"></i> </span>
                </div>
                <select class="form-control" id="rol" name="registroRol">
                    <option>Owner</option>
                    <option>Manager</option>
                    <option>Admin</option>
                    <option>Seller</option>
                </select>

        </div>  
        <!--<div class="form-group">
            <label for="rol">Rol:</label>
            <div class="input-group">
                <div class="input-group-prepend"> 
                    <span class ="input-group-text"><i class="fa-solid fa-key"></i></span>
                </div>
                <select name="registroRol" class="form-control" id = "rol" onChange ="combo(this,'demo')">
                <option>owner</option>
                <option>manager</option>
                <option>admin</option>
                <option>seller</option>
            </div>
        </div> -->
    
        <?php

        /*
        INSTANCIA DE MÉTODO NO ESTÁTICO
        
        $registro = new ControladorFormularios();
        $registro -> ctrRegistro();
        */
        

        /*
        INSTANCIA DE MÉTODO ESTÁTICO
        */

        $registro = ControladorFormularios::ctrRegistro();



        if($registro=="ok"){
            echo '<script>
                if (window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);

                }
            
            </script>';
            echo '<div class="alert alert-success"> El usuario ha sido registrado exitosamente.</div>';
        }

        ?>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>  
</div>
