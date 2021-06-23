<?php

$id = $_GET['id'];

$pdo = new PDO('mysql:host=localhost;dbname=User_data;charset=utf8', 'staff', 'password');
$sql = $pdo->prepare('select * from user_information where user_id=?');
$sql->execute([$id]);

if (!empty($sql->fetchAll())) {
    $sql->execute([$id]);
    foreach ($sql as $row) {
        $name = $row['name'];
        $age = $row['age'];
    }

    echo 'name:', $name, "\n";
    echo 'age:', $age, "\n";

    header('Access-Control-Allow-Origin: *');
    $data = array(
        'name' => $name,
        'age' => $age
    );
    echo json_encode($data);
} else {
    echo '対象のレコードが見つかりません';

    header('Access-Control-Allow-Origin: *');
    $data = array(
        'message' => '対象のレコードが見つかりません'
    );
    echo json_encode($data);
}
