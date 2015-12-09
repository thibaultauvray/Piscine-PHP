<?php
	session_start();
	if ($_SESSION['loggued_on_user'] != "")
	{
		if (isset($_POST['submit']))
		{
			if ($_POST['submit'] == "ENVOYER")
			{
				if (file_exists("../private/chat") == FALSE)
					{
						$array = array(array('time'=>time(), 'login'=>$_SESSION['loggued_on_user'], 'msg'=>$_POST['msg']));
						$seri = serialize($array);
						file_put_contents("../private/chat", $seri);
					}
				else
				{
					$fd = fopen("../private/chat", "c+");
					flock($fd, LOCK_EX | LOCK_SH);
					$array = file_get_contents("../private/chat");
					$test = unserialize($array);
					$test[] = array('time'=>time(), 'login'=>$_SESSION['loggued_on_user'], 'msg'=>$_POST['msg']);
					$te = serialize($test);
					file_put_contents("../private/chat", $te);
					flock($fd, LOCK_UN);


				}
			}
		}
?>
<html>
<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
<head></head>
<body>

	<form method="POST" action="">  
		<input type="text" name="msg" value ="" />
		<input type="submit" name="submit" value="ENVOYER">
	</form>

</body>
</html>

<?php
	}
?>