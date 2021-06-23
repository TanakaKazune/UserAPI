<?php

$method = $_REQUEST['method'];

//それぞれのパラメーターに値が存在する時に配列に代入
$query = [];
if (isset($_REQUEST['id'])) {
    $query['id'] = $_REQUEST['id'];
}
if (isset($_REQUEST['name'])) {
    $query['name'] = $_REQUEST['name'];
}
if (isset($_REQUEST['age'])) {
    $query['age'] = $_REQUEST['age'];
}

$query = http_build_query($query);

$opts = array(
    'http' =>
    array(
        'method'  => $method,
        'content' => '?id=2'
    )
);
$context = stream_context_create($opts);

$data = json_decode(file_get_contents('../User.php', false, $context));

var_dump($data);
var_dump($method);
