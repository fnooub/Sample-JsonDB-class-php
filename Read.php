<?php

include 'JsonDB.class.php';

$db = new JsonTable('data.json', true);
$result = $db->selectAll();

foreach ($result as $key => $value) {
	echo '<p>Name: ' . $value['name'] . ' => Age: ' . $value['age'] . ' [<a href="Update.php?time=' . $value['time'] . '">Edit</a> | <a href="Delete.php?time=' . $value['time'] . '">Delete</a>]</p>';
}
