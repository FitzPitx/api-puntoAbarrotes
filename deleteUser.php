<?php 
    require 'connection.php';
    $user_id = $_REQUEST['user_id'];

    $deleteUser = "DELETE FROM userapi WHERE user_id = '$user_id'";
    $result = mysqli_query($con, $deleteUser);

    if ($result > 0) {
        $response['error'] = 200;
        $response['message'] = "Usuario eliminado";
    } else {
        $response['error'] = 400;
        $response['message'] = "Usuario no eliminado";
    }

    echo json_encode($response);
?>