<html>
<head>
	<title>Login Form</title>
	@vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
	<center><br><br>
		<h1>LOGIN FORM</h1>
		<form method="POST" action="{{route('login')}}">
			@csrf
			<label for="username">Username: </label>
			<input type="text" id="username" name="username" required /><br><br><br>
			<label for="password">Passsword:</label>
			<input type="password" id="password" name="password" required/><br><br><br>
			<input type="submit" value="Login">
			
		</form><br>

		@if ($errors->any())
		<div style="color: red;">
		{{$errors->first()}}
		</div>
		@endif

	</center>

</body>
</html>