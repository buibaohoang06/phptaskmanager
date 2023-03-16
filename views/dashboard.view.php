<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Dashboard</title>
</head>
<body>
    <?php include 'components/navbar.php'?>
    <div class="container text-center p-5">
        <h1>Welcome back, <?php echo $content['username']?></h1>
        <p>Your password hash: <?php echo $content['password']?></p>
        <p>Your user id: <?php echo $content['user_id']?></p>
        <form action="/dashboard" method="POST">
            <div class="mb-3">
                <input type="text" name="post_title" class="form-control" placeholder="Post Title" required/>
            </div>
            <div class="mb-3">
                <textarea name="post_content" class="form-control" placeholder="Post Content" required></textarea>
            </div>
            <input type="submit" name="submit" class="btn btn-primary">
        </form>
    </div>
</body>
</html>