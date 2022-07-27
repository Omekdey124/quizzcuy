<?php

require('db.php');

$db->query("DROP DATABASE quizcuy");
$db->query("CREATE DATABASE quizcuy");

echo "berhail hapus semua table";