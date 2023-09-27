<?php
    require('connection.php');

        $user_nombre=$_POST['user_nombre'];
        $user_apellido=$_POST['user_apellido'];
        $user_usuario=$_POST['user_usuario'];
        $user_contra=md5($_POST['user_contra']);
        $user_mail=$_POST['user_mail'];
        $user_status=$_POST['user_status'];
        
        $checkUser = "SELECT * FROM userapi WHERE user_mail = '$user_mail'";
        $checkQuery = mysqli_query($con, $checkUser);
        
        if (mysqli_num_rows($checkQuery) > 0){
            $response['error'] = "002";
            $response['message'] = "Usuario ya registrado";
        } else {
            $insertQuery = "INSERT INTO userapi (user_nombre, user_apellido, user_usuario, user_contra, user_mail, user_status) VALUES ('$user_nombre', '$user_apellido', '$user_usuario', '$user_contra', '$user_mail', '$user_status')";
            $result = mysqli_query($con, $insertQuery);
        
            if($result){
                $response['error'] = "000";
                $response['message'] = "Registro exitoso";

            } else {
                $response['error'] = "200";
                $response['message'] = "Registro fallido";
            }
        
        }

        echo json_encode($response);



?>