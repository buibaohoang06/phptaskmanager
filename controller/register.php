<?php 

require('db.php'); 
$current_page = "/register";
if (isset($_SESSION['username'])){
    header("Location: /dashboard");
}

if (isset($_POST['submit'])) {
    try {
        function guidv4($data = null) {
            // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
            $data = $data ?? random_bytes(16);
            assert(strlen($data) == 16);
        
            // Set version to 0100
            $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
            // Set bits 6-7 to 10
            $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
        
            // Output the 36 character UUID.
            return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
        }
        $username = mysqli_real_escape_string($con, stripslashes($_REQUEST['username']));
        $password = mysqli_real_escape_string($con, stripslashes($_REQUEST['password']));
        $uuid = guidv4();
        if ($username != null && $password != null) {
            $query = "INSERT INTO `users` (username, password, creation_date, user_id)
                      VALUES ('$username', '" . hash("sha256", $password) . "', '" . date("Y-m-d H:i:s") . "', '$uuid')";
            $result = mysqli_query($con, $query);
        }
    
        if ($result){
            echo "<div>Success! Go to <a href=\"login.php\">Login</a> to continue</div>";
        } else {
            echo "<div><a href=\"register.php\">Click here to retry</a></div>";
        }
    } catch(Exception $e){
        $error = $e->getMessage();
        echo "<script>console.log('$error')</script>";
    }
}

require 'views/register.view.php';
?>
