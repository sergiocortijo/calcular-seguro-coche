<?php


//el temilla de la sesion, antes de cualquier cosa!!
if (!isset($_SESSION)) {
    session_start();
}

echo "<title>Imprime poliza</title>";


//var_dump($_SESSION);
//requerimos las clase necesarias
require_once '../clases/Poliza.php';
require_once '../clases/Vehiculo.php';
require_once '../clases/Tomador.php';


//recuperamos los objetos de la sesion
$laPoliza = unserialize($_SESSION['poliza']);

/*
 * 
 *  Al llamar a $elPrecio = $laPoliza->Precio($detalle) se consigue el precio 
 * (return) en la variable "elPrecio" y el array asociativo "detalle" 
 * (por referencia) que contiene los detalles de la poliza
 * 
 */

$elPrecio = $laPoliza->Precio($detalle);

//ponemos la ficha de la poliza en gordo!
echo '<h3>'. $laPoliza->ficha().'</h3> <br>';
echo '<h3> RECARGOS Y DESCUENTOS </h3> <br>';
echo $laPoliza->detalle($detalle);

//devolvemos el control al formulario
echo '<br><a href="DatosPoliza.html"> OTRA POLIZA </a>';
?>
