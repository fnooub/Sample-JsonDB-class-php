<?php

upload_dropbox('data.json', 'overwrite', 'wkDt6TmyCgAAAAAAAAAB5jS154KXzvzYWziJMkwlE9dxylnyHvaTMwThO6A9-rdq', true);

/*
 * $path đường dẫn dropbox
 * $mode add|overwrite (thêm|ghi đè)
 * $token api dropbox
 */
function upload_dropbox($path, $mode = 'add', $token, $show = false) {
	$fp = fopen($path, 'rb');
	$size = filesize($path);
	$cheaders = array('Authorization: Bearer ' . $token, 'Content-Type: application/octet-stream', 'Dropbox-API-Arg: {"path":"/' . $path . '", "mode":"' . $mode . '"}');
	$ch = curl_init('https://content.dropboxapi.com/2/files/upload');
	curl_setopt($ch, CURLOPT_HTTPHEADER, $cheaders);
	curl_setopt($ch, CURLOPT_PUT, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($ch, CURLOPT_INFILE, $fp);
	curl_setopt($ch, CURLOPT_INFILESIZE, $size);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	if ($show) {
		echo $response;
	}
	curl_close($ch);
	fclose($fp);
}