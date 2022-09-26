<?php

#INDEX aqui irán las vistas al usuario y a través de el enviaremos las distintas acciones que el usuario envíe al controlador.

require_once "controladores/plantilla.controlador.php";
require_once "controladores/formularios.controlador.php";
require_once "modelos/formularios.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrTraerPlantilla();




