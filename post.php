<?php
    require('config/config.php');
    require('config/db.php');

     // Check for Delete
     if(isset($_POST['delete'])) {
        // Delete Data
        $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

        $query ="DELETE FROM posts WHERE id = {$delete_id}";

        if(mysqli_query($conn, $query)) {
            header('Location: ' .ROOT_URL.'');
        } else {
            echo 'ERROR: '.mysqli_error($conn);
        }
    }

    // Get ID
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Create Query
    $query = 'SELECT * FROM posts WHERE id = '.$id;

    // Get Result
    $result = mysqli_query($conn, $query);

    // Fetch Data
    $post = mysqli_fetch_assoc($result);
    // var_dump($posts);

    // Free Result
    mysqli_free_result($result);

    // Close Connection
    mysqli_close($conn);

?>

<?php include('components/header.php'); ?>

    <div class='container'>
        <a href="<?php echo ROOT_URL; ?>" class = 'btn btn-default'>Back</a>
        <h2><?php echo $post['title'];  ?></h2>
        <small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['author'];?></small>
        <p><?php echo $post['body']; ?></p>
        <hr>
        <form class="pull-right" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
            <input type="submit" name="delete" value="Delete" class="btn btn-danger">
        </form>
        <a href="<?php echo ROOT_URL; ?>editPost.php?id=<?php echo $post['id']; ?>" class="btn btn-default">Edit</a>
    </div>

<?php include('components/footer.php'); ?>