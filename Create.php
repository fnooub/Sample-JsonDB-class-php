<?php

include 'JsonDB.class.php';

if (isset($_POST['submit'])) {
	$mang = array(
		'time' => time(),
		'name' => $_POST['name'],
		'age' => $_POST['age']
	);
	$db = new JsonTable('data.json', true);
	$db->insert($mang);
	echo "ok";
}

?>
<form method="post">
	<input type="text" name="name" placeholder="name">
	<input type="text" name="age" placeholder="age">
	<input type="submit" name="submit" value="Create">
</form>