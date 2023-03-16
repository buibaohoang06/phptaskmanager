<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form method="POST" action="register.php">
        <h1>Register</h1>
        <input type="text" name="username" required/>
        <input type="password" name="password" required/>
        <input type="submit" name="submit"> 
        <a href="login.php">Login</a>
    </form>
    <?php echo parse_url($_SERVER['REQUEST_URI'])['path']?>
</body>
</html>