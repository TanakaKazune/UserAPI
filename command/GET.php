<?php

$id = $_GET['id'];

$pdo = new PDO('mysql:host=localhost;dbname=User_data;charset=utf8', 'staff', 'password');
$sql = $pdo->prepare('select * from user_information where user_id=?');
$sql->execute([$id]);

//指定されたユーザーが存在するかの確認
if (!empty($sql->fetchAll())) {
    $sql->execute([$id]);
    foreach ($sql as $row) {
        $name = $row['name'];
        $age = $row['age'];
    }

    echo 'name:', $name, "\n";
    echo 'age:', $age, "\n";

    //jsonファイルでの出力
    header('Access-Control-Allow-Origin: *');
    $data = array(
        'name' => $name,
        'age' => $age
    );
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
} else {
    echo '対象のレコードが見つかりません';

    //jsonファイルでの出力
    header('Access-Control-Allow-Origin: *');
    $data = array(
        'message' => '対象のレコードが見つかりません'
    );
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}
