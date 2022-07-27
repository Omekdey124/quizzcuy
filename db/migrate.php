<?php

require("db.php");

$db->query("CREATE DATABASE IF NOT EXISTS quizcuy");
$db->query("USE quizcuy");
$db->query("CREATE TABLE position (
    id int not null primary key auto_increment,
    nama_posisi varchar(80) not null
)");

$db->query("CREATE TABLE user(
    id int not null primary key auto_increment,
    nama varchar(80) not null,
    password varchar(80) not null,
    email varchar(80) not null,
    fk_position_id int not null,    

    FOREIGN KEY (fk_position_id) REFERENCES position (id) 
)");

echo "berhail menambah table ";