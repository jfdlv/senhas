<?php
include 'modelo.php';
if($_POST){ 
// Creamos la cadena aletoria 
// Fin de la creacion de la cadena aletoria 
$tamano = $_FILES [ 'file' ][ 'size' ]; // Leemos el tamaño del fichero 
$tamaño_max="5000000000"; // Tamaño maximo permitido 
if( $tamano < $tamaño_max){ // Comprovamos el tamaño  
$nombre=$_FILES [ 'file' ][ 'name' ];
$destino = 'imagenes' ; // Carpeta donde se guardata 
$sep=explode('image/',$_FILES["file"]["type"]); // Separamos image/ 
$tipo=$sep[1]; // Optenemos el tipo de imagen que es 
if($tipo == "png" || $tipo == "jpeg" || $tipo == "bmp"){ // Si el tipo de imagen a subir es el mismo de los permitidos, segimos. Puedes agregar mas tipos de imagen 
move_uploaded_file ( $_FILES [ 'file' ][ 'tmp_name' ], $destino . '/' .$nombre);  // Subimos el archivo 
$sen = new senha(null,$destino . '/' .$nombre,$_POST['ids'],null);
$sen->insertImageni();
header("Location:subirimagenv.html"); // Incluimos la plantilla 
} 
else echo "el tipo de archivo no es de los permitidos";// Si no es el tipo permitido lo desimos 
} 
else echo "El archivo supera el peso permitido.";// Si supera el tamaño de permitido lo desimos 
} 
else
{
	echo "NO";
}
?>