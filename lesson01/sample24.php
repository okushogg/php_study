<?php
$zip ='1234567';
if(preg_match("/\A\d{3}[-]\d{4}\z/", $zip)){
  echo '郵便番号:〒'.$zip;
} else {
  echo '正しい書式ではありません。';
}
?>