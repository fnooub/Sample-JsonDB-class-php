<?php

include 'JsonDB.class.php';

$time = $_GET['time'];

$db = new JsonTable('data.json', true);

if (isset($_POST['submit'])) {
	$newTime = time();
	$db->update('time', $time, array('time' => $newTime, 'name' => $_POST['name'], 'age' => $_POST['age']));
	header('Location: Update.php?time=' . $newTime);
}

$result = $db->select('time', $time);

?>
<form method="post">
	<input type="text" name="name" value="<?php echo $result[0]['name']; ?>">
	<input type="text" name="age" value="<?php echo $result[0]['age']; ?>">
	<input type="submit" name="submit" value="Edit">
</form>