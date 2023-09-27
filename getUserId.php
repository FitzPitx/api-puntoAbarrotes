<?php
require('connection.php');

// Supongamos que recibes el ID del usuario autenticado desde la aplicación Android
$user_id = $_POST['user_id'];

// Ejecuta la consulta SQL para obtener el ID del usuario autenticado
$result = mysqli_query($con, "SELECT * FROM userapi WHERE user_id = '$user_id'");

// Verifica si la consulta fue exitosa
if ($result) {
    // Comprueba si se encontró el usuario
    if (mysqli_num_rows($result) > 0) {
        // El usuario se encontró en la base de datos
        $user = mysqli_fetch_assoc($result);
        $response = array('user_id' => $user['user_id']);
        echo json_encode($response);
    } else {
        // El usuario no se encontró en la base de datos
        $response = array('error' => 'Usuario no encontrado');
        echo json_encode($response);
    }
} else {
    // En caso de error en la consulta
    $response = array('error' => 'Error al obtener el usuario');
    echo json_encode($response);
}
?>
