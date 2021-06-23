<?php

if (isset($_GET['name'])) {
    $name = $_GET['name'];
}
if (isset($_GET['age'])) {
    $age = $_GET['age'];
}
$id = $_GET['id'];

$pdo = new PDO('mysql:host=localhost;dbname=User_data;charset=utf8', 'staff', 'password');
$sql = $pdo->prepare('select * from user_information where user_id=?');
$sql->execute([$id]);

//指定されたユーザーが存在するかの確認
if (!empty($sql->fetchAll())) {
    $sql->execute([$id]);
    foreach ($sql as $row) {
        //クエリによって渡されていないデータの補完
        if (!isset($_GET['name'])) {
            $name = $row['name'];
        }
        if (!isset($_GET['age'])) {
            $age = $row['age'];
        }
    }

    //ユーザー情報の更新
    $sql = $pdo->prepare('update user_information set name=?, age=? where user_id=?');
    if ($sql->execute([$name, $age, $id])) {
        echo 'name:', "$name", "\n";
        echo 'age:', "$age", "\n";

        //jsonファイルでの出力
        header('Access-Control-Allow-Origin: *');
        $data = array(
            'name' => $name,
            'age' => $age
        );
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
} else {
    echo '対象のレコードが見つかりません';

    //jsonファイルでの出力
    header('Access-Control-Allow-Origin: *');
    $data = array(
        'message' => '対象のレコードが見つかりません'
    );
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}
