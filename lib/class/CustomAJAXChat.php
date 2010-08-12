<?php
/*
 * @package AJAX_Chat
 * @author Sebastian Tschan
 * @copyright (c) Sebastian Tschan
 * @license GNU Affero General Public License
 * @link https://blueimp.net/ajax/
 */

class CustomAJAXChat extends AJAXChat {

	// Returns an associative array containing userName, userID and userRole
	// Returns null if login is invalid
	function getValidLoginUserData() {
		
		$customUsers = $this->getCustomUsers();
		
		if($this->getRequestVar('password')) {
			// Check if we have a valid registered user:

			$userName = $this->getRequestVar('userName');
			$userName = $this->convertEncoding($userName, $this->getConfig('contentEncoding'), $this->getConfig('sourceEncoding'));

			$password = $this->getRequestVar('password');
			$password = $this->convertEncoding($password, $this->getConfig('contentEncoding'), $this->getConfig('sourceEncoding'));

			foreach($customUsers as $key=>$value) {
				if(($value['userName'] == $userName) && ($value['password'] == md5($password))) {
					$userData = array();
					$userData['userID'] = $key;
					$userData['userName'] = $this->trimUserName($value['userName']);
					$userData['userRole'] = $value['userRole'];
					return $userData;
				}
			}
			
			return null;
		} else {
			// Guest users:
			return $this->getGuestUser();
		}
	}

	// Store the channels the current user has access to
	// Make sure channel names don't contain any whitespace
	function &getChannels() {
		if($this->_channels === null) {
			$this->_channels = array();
			
			$customUsers = $this->getCustomUsers();
			
			// Get the channels, the user has access to:
			if($this->getUserRole() == AJAX_CHAT_GUEST) {
				$validChannels = $customUsers[0]['channels'];
			} else {
				$validChannels = $customUsers[$this->getUserID()]['channels'];
			}
			
			// Add the valid channels to the channel list (the defaultChannelID is always valid):
			foreach($this->getAllChannels() as $key=>$value) {
				// Check if we have to limit the available channels:
				if($this->getConfig('limitChannelList') && !in_array($value, $this->getConfig('limitChannelList'))) {
					continue;
				}
				
				if(in_array($value, $validChannels) || $value == $this->getConfig('defaultChannelID')) {
					$this->_channels[$key] = $value;
				}
			}
		}
		return $this->_channels;
	}

	// Store all existing channels
	// Make sure channel names don't contain any whitespace
	function &getAllChannels() {
		if($this->_allChannels === null) {
			// Get all existing channels:
			$customChannels = $this->getCustomChannels();
			
			$defaultChannelFound = false;
			
			foreach($customChannels as $key=>$value) {
				$forumName = $this->trimChannelName($value);
				
				$this->_allChannels[$forumName] = $key;
				
				if($key == $this->getConfig('defaultChannelID')) {
					$defaultChannelFound = true;
				}
			}
			
			if(!$defaultChannelFound) {
				// Add the default channel as first array element to the channel list:
				$this->_allChannels = array_merge(
					array(
						$this->trimChannelName($this->getConfig('defaultChannelName'))=>$this->getConfig('defaultChannelID')
					),
					$this->_allChannels
				);
			}
		}
		return $this->_allChannels;
	}

	function &getCustomUsers() {
		if($this->_config['authMethod'] == 'database') {
			return $this->getCustomUsersDB();
		} else {
			return $this->getCustomUsersFile();
		}
	}


        function &getCustomUsersFile() {
		// List containing the registered chat users:
		$users = null;
		require(AJAX_CHAT_PATH.'lib/data/users.php');
		return $users;
	}


	function &getCustomUsersDB() {
		// List containing the registered chat users:
		$users = array();
		
		$sql = 'SELECT 
				userID,
				userName,
				password,
				userRole
			FROM
				'.$this->getDataBaseTable('users').';';
		
		// Create a new SQL query:
		$result = $this->db->sqlQuery($sql);

		// halt on error
		if($result->error()) {
			echo $result->getError();
			die();
		}

		while($row = $result->fetch()) {
			// convert the string role name to the constant value
			$row['userRole'] = constant( $row['userRole'] );

			// look up which channels this user has access to
			$row['channels'] = $this->getCustomChannelAccess($row['userID']);

			// add this user to the list
			$users[$row['userID']] = $row;

		}

		return $users;
	}
	
	// looks up what channels a userID has access to in the DB. this
	// function is not needed for file authentication, since the channel
	// access is already in the data structure from the file.
	function &getCustomChannelAccess($userID) {
		$access = array();

		$sql = 'SELECT
				channel
			FROM
				'.$this->getDataBaseTable('channelAccess').'
			WHERE
				userID = '.$this->db->makeSafe($userID).';';
		
		// Create a new SQL query:
		$result = $this->db->sqlQuery($sql);

		// halt on error
		if($result->error()) {
			echo $result->getError();
			die();
		}

		while($row = $result->fetch()) {
			array_push($access, $row['channel']);
		}

		return $access;
	}

	function &getCustomChannels() {
		if($this->_config['authMethod'] == 'database') {
			return $this->getCustomChannelsDB();
		} else {
			return $this->getCustomChannelsFile();
		}
	}

	function &getCustomChannelsFile() {
		// List containing the custom channels:
		$channels = null;
		require(AJAX_CHAT_PATH.'lib/data/channels.php');
		return $channels;
	}

	function &getCustomChannelsDB() {
		$channels = array();

		$sql = 'SELECT
				channel,
				channelName
			FROM
				'.$this->getDataBaseTable('channels').';';

		$result = $this->db->sqlQuery($sql);

		if($result->error()) {
			echo $result->getError();
			die();
		}

		while($row = $result->fetch()) {
			$channels[ $row['channel'] ] = $row['channelName'];
		}

		return $channels;
	}
}
?>
