<?php 
	/*
	* 	Conexion con base de datos
	*/
function conectarse(){
  	$servidor="localhost";
  	$usuario="root";
  	$password="contrasena";
  	$bd="dbmanejocaja";

  	$conectar=new mysqli($servidor,$usuario,$password,$bd);
  	return $conectar;
 }
  $conexion=conectarse();


 ?>