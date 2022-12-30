<?php require_once 'config/bootstrap.php';

$posts = Post::getAll();

if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST["DELETE"])) {

  $post_id = $_POST['post_id'];

  $res = Post::getPostDelete($post_id);

  header('Location: index.php');
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>OOP Blog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <nav class="navbar p-2 navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="javascript:void(0)">OOP</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="create.php">CREATE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)">EDIT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:void(0)">Link</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="text" placeholder="Search">
          <button class="btn btn-primary" type="button">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <div class="container-fluid p-4 bg-primary text-white text-center">
    <h1>OOP Blog-post</h1>
    <p>Resize this responsive page to see the effect!</p>
  </div>

  <div class="container mt-5">
    <div class="row">
      <?php foreach ($posts as $post) : ?>
        <div class="col-sm-4 my-2 border p-3 rounded">
          <a class="" href="post.php?id=<?= $post->id ?>">
            <h3><?= $post->id . '-' .  $post->title ?></h3>
          </a>
          <p><?= $post->body ?></p>
          <p><?= $post->created_at ?></p>
          <form action="" method="POST" onsubmit="return confirm('Rostdan xam o\'chirmoqchimisiz?')">
            <a href="./edit.php?id=<?= $post->id ?>" class="btn btn-primary">EDIT</a>
            <input type="hidden" name="post_id" value="<?= $post->id ?>">
            <input type="hidden" name="DELETE">
            <button type="submit" class="btn btn-danger">DELETE</button>
          </form>
        </div>
      <?php endforeach; ?>
      <!-- Footer -->
      <footer class="container pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            <img class="mb-2" src="https://cdn4.vectorstock.com/i/thumb-large/30/58/modern-blog-logo-flat-style-vector-25913058.jpg" alt="" width="35" height="25">
            <small class="d-block mb-3 text-muted">&copy; 2017–2022</small>
          </div>
          <div class="col-6 col-md">
            <h5>Features</h5>
            <ul class="list-unstyled text-small">
              <li class="mb-1"><a class="link-secondary text-decoration-none" href="/">Bosh sahifa</a></li>
              <li class="mb-1"><a class="link-secondary text-decoration-none" href="/about.php">Biz haqimizda</a></li>
              <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Team feature</a></li>
              <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Stuff for developers</a></li>
              <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Another one</a></li>
              <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Last time</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>Resources</h5>
            <ul class="list-unstyled text-small">
              <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Resource</a></li>
              <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Resource name</a></li>
              <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Another resource</a></li>
              <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Final resource</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>About</h5>
            <ul class="list-unstyled text-small">
              <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Team</a></li>
              <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Locations</a></li>
              <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Privacy</a></li>
              <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Terms</a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>

</body>

</html>