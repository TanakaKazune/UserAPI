<?php

$id = $_GET['id'];

$pdo = new PDO('mysql:host=localhost;dbname=User_data;charset=utf8', 'staff', 'password');
$sql = $pdo->prepare('select * from user_information where user_id=?');
$sql->execute([$id]);

if (!empty($sql->fetchAll())) {
    $sql = $pdo->prepare('delete from user_information where user_id=?');
    if ($sql->execute([$id])) {
        echo '対象のレコードを削除しました。';

        header('Access-Control-Allow-Origin: *');
        $data = array(
            'message' => '対象のレコードを削除しました。'
        );
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
} else {
    echo '対象のレコードが見つかりません';

    header('Access-Control-Allow-Origin: *');
    $data = array(
        'message' => '対象のレコードが見つかりません'
    );
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}
