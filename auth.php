<?php
	
	require_once('database.php');
	
	$conn = mysqli_connect($servername, $username, $password, $db);
	
	$query = "SELECT mail, login, passwd, FirstName 
		FROM person WHERE mail='".mysqli_real_escape_string($conn,$_POST['mail'])."' LIMIT 1";
	
	if ($result = mysqli_query($conn, $query)) {
		
		if (mysqli_num_rows($result) == 0) {		
				echo "<script> load_main_form(); if (confirm('Пользователь с таким почтовым адресом не существует. Зарегистрироваться?')) {
				load_reg_form(); } </script>";	
		}

    	while ($row = mysqli_fetch_assoc($result)) {
    		  		
			if($row["passwd"] === crypt($_POST["passwd"], substr($row["passwd"], 0, 2))) {
				echo 	"<p><b>Логин</b> – {$row["login"]}<br>
					<b>Имя пользователя</b> – {$row["FirstName"]}<br>
					<b>Почтовый ящик</b> – {$row["mail"]}<br><br>
					<a href='./index.html'> Вернуться на сайт </a></p>";
   		} else {
				echo "<script> load_main_form(); alert('Неверный пароль'); </script>";	 				
   		}
		}
	}
   
   mysqli_close($conn);
?>		
