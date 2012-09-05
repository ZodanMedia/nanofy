<?php
/**
 * Nanofy (once known as the Zodan Doofpot)
 * Minifies uploaded files to the absolute minimum
 * Or does nothing, put negatively.
 * 
 * Crafted by Zodan in 2002. Kicked back to life in 2011.
 *
 * Accepts a file-upload post from any file, tries to find a filename,
 * else will make up something to return. Or spits an error message if no
 * post was made or an empty form is posted.
 * Returns a filename or an error message as json data.
 * 
 * Accepts "download" as a get variable, tries to find a filename,
 * else will make up something to return.
 * Returns a zip as a downloadable file.
 *
 * (c) copyright (pfff) 2002 Zodan [zodan.nl]
 *
 */
if($_POST) {
	if( $_POST && strlen($_POST['nanofy-upload'])>1 ) {
		$file = sanatize_filename($_POST['nanofy-upload']);
		$status = '1';
		$reply_message = '<p class="message">The file <strong>'.$file.'</strong> has been Nanofied succesfully!</p>';
		
	} elseif( $_FILES && strlen($_FILES['nanofy-upload']['name'])>1 ) {
		$file = sanatize_filename($_FILES['nanofy-upload']['name']);
		$status = '1';
		$reply_message = '<p class="message">The file <strong>'.$file.'</strong> has been Nanofied succesfully!</p>';
		
	} else {
		$file = '';
		$status = '0';
		$reply_message = '<p>There was nothing to nanofy!</p>';
	}
	$json = array(
		'nanofy'  => 'nanofy',
		'version' => '0.000000001',
		'file'    => $file,
		'status'  => $status,
		'message' => $reply_message		
	);
	// We'll be outputting as JSON
	header("Pragma: public");
	header('Server: Apache');
	header('X-Powered-By: Nanofy');
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false);
	header("Content-type: application/json");	
	ob_clean();
	flush();
	echo json_encode($json);
	
	
	
} elseif(isset($_GET['download'])) {
	if($_GET['file'] && (strlen($_GET['file'])>1) ) {
		$file = sanatize_filename($_GET['file']);
	} else {
		$file = date("YmdHms");
	}
	// We'll be outputting a ZIP
	header("Pragma: public");
	header('Server: Apache');
	header('X-Powered-By: Nanofy');
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false);
	header("Content-type: application/zip");	
	header('Content-Disposition: attachment; filename="'.$file.'.zip";');
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: 134");  
	ob_clean();
	flush();
	// File content is at its very minimum
	readfile(dirname(__FILE__).'/nanofied.zip');
	die(); 
} else {
	header("Pragma: public");
	header('Server: Apache');
	header('X-Powered-By: Nanofy');
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false);
	die('Hi. I am Nanofy. ("crunch, crunch.")');
}




/**
 * General functions
 */

function sanatize_filename($filename) {
	// Lower case
	$temp = strtolower($filename);
	// Replace spaces with a '_'
	$temp = str_replace(" ", "", $temp);
	// Loop through string
	$result = '';
	for ($i=0; $i<strlen($temp); $i++) {
		if (preg_match('([0-9]|[a-z]|_)', $temp[$i])) {
			$result = $result . $temp[$i];
		}
	}
	// Return filename
	return $result;
}
?> 