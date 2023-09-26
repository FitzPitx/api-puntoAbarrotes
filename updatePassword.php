<?php
    require 'connection.php';
    $currentPassword = md5($_POST['currentPassword']);
    $newPassword = md5($_POST['newPassword']);
    $user_mail = $_POST['user_mail'];

    $checkUser = "SELECT * FROM userapi WHERE user_mail = '$user_mail' AND user_contra = '$currentPassword'";
    $result = mysqli_query($con, $checkUser);

    if ($result && mysqli_num_rows($result) > 0){
        $updatePass = mysqli_query($con, "UPDATE userapi SET user_contra = '$newPassword' WHERE user_mail = '$user_mail'");

        if ($updatePass && mysqli_affected_rows($con) > 0){
            $response['error'] = "200";
            $response['message'] = "Contraseña actualizada";
        } else {
            $response['error'] = "400";
            $response['message'] = "Contraseña no actualizada";
        }
    } else {
        $response['error'] = "400";
        $response['message'] = "Usuario no encontrado o contraseña incorrecta";
    }

    echo json_encode($response);
?>