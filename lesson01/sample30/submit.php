<?php
$file = $_FILES['picture'];
if($file['type']==='image/jpeg'||
   $file['type']==='image/png'
){
  $path = 'images/'.$file['name'];
  $success = move_uploaded_file($file['tmp_name'], $path);
if($success){
  echo 'success';
} else {
  echo 'failed';
}
} else {
  echo 'Unacceptable file type.';
}
?>

