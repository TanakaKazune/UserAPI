<?php

$method = $_REQUEST['method'];

$query = [];
if (isset($_REQUEST['id'])) {
    $query['id'] = $_REQUEST['id'];
}else{
    unset($query['id']);
}

if (isset($_REQUEST['name'])) {
    $query['name'] = $_REQUEST['name'];
}else{
    unset($query['name']);
}

if (isset($_REQUEST['age'])) {
    $query['age'] = $_REQUEST['age'];
}else{
    unset($query['age']);
}

$query = http_build_query($query);

$opts = array('http' =>
    array(
        'method'  => $method,
        'content' => '?id=2'
    )
);
$context = stream_context_create($opts);

$data = json_decode(file_get_contents('../User.php', false, $context));

var_dump($data);
var_dump($method);