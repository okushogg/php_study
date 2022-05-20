<?php
$fruits = [
  'tomato' => 'トマト',
  'grapes' => 'ぶどう',
  'banana' => 'バナナ',
  'melon' => 'メロン',
  'peach' => 'もも',
  'orange' => 'みかん',
  'strawberry' => 'いちご'
];

?>

<dl>
  <?php foreach ($fruits as $english => $japanese) : ?>
    <dt><?php echo $english; ?></dt>
    <dd><?php echo $japanese; ?></dd>
  <?php endforeach ?>
</dl>