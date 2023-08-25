<?php
$config = [
    "host" => "localhost",
    "username" => "root",
    "password" => "",
    "database" => "spk_lahan_jagung",
];

$conn = new mysqli($config["host"], $config["username"], $config["password"], $config["database"]);
