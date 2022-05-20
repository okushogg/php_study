<?php 
  date_default_timezone_set('Asia/Tokyo');
  $time = date('G');
?>

<?php if($time < 9): ?>
  <p>営業時間外でござる。</p>
<?php else: ?>
  <p>いらっしゃいませでござる。</p>
<?php endif; ?>