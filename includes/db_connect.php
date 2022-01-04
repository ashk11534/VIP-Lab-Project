<?php
    session_start();
    define('ADMIN_PATH', 'http://localhost/PHP_PROJECTS/final_VIP_lab_project/admin/');
    $servername = "localhost";
    $db_name = "flat_hiring_system";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password, $db_name);

    // if($conn->connect_error){
    //     echo "Failed";
    // }
    // else{
    //     echo "Successful";
    // }

?>