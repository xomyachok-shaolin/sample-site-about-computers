	<style>  

	#reg_form {
		width: 90%;
		margin: 5px 15px;
		border-color: #293499;
		border-style: solid;
		border-width: 3px;
		margin-bottom: 20px;
	}
	
	#reg_form h3 {
		margin-top:5px;
		color: #293499;
		text-align: center;
		max-height: 5px;
	}

	#reg_form hr {
		color: #293499;
		margin: 0 3px;
	}
	
	#reg_form tr {
		right: 10px;	
	}

	#reg_form .in {
		width: 95%;
		font-size: 100%;
		border-color: #dde6ff;
		border-style: solid;
	}
	
	#btn {
		background-color: #dde6ff;
    	border-width:3px; 
    	border-color: #293499; 
    	width:120%; 
    	color: #293499; 
    	margin: 5px 0;
	}
	
	#lbl {
		color: #293499;	
	}

</style>

<form method="POST" id="reg_form" >
	<h3>Форма регистрации</h3><hr>
	<table style="table-layout: fixed; width: 100%;">
		<tr>
			<td id="lbl">Имя пользователя</td>
			<td><input class="in" name="FirstName" type="text" required maxlength="30" /></td>
		</tr>	
		<tr>
			<td id="lbl">Адрес электронной почты</td>
			<td><input class="in" name="mail" type="email"required maxlength="30"/></td>
		</tr>	
		<tr>
			<td id="lbl">Логин</td>
			<td><input class="in" name="login" type="text" required maxlength="30"/></td>
		</tr>	
		<tr>	
			<td id="lbl">Пароль</td>
			<td><input class="in" id="passwd" name="passwd" type="password" required  maxlength="30"/></td>
		</tr>	
		<tr>
			<td id="lbl">Подтверждение пароля</td>
			<td><input class="in" id="rePasswd" name="rePasswd" type="password" required maxlength="30"/></td>
		</tr>	
	</table>
	<hr>
	<div style="display:flex; justify-content:center; width:100%; text-align:center;">
		<div><input id="btn" type="reset" value="Очистить"/></div>
		<div style="margin-left: 40px"><input id="btn" type="submit" name="page" value = 'Принять'/></div>
	</div>	
</form>

<script >

	$(document).ready(function(){		
	
		$('#reg_form').submit(function(){
			
			var pass1 = $("#passwd").val();
    		var pass2 = $("#rePasswd").val();
    		console.log(pass1 + "   " + pass2);
    		if (pass1 != pass2) {
        		alert("Пароли не совпадают.");
        		return false;
    		}
		
			var values = $(this).serialize();
			
			$.ajax({
				type: "POST",
				url: "reg.php",
				data: values,
				success: function(html){
					$("#main").html(html);
				}
			});
			return false;
		});
	});
</script>