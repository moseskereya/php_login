<?php 
    $con = mysqli_connect('localhost', 'root', '', 'login_register');
    if (!$con) {
        die("<script>alert('Connection Failed.')</script>");
    }
?>