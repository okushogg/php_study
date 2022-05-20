<?php
$news = file_get_contents('data/news.txt');
echo $news;

//ファイルの追記
$news = "<br>追加内容です。";
$success = file_put_contents('data/news.txt', $news);

// readfile('data/news.txt')
?>