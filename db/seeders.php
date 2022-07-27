<?php

require_once("db.php");

$db->query("USE quizcuy");
$db->query("INSERT INTO position (nama_posisi) VALUES 
    ('admin'),('member')
");

$db->query("INSERT INTO user (nama,password,email,fk_position_id) VALUES
    ('dedy','dedy12','dedy@gmail.com',1),
    ('andi','andi','andi@gmail.com',2),
    ('jerry','jerry12','jerry@gmail.com',2)
");