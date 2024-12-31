<?php
session_start();
include 'connect.php';
if (isset($_POST['signUp'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    //email exist or not

    $check_email_query = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_query_run =mysqli_query($con, $check_email_query );

    if(mysqli_num_rows($check_email_query_run)> 0){
        $_SESSION['status']= "Email is already exists";
        header("Location: mainlogin.php");
}
else{
    $query = "INSERT INTO users (first_name,last_name,email,password) VALUES ('$firstname','$lastname','$email','$password')";
    $query_run = mysqli_query(  $con, $query );

    if($query_run) {
        $_SESSION['status']="Registraton Successful.!";
        header("location: mainlogin.php");
    }
    else{
        $_SESSION['status']= 'Registration Failed';
        header('Location: mainlogin.php');
    }

}
}
?>