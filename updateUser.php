<?php
    require 'connection.php';
    $user_id = $_POST['user_id'];
    $user_nombre = $_POST['user_nombre'];
    $user_apellido = $_POST['user_apellido'];
    $user_usuario = $_POST['user_usuario'];
    $user_mail = $_POST['user_mail'];


    $update_query = "UPDATE userapi SET user_nombre = '$user_nombre', user_apellido = '$user_apellido', user_usuario = '$user_usuario', user_mail = '$user_mail' WHERE user_id = '$user_id'";
    $result = mysqli_query($con, $update_query);

    if ($result > 0) {

        $fetchUser = mysqli_query($con, "SELECT user_id, user_nombre, user_apellido, user_usuario, user_mail FROM userapi WHERE user_mail = '$user_mail'");

        if (mysqli_num_rows($fetchUser) > 0) {
            while ($row = $fetchUser->fetch_assoc()){
                $response['user'] = $row; 
                $response['error'] = "200";
                $response['message'] = "Usuario actualizado";
            }
            
        } else {
            $response['user'] = (object)[];
            $response['error'] = "400";
            $response['message'] = "Usuario no actualizado";
        }
        
    } else {
        $response['user'] = (object)[];
        $response['error'] = "400";
        $response['message'] = "Usuario no actualizado";
        
    }

    echo json_encode($response, true);