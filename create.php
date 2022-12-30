<?php require_once 'config/bootstrap.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

  $title = $_POST['title'];
  $body = $_POST['body'];

  $res = Post::createPost($title, $body);

  if ($res == 1) {
    header('Location: index.php');
    exit;
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <div class="container mt-3">
    <div class="row">
      <div class="col-8 mx-auto">
        <h2>Create post</h2>
        <p>Use the .form-control class to style textareas as well:</p>
        <form action="" method="POST">
          <div class="mt-3">
            <label for="text"><b>Sarlavha</b></label>
            <input type="text" class="form-control" id="text" placeholder="Enter name" name="title">
          </div>
          <div class="mb-3 mt-3">
            <label for="comment"><b>Comments:</b></label>
            <textarea class="form-control" rows="5" id="comment" name="body" placeholder="Enter text"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>

</body>

</html>