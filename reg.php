	<?php
	require_once('database.php');
	$conn = mysqli_connect($servername, $username, $password,$db);
	
	function Salt () {
		$i;
		$salt ='';
		for ($i = 1; $i <= 2; $i++) {
			$rnd = (int)(rand(0,75) + 48);
			if (($rnd > 57) && ($rnd < 65)) {
				$rnd = 65;
			} elseif (($rnd > 90) && ($rnd < 97)) {
				$rnd = 97;
			}
			$salt .= chr($rnd);
		}
		
		return $salt;
	}
	
	$FirstName=$_POST['FirstName'];
	$mail=$_POST['mail'];
	$passwd=$_POST['passwd'];
	$login=$_POST['login'];
	
	$salt = Salt();
	$cryptPasswd = crypt($passwd, $salt);
	
	$sql = "INSERT INTO `person`( `FirstName`, `mail`, `passwd`, `login`) 
	VALUES ('$FirstName','$mail','$cryptPasswd','$login')";
	
	if (!mysqli_query($conn, $sql)) {
		$error = addslashes(mysqli_error($conn));
		echo "<script>alert('An Error occur: {$error}'); load_reg_form();</script>";
	}	else {
		
		$msg = "Имя пользователя – $FirstName\r\nЛогин – $login\r\nПароль - $passwd\r\n";
		
		mail($mail, "Регистрация прошла успешно", $msg);
		
		echo 	"<h3>Регистрация прошла успешно!</h3>
				<p><b>Имя пользователя</b> – $FirstName<br>
				<b>Логин</b> – $login<br>
				<b>Почтовый ящик</b> – $mail<br><br>
				<a href='./index.html'> Вернуться на сайт </a> </p>";
	}
	mysqli_close($conn);
?>		