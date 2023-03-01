<?php

	session_start();
	if (isset($_SESSION['session_id']))
		session_unset($_SESSION['session_id']);
	if (isset($_SESSION['logged']))
		session_unset($_SESSION['logged']);
	if (isset($_SESSION['login']))
		session_unset($_SESSION['login']);
	if (isset($_SESSION['pwd']))
		session_unset($_SESSION['pwd']);
	session_destroy();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>لوحة التحكم</title>
	<META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php">
</head>
<body>
</body>
</html>







