<?php
    //Connection database_connection;
    $server = 'localhost';
    $server_name = 'root';
    $password = '';
    $db_name = 'login_registration_system';
    $db = mysqli_connect($server,$server_name,$password,$db_name);
    if(!$db)
        die('Error:'. mysqli_connect_error());
    
    
?>