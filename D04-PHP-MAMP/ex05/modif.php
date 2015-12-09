<?php
	if ($_POST["submit"] === "OK")
	{
		if ($_POST["newpw"] === "")
		{
			echo "ERROR";
		}
		else
		{
			$modify = FALSE;
			$pwd = hash('whirlpool', $_POST['newpw']);
			$oldpwd = hash("whirlpool", $_POST['oldpw']);
			$array = file_get_contents("../private/passwd");
			$test = unserialize($array);
			$i = 0;
			foreach ($test as $elem) 
			{
				if ($elem['login'] === $_POST['login'] && $oldpwd === $elem['passwd'])
				{
					$test[$i]['passwd'] = $pwd;
					$modify = TRUE;
				}
				$i++;	
			}
			if ($modify == TRUE)
			{
				$seri = serialize($test);
				file_put_contents("../private/passwd", $seri);
				echo "OK";
				header("Location: index.html");
			}
			else
				echo "ERROR";
		}
	}
?>