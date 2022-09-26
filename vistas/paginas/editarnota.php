<?php
if(isset($_GET["id"])){   
    $item = "id_alumno";
    $valor = $_GET["id"]; 
    $usuario = ControladorFormularios::ctrSeleccionarNotas($item, $valor);
    
}
?>
<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-light" method="post">
        <table class="table">
            <thead>
                <tr>
                    <th>Nota 1</th>
                    <th>Nota 2</th>
                    <th>Nota 3</th>
                    <th>Nota 4</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="number" class="form-control" value="<?php echo $usuario["nota1"]; ?>" id="nota1" name="actualizarNota1"></td>
                    <td><input type="number" class="form-control" value="<?php echo $usuario["nota2"]; ?>" id="nota2" name="actualizarNota2"></td>
                    <td><input type="number" class="form-control" value="<?php echo $usuario["nota3"]; ?>" id="nota3" name="actualizarNota3"></td>
                    <td><input type="number" class="form-control" value="<?php echo $usuario["nota4"]; ?>" id="nota4" name="actualizarNota4"></td>
                    <input type="hidden" name="IDalumno" value="<?php echo $usuario["id_alumno"]; ?>">
                    <td>
                        <?php 
                            $actualizar = ControladorFormularios::ctrActualizarNota();

                            if($actualizar == "ok"){
                                echo '<script>
                                    if (window.history.replaceState){
                                        window.history.replaceState(null, null, window.location.href);

                                    }
                                
                                </script>';
                                echo '<div class="alert alert-success"> Las notas han sido actualizadas.</div>
                                <script>
                            
                                setTimeout(function(){
                                    window.location = "index.php?pagina=modificarnotas";

                                },1000);
                            
                                </script>'; 
                            }
                        ?>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                    </td>                
                </tr>
            </tbody>
        </table>
        <div class= "btn-group">
                <div class="px-1">
                <a href="index.php?pagina=modificarnotas" label = "Crear Alumno" class ="btn btn-warning"><i class="fa-solid fa-backward"></i></i></i></a>
                </div>
        </div>
    </form>
</div>