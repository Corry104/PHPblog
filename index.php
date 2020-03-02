<?php
    require('config/db.php');

    // Create Query
    $query = 'SELECT * FROM posts';

    // Get Result
    $result = mysqli_query($conn, $query);

    // Fetch Data
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // var_dump($posts);

    // Free Result
    mysqli_free_result($result);

    // Close Connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
    <title>My Blog</title>
</head>
<body>
    <div class='container'>
    <h1>Posts</h1>
    <?php foreach($posts as $post) : ?>
        <div class = 'well'>
            <h3><?php echo $post['title'];  ?></h3>
            <small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['author'];?></small>
            <p><?php echo $post['body']; ?></p>
            <a class = "btn btn-defaulth" href="post.php ? id = <?php echo $post['id']; ?>">Read More</a>
        </div>
    <?php endforeach; ?>
    </div>
</body>
</html>