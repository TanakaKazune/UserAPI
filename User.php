<?php

$method = $_SERVER["REQUEST_METHOD"];

if($method == "POST"){
    require_once("command/POST.php");
}else
if($method == "GET") {
    require_once("command/GET.php");
}else
if($method == "PUT") {
    require_once("command/PUT.php");
}else
if($method == "DELETE") {
    require_once("command/DELETE.php");
}

?>