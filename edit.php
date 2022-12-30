<?php require_once 'config/bootstrap.php';

$id = $_GET['id'];

$post = Post::getPostById($id);

if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST["PUT"])) {

  $id = $_POST['post_id'];
  $title = $_POST['title'];
  $body = $_POST['body'];

  $post = Post::editPost($id, $title, $body);

  var_dump($post);
  header('Location: index.php');
  exit;
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
        <h2>Edit post</h2>
        <h4>ID: <?= $post->id ?></h4>
        <form action="" method="POST">
          <input type="hidden" name="PUT">
          <input type="hidden" name="post_id" value="<?= $post->id ?>">
          <div class="mt-3">
            <label for="text"><b>Sarlavha</b></label>
            <input type="text" class="form-control" id="text" placeholder="Enter name" name="title" value="<?= $post->title ?>">
          </div>
          <div class="mb-3 mt-3">
            <label for="comment"><b>Comments:</b></label>
            <textarea class="form-control" rows="5" id="comment" name="body" placeholder="Enter text"><?= $post->body ?></textarea>
          </div>
          <button type="submit" class="btn btn-primary">SAQLASH</button>
        </form>
      </div>
    </div>
  </div>

</body>

</html>