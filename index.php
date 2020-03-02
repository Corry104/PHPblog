<?php
    require('config/config.php');
    require('config/db.php');

    // Create Query
    $query = 'SELECT * FROM posts ORDER BY created_at';

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

<?php include('components/header.php'); ?>

    <div class='container'>
        <h2>Posts</h2>
        <?php foreach($posts as $post) : ?>
            <div class = 'well'>
                <h4><?php echo $post['title'];  ?></h4>
                <small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['author'];?></small>
                <p><?php echo $post['body']; ?></p>
                <a class = "btn btn-defaulth" href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['id']; ?>">Read More</a>
            </div>
        <?php endforeach; ?>
    </div>
<?php include('components/footer.php'); ?>
