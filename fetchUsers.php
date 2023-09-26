<?php

    require 'connection.php';

    $user_status = $_POST['user_status'];

    $users = "SELECT user_usuario, user_mail FROM userapi WHERE user_status = 1";
    $result = mysqli_query($con, $users);

    if (mysqli_num_rows($result) > 0){
        while ($row = $result->fetch_assoc()) {
            $response['Usuarios'] = $row;
        }
    } else {
        $response['error'] = "001";
        $response['message'] = "No hay usuarios registrados";
    }

    echo json_encode($response);