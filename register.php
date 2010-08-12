<?php
require_once('./lib/registration_functions.php');
	initDataBaseConnection();

	
	if ($_POST['Username']=='' || alpha_numeric($_POST['Username'])==FALSE)
	{
		$errors[] = 'Der Benutzername darf nur aus Zahlen und Buchstaben bestehen.';
	}
	

	if (userNameExists($_POST['Username']))
	{
		$errors[] = 'Der gew&uuml;nschte Benutzername ist leider schon registriert. W&auml;hle bitte einen anderen namen aus.';
	}	

	if ($_POST['Password']=='' || alpha_numeric($_POST['Password'])==FALSE)
	{
		$errors[] = 'Das Passwort darf nur aus Zahlen und Buchstaben bestehen.';
	}

	if ($_POST['Password']!=$_POST['re_Password'])
	{
		$errors[] = 'Die beiden Passw&ouml;rter stimmen nicht überein.';
	}

	if(is_array($errors))
	{
		echo '<p class="error"><b>Der folgende Fehler ist aufgetreten:</b></p>';
		while (list($key,$value) = each($errors))
		{

			echo '<span class="error">'.$value.'</span><br />';
		}
	}
	else {
		//add the user to the DB
		addUser($_POST['Username'],$_POST['Password']);
		echo '<p><b>Erfolg!</b></p>';
		echo '<span>Du wurdest erfolgreich registriert. du kannst dich jetzt mit deinen eingegebenen Daten einloggen.
		<br>Klick <a href="index.php">Hier</a> um zum Login zu gelangen.</span>';
	}

?>