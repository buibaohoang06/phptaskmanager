<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Task Manager</title>
</head>
<body>
    <?php include 'components/navbar.php' ?>
    <div class="container p-5">
        <?php 
            $root = $_SERVER['DOCUMENT_ROOT'];
            $path = "$root/controller/db.php";
            require $path;
            $tasks = mysqli_query($con, "SELECT * FROM `posts`");
        ?>
        <div class="accordion container" id="accordion">
            <?php
                $taskArray = mysqli_fetch_all($tasks, MYSQLI_ASSOC);
                foreach ($taskArray as $task){
                    $taskName = $task['post_title'];
                    $taskContent = $task['post_content'];
                    $id = $task['id'];
                    echo "
                        <div class=\"accordion-item\">
                            <h2 class=\"accordion-header\" id=\"$taskName\">
                            <button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#$id\" aria-expanded=\"false\" aria-controls=$id\">
                                <b>Task #$id</b>: $taskName
                            </button>
                            </h2>
                            <div id=\"$id\" class=\"accordion-collapse collapse\" aria-labelledby=\"headingTwo\" data-bs-parent=\"#accordion\">
                                <div class=\"accordion-body\">
                                    $taskContent
                                </div>
                            </div>
                        </div>
                    ";
                }
            ?>
        </div>
    </div>
</body>
</html>