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

if (!empty($sql->fetchAll())) {
    $sql->execute([$id]);
    foreach ($sql as $row) {
        if (!isset($_GET['name'])) {
            $name = $row['name'];
        }
        if (!isset($_GET['age'])) {
            $age = $row['age'];
        }
    }

    $sql = $pdo->prepare('update user_information set name=?, age=? where user_id=?');
    if ($sql->execute([$name, $age, $id])) {
        echo 'name:', "$name", "\n";
        echo 'age:', "$age", "\n";
    }
} else {
    echo '対象のレコードが見つかりません';
}
