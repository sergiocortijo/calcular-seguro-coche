<?php

// CREAMOS LA SESION
session_start();

echo "<title>Calculo de poliza</title>";


require '../clases/Poliza.php';
require '../clases/Tomador.php';
require '../clases/Vehiculo.php';

// cargamos los datos que nos vienen del $_POST(), que deben haber venido!
//var_dump($_POST);

$yo = new Tomador($_POST['tomador'],$_POST['anoCarnet'],$_POST['sexo']);

$miCarro = new Vehiculo($_POST['matricula'],$_POST['anoMatriculacion'],
        $_POST['combustible']);

$modalidad = $_POST['modalidad'];

$laPoliza = new Poliza($yo, $miCarro, $modalidad);

echo $laPoliza->ficha();

/*
 * 
 *  Al llamar a $elPrecio = $laPoliza->Precio($detalle) se consigue el precio 
 * (return) en la variable "elPrecio" y el array asociativo "detalle" 
 * (por referencia) que contiene los detalles de la poliza
 * 
 */

$elPrecio = $laPoliza->Precio($detalle);

echo '<br>';
echo 'PERMITEME QUE INSISTA, son '. $elPrecio.' euros </br>';
echo '<br>';
echo '<br>';


//almacenamos $laPoliza en $_SESSION, para no perder el objeto si vamos
//a otra página
$_SESSION['poliza'] = serialize($laPoliza);

//var_dump($_SESSION);

echo '<a href="imprime.php" > IMPRIMIR POLIZA DETALLADA </a><br><br>';
echo '<a href="DatosPoliza.html" > OTRA POLIZA </a>';
?>
