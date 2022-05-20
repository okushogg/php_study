<?php
$success =file_put_contents('data/news.txt',
'新しくファイルを作ります。');

if ($success !== false) {
  echo 'A new file is created.';
} else {
  echo 'Failed to create a new file.';
}