<?php

include("config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$myusername = mysqli_real_escape_string($db, $_POST['username']);
	$mypassword = mysqli_real_escape_string($db, $_POST['password']);

	$sql = "SELECT id FROM admin WHERE username = '$myusername' AND passcode ='$mypassword'";
	$result = mysqli_query($db, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$active = $row['active'];

	$count = mysqli_num_rows($result);

	if ($count == 1){
		session_register("myusername");
		$_SESSION['login_user'] = $myusername;
		header("location: welcome.php");
	}
	else{
		$error = "Your login name or password is invalid.";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>VPS Control Panel</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
	<div style="width: 100%; margin: 20px auto 20px auto; max-width: 420px;">

		<h3 class="display-4">Add Account</h3>

		<hr />

	<form>
		<div class="form-group row">
			<label for="inputHorizontalSuccess" class="col-sm-4 col-form-label">IP Address</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="ip">
			</div>
		</div>

		<div class="form-group row">
			<label for="inputHorizontalSuccess" class="col-sm-4 col-form-label">Password</label>
			<div class="col-sm-8">
				<input type="password" class="form-control" id="pw">
			</div>
		</div>

		<div class="form-group row">
			<label for="inputHorizontalSuccess" class="col-sm-4 col-form-label">API Key</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="key">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputHorizontalSuccess" class="col-sm-4 col-form-label">Hash</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="hash">
			</div>
		</div>

		<div class="form-group row">
			<label for="inputHorizontalSuccess" class="col-sm-4 col-form-label">Master URL</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="masterurl">
			</div>
		</div>

<div class="form-group row">
	<div class="col-sm-4"></div>
	<div class="col-sm-8">
		<button class="btn btn-secondary" type="submit">Add Account</button>
		<a href="linear.li" style="padding-left:10px;">Help!</a>
</div>
</div>
		</form>
</div>
</body>
</html>
