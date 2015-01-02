<?php
$data = array();
for ($i = 0; $i < 20; $i++) {
  $num = mt_rand(1, 8);
  $data[$i] = (object) array(
    'title' => 'Title of image ' . $i,
    'src' => "img/img-{$num}.jpg",
    'width' => '320',
    'height' => '240',
    'link' => 'http://google.com',
  );
  if ($num >= 5) {
    unset($data[$i]->link);
  }
}
header('Content-Type: application/json');
echo json_encode($data);
