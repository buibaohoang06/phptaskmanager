<?php  

require('db.php');
session_start();
$current_page = "/login";
if (isset($_SESSION['username'])){
    header("Location: /dashboard");
    exit();
} else {
    if (isset($_POST['submit'])){
        try{
            $username = mysqli_real_escape_string($con, stripslashes($_REQUEST['username']));
            $password = mysqli_real_escape_string($con, stripslashes($_REQUEST['password']));
            $query = "SELECT * FROM `users` WHERE username='$username' AND password='" . hash("sha256", $password) . "'";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) == 0){
                echo "Wrong username or password!";
            } else{
                $_SESSION['username'] = $username;
                header("Location: dashboard.php");
            }
        } catch (Exception $e){
            $error = $e->getMessage();
            echo "<script>console.log('$error')</script>";
        }
    }
    require 'views/login.view.php';
}
?>