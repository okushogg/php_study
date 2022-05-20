<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sample03</title>
</head>
<body>
  <?php
    $db = new mysqli('localhost:8889', 'root', 'root', 'mydb');
    $message = "Message from insert form.";
    $ret = $records = $db->query('insert into memos (memo) values("PHPからのメモです。")');
    if ($ret):
      echo 'Insert data.';
    else:
      echo $db->error;
    endif;
  ?>
</body>
</html>