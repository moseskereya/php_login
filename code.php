<?php 
if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, md5($_POST['password']));
    $cpassword = mysqli_real_escape_string($con, md5($_POST['cpassword']));
    
    if($password == $cpassword){
     $query  = "INSERT INTO  students (username,email,password) VALUES('$username', '$email', '$password')";
     $query_run = mysqli_query($con, $query);
     if($query_run){
         echo "User registration is complited.";
     }else{
         echo "<script>alert('Something Went Wrong.')</script>";
      }

    }else{
        echo "<script>alert('Password Not Matched.')</script>";
    }
  }
?>