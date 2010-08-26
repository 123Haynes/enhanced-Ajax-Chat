<?php
function alpha_numeric($str)
{
	return ( ! preg_match("/^([-a-z0-9])+$/i", $str)) ? FALSE : TRUE;
}
function initConfig() {
	$config = null;
	if (!include('./lib/config.php')) {
		echo('<strong>Error:</strong> Could not find a config.php file in "'.AJAX_CHAT_PATH.'"lib/". Check to make sure the file exists.');
		die();
	}
return $config;;
}
function initDataBaseConnection() {
require_once ('./lib/class/AJAXChatMySQLiDataBase.php');
require_once ('./lib/class/AJAXChatMySQLDataBase.php');
require_once ('./lib/class/AJAXChatMySQLiQuery.php');
require_once ('./lib/class/AJAXChatMySQLQuery.php');
require_once ('./lib/class/AJAXChatDataBase.php');
	// Create a new database object:
	global $db;
	$config=initConfig();
	$db = new AJAXChatDataBase(
		$config['dbConnection']
	);
	// Use a new database connection if no existing is given:
	if(!$config['dbConnection']['link']) {
		// Connect to the database server:
		$db->connect($config['dbConnection']);
		if($db->error()) {
			echo $db->getError();
			die();
		}
		// Select the database:
		$db->select($config['dbConnection']['name']);
		if($db->error()) {
			echo $db->getError();
			die();
		}
	}
	// Unset the dbConnection array for safety purposes:
	unset($config['dbConnection']);			
}

function userNameExists($userName) {
	global $db;

	$sql= 'SELECT userName FROM ajax_chat_users WHERE userName="'.$userName.'"';
	$result = $db->sqlQuery($sql);
	if($result->error()) {
		echo $result->getError();
		die();
	}
	$userNameinDB = $result->fetch();
	return $userNameinDB['userName'];
}
function addUser($userName,$userPassword) {
	global $db;
		$id=getLastId()+1;
		$sql = 'INSERT INTO ajax_chat_users(
								userID,
								userName,
								password)
				VALUES (
					'.$id.',
					'.$db->makeSafe($userName).',
					'.$db->makeSafe(md5($userPassword)).'
				);';
	$result = $db->sqlQuery($sql);
	if($result->error()) {
		echo $result->getError();
		die();
	}
}

function getLastId()
{
	global $db;
	
	$sql = 'SELECT userID FROM ajax_chat_users ORDER BY userID DESC LIMIT 1';
	$result = $db->sqlQuery($sql);
	if($result->error()) {
		echo $result->getError();
		die();
	}
	$lastid = $result->fetch();
	return $lastid['userID'];
}
?>
