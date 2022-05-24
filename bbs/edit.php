<?php
session_start();
require('library.php');
$id = $_SESSION['id'];
$name = $_SESSION['name'];
// ログイン情報がないとログインページへ移る
if (isset($_SESSION['id']) && isset($_SESSION['name'])) {
  $member_id = $_SESSION['id'];
  $name = $_SESSION['name'];
} else {
  header('Location: login.php');
  exit();
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!$id) {
  header('Location: index.php');
  exit();
}

$db = dbconnect();

// メッセージの編集
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
  $stmt = $db->prepare('update posts set message=? where id=?');
  if (!$stmt) {
      die($db->error);
  }

  $stmt->bind_param('si', $message, $id);
  $success = $stmt->execute();
  if (!$success) {
      die($db->error);
  }

  header('location: index.php');
  exit();
}
var_dump($member_id);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ひとこと編集</title>

  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div id="wrap">
    <div id="head">
      <h1>ひとこと掲示板</h1>
    </div>
    <div id="content">
      <p>&laquo;<a href="index.php">一覧にもどる</a></p>
      <?php
      $stmt = $db->prepare('select p.id, p.member_id, p.message, p.created, m.name, m.picture from posts p, members m where p.id=? and m.id=p.member_id order by p.id desc');
      if (!$stmt) {
        die($db->error);
      }
      $stmt->bind_param('i', $id);

      $success = $stmt->execute();
      if (!$success) {
        die($db->error);
      }
      $stmt->bind_result($id, $member_id, $message, $created, $name, $picture);
      if ($stmt->fetch()) :
      ?>

        <form action="" method="post" >
          <dl>
            <dt><?php echo h($name); ?>さん、メッセージを編集してください。</dt>
            <dd>
              <textarea name="message" cols="50" rows="5"><?php echo $message; ?></textarea>
            </dd>
          </dl>
          <div>
            <p>
              <input type="submit" value="編集する" />
            </p>
          </div>
        </form>

      <?php else : ?>
        <p>その投稿は削除されたか、URLが間違えています</p>
      <?php endif; ?>
    </div>
  </div>
</body>

</html>