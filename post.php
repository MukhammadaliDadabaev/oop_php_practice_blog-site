<?php require_once 'config/bootstrap.php';

$post_id = $_GET['id'];
$post = Post::getPostById($post_id);

?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>POST <?= $post_id ?></title>
</head>

<body>

  <div class="container mt-3">
    <h2>Postlarni o'qish</h2>
    <div class="mt-4 p-5 bg-primary text-white rounded">
      <h3><?= $post->id . '-' .  $post->title ?></h3>
      <p><?= $post->body ?></p>
      <p><?= $post->created_at ?></p>
    </div>
    <br>
    <a class="btn btn-info" href="./index.php">HOME</a>
  </div>

</body>

</html>