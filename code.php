<?php 
error_reporting(0);
require "dbcon.php";
if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, md5($_POST['password']));
    $cpassword = mysqli_real_escape_string($con, md5($_POST['cpassword']));
    
    if($password == $cpassword){
     $query = "SELECT * FROM users WHERE  email = '$email' AND password = '$password'  ";
     $query_run = mysqli_query($con, $query);

     if(mysqli_num_rows($query_run) > 0){
       echo "<script>alert('Email Already Exist.')</script>";
     }else{
            $query  = "INSERT INTO  users (username,email,password) VALUES('$username', '$email', '$password')";
            $query_run = mysqli_query($con, $query);
            if ($query_run) {
                header("Location: index.php");
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Something Went Wrong.')</script>";
            }

     }
    }else{
        echo "<script>alert('Password Not Matched.')</script>";
    }
  }
  

  session_start();
  if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, md5($_POST['password']));

    $query = "SELECT * FROM users WHERE  email = '$email' AND password = '$password'  ";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
       $row  = mysqli_fetch_row($query_run);
       $_SESSION['username'] = $row['username'];
        header("Location: home.php");
    } else {
        echo "<script>alert('Woops ! Email or Password is Wrong.')</script>";
    }
  }

?>