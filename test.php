<?php 
    $pass = 118971963;
    $pass_two = md5($pass);
    $pass_three = sha1($pass_two);
    $pass_four = crypt($pass_three,$pass_three);
    echo $pass_four;
?>