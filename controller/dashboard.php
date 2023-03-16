<?php 
require('db.php');
include 'session.php';
$current_page = "/dashboard";
$username = $_SESSION['username'];
$query = "SELECT * FROM `users` WHERE username='$username'";
$result = mysqli_query($con, $query);
$content = mysqli_fetch_assoc($result);

require 'views/dashboard.view.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])){
    $post_title = mysqli_real_escape_string($con, stripslashes($_POST['post_title']));
    $post_content = mysqli_real_escape_string($con, stripslashes($_POST['post_content']));
    $newTask = "INSERT INTO `posts` (post_title, post_content)
              VALUES ('$post_title', '$post_content')";
    $createTaskResult = mysqli_query($con, $newTask);
    if ($result) {
        echo "Posted!";
    } else {
        echo "Failed";
    }
}
?>