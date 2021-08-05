<?php
include "libraries/rout.php";
spl_autoload_register(function($className){
include "libraries/$className.php";
});

include "config/config.php";

$Rout = new Rout;

?>