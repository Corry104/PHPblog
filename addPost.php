<?php
    require('config/config.php');
    require('config/db.php');

    // Check for Submit
    if(isset($_POST['submit'])) {
        // Get Form Data
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $body = mysqli_real_escape_string($conn, $_POST['body']);
        $author = mysqli_real_escape_string($conn, $_POST['author']);

        $query = "INSERT INTO posts(title, body, author) VALUES('$title', '$body', '$author')";

        if(mysqli_query($conn, $query)) {
            header('Location: ' .ROOT_URL.'');
        } else {
            echo 'ERROR: '.mysqli_error($conn);
        }
    }

?>

<?php include('components/header.php'); ?>

    <div class='container'>
        <h2>Add Post</h2>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
            <div class='form-group'>
                <label for="">Title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class='form-group'>
                <label for="">Author</label>
                <input type="text" name="author" class="form-control">
            </div>

            <div class='form-group'>
                <label for="">Body</label>
                <textarea name="body" class="form-control"></textarea>
            </div>

            <input type="submit" name="submit" value="Submit" class="btn btn-primary">

        </form>
    </div>

<?php include('components/footer.php'); ?>