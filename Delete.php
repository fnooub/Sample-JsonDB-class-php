<?php

include 'JsonDB.class.php';

$db = new JsonTable('data.json', true);

//$db->deleteAll();

$time = $_GET['time'];

$db->delete('time', $time);

header('Location: Read.php');