<?php

require('connection.php');

$user_contra=md5($_POST['user_contra']);
$user_mail=$_POST['user_mail'];

$checkUser = "SELECT * FROM userapi WHERE user_mail = '$user_mail'";
$result = mysqli_query($con, $checkUser);

if(mysqli_num_rows($result) > 0){

    $checkUserQuery = "SELECT user_id, user_mail, user_usuario   FROM userapi WHERE user_mail = '$user_mail' AND user_contra = '$user_contra'";
    $resultant = mysqli_query($con, $checkUserQuery);

    if(mysqli_num_rows($resultant) > 0){

        while ($row = $resultant->fetch_assoc()) {
            $response['Usuarios'] = $row;
        }
        $response['error'] = "000";
        $response['message'] = "Login exitoso";
    } else {
        $response['error'] = "200";
        $response['message'] = "Credenciales incorrectas";
    }
} else {
    $response['Usuarios'] = (object)[];
    $response['error'] = "400";
    $response['message'] = "Usuario no registrado";
    
}

echo json_encode($response);