<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">

	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script type="text/javascript">
	
	$(document).ready(function(){ 

		$("#result").hide();

		$("#submit").on("click",function(e){
			var email = $("#email").val();
            var name = $("#name").val();
            var id_rol = $("#id_rol").val();
			var password = $("#password").val();

	        e.preventDefault();
			$.get("http://h2744356.stratoserver.net/solfamidas/alumniCEV/public/index.php/users/login.json", 
				{'email': email,
				 'password': password}, 
				function(response){

					if(response.code == "200"){
						sessionStorage.setItem('token', response.data.token);
            			window.location.href = "welcome.html";
					}else{
						$("#result").show();
						$("#result").html(response.message);
					}
        		}
        	);
		});
	});
	</script>

</head>
<body>

	<div class="main container">

		<h1>Login</h1>

		<h4>Solo usuarios administradores</h4>

		<hr>

		<form>
			<div class="form-group">
				<input type="text" placeholder="email" name="email" id="email">
				<input type="password" placeholder="password" name="password" id="password">
				<input type="submit" class="btn btn-primary" name="submit" value="Entrar" id="submit">
			</div>
		</form>
        
		<p id="result" class="alert alert-danger" style="display:none"></p>

	</div>

</body>
</html>