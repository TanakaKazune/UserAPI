<?php

$name = $_GET['name'];
$age = $_GET['age'];

$pdo = new PDO('mysql:host=localhost;dbname=User_data;charset=utf8', 'staff', 'password');
//ユーザーの登録
$sql = $pdo->prepare('insert into user_information values (null, ?, ?)');
$sql->execute([$name, $age]);

foreach ($pdo->query('select last_insert_id()') as $row) {
    $id = $row[0];
}

echo 'user_id:', $id;

//jsonファイルでの出力
header('Access-Control-Allow-Origin: *');
$data = array(
    'id' => $id,
);
echo json_encode($data, JSON_UNESCAPED_UNICODE);
