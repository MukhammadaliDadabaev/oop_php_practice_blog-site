<?php

class Post
{
  public static $pdo;

  public $id;
  public $title;
  public $body;
  public $created_at;

  public static function getAll()
  {
    $stmt = self::$pdo->prepare("SELECT * FROM posts");
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post');
    $stmt->execute();
    $posts = $stmt->fetchAll();

    return $posts;
  }

  public static function getPostById($id)
  {
    $stmt = self::$pdo->prepare("SELECT * FROM posts WHERE id = ?");
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post');
    $stmt->execute([$id]);
    $post = $stmt->fetch();

    return $post;
  }

  public static function createPost($title, $body)
  {
    $stmt = self::$pdo->prepare("INSERT INTO posts (title, body) VALUES (:title, :body)");
    $stmt->execute([
      'title' => $title,
      'body' => $body
    ]);
    $row = $stmt->rowCount();

    return $row;
  }

  public static function editPost($id, $title, $body)
  {
    $stmt = self::$pdo->prepare("UPDATE posts SET title=:title, body=:body WHERE id=:id");
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post');
    $stmt->execute([
      'id' => $id,
      'title' => $title,
      'body' => $body
    ]);

    $post = $stmt->fetch();
    return $post;
  }

  public static function getPostDelete($id)
  {
    $stmt = self::$pdo->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post');
    $stmt->execute([$id]);
    $post = $stmt->fetch();

    return $post;
  }
}
