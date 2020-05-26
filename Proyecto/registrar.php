<?php
include 'cn.php';
//RECIBIR DATOS Y ALAMACENARLOS
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$numero= $_POST["numero"];
//CONSULTA PARA INGRESAR
$insertar ="INSERT INTO datos (nombre, email, numero) VALUES ('$nombre', '$email', '$numero')";

$verificar_usuario =mysqli_query($conexion,"SELECT * FROM datos WHERE email = '$email'");
if (mysqli_num_rows($verificar_usuario) > 0 )
{
    echo 'Ya hay un usuario registrado con ese correo.';
    
    exit;
}

//EJECUTAR CONSULTA
$resultado = mysqli_query($conexion, $insertar);

if (!$resultado)
{
    echo 'Error al registrarse';
    
} else {
    echo 'Usuario registrado existosamente';
}
//CERRAR CONEXION
mysqli_close($conexion);