<?php

$id = $_GET['id'];

$pdo = new PDO('mysql:host=localhost;dbname=User_data;charset=utf8', 'staff', 'password');
$sql = $pdo->prepare('select * from user_information where user_id=?');
$sql->execute([$id]);

if (!empty($sql->fetchAll())) {
    $sql->execute([$id]);
    foreach ($sql as $row) {
        echo 'name:', $row['name'], "\n";
        echo 'age:', $row['age'], "\n";
    }
} else {
    echo '対象のレコードが見つかりません';
}
