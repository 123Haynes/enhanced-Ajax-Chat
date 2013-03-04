DROP TABLE IF EXISTS ajax_chat_online;
CREATE TABLE ajax_chat_online (
	userID INT(11) NOT NULL,
	userName VARCHAR(64) NOT NULL,
	userRole INT(1) NOT NULL,
	channel INT(11) NOT NULL,
	dateTime DATETIME NOT NULL,
	ip VARBINARY(16) NOT NULL
) DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS ajax_chat_messages;
CREATE TABLE ajax_chat_messages (
	id INT(11) NOT NULL AUTO_INCREMENT,
	userID INT(11) NOT NULL,
	userName VARCHAR(64) NOT NULL,
	userRole INT(1) NOT NULL,
	channel INT(11) NOT NULL,
	dateTime DATETIME NOT NULL,
	ip VARBINARY(16) NOT NULL,
	text TEXT,
	PRIMARY KEY (id)
) DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS ajax_chat_bans;
CREATE TABLE ajax_chat_bans (
	userID INT(11) NOT NULL,
	userName VARCHAR(64) NOT NULL,
	dateTime DATETIME NOT NULL,
	ip VARBINARY(16) NOT NULL
) DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS ajax_chat_invitations;
CREATE TABLE ajax_chat_invitations (
	userID INT(11) NOT NULL,
	channel INT(11) NOT NULL,
	dateTime DATETIME NOT NULL
) DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

DROP TABLE IF EXISTS ajax_chat_channels;
CREATE TABLE ajax_chat_channels (
	channel INT(11) NOT NULL,
	channelName VARCHAR(64),
	PRIMARY KEY (channel)
) DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO ajax_chat_channels values ( 0, 'Public' );

DROP TABLE IF EXISTS ajax_chat_channelAccess;
CREATE TABLE ajax_chat_channelAccess (
	channel INT(11) NOT NULL,
	userID INT(11) NOT NULL,
	PRIMARY KEY (channel, userID)
) DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO ajax_chat_channelAccess values ( 0, 0 );

DROP TABLE IF EXISTS ajax_chat_users;
CREATE TABLE ajax_chat_users (
	userID INT(11) NOT NULL,
	userName VARCHAR(64) NOT NULL,
	password VARCHAR(64) NOT NULL,
	userRole enum('AJAX_CHAT_GUEST','AJAX_CHAT_USER','AJAX_CHAT_MODERATOR','AJAX_CHAT_ADMIN','AJAX_CHAT_CHATBOT') COLLATE utf8_bin DEFAULT 'AJAX_CHAT_USER',
  PRIMARY KEY (`userID`)
) DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO ajax_chat_users values( 0, '', '', 'AJAX_CHAT_GUEST' );
