<?php
session_start();
session_regenerate_id();
$_SESSION['message'] = 'セッションに保存した値';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sample28</title>
</head>
<body>
  <a href="page02.php">２ページ目</a>
</body>
</html>