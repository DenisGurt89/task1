<?php
include('controller.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta http-equiv="content-style-type" content="text/css">
	<title>Update</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css">
	<link rel="stylesheet" href="bootstrap/css/style.css">
	<script src="bootstrap/js/jquery-1.10.2.min.js"></script>
</head>
<body>
<div class="wrapper">
	<div class="container">
		<div class="content">
			<legend>
				<p>Update</p>
			</legend>
			<form action="index.php" method="post" class="form-horizontal">
				<div class="control-group">
					<label class="control-label" for="firstname">First name</label>
					<div class="controls">
						<input type="text" name="firstname"
						placeholder=""
						value="<?php echo $row['firstname']; ?>" maxlength="50" required
						data-validation-regex-regex="^[a-zA-Zа-яА-Я]+$"
						data-validation-regex-message="Имя должно содержать только буквы"
						data-validation-required-message="Обязательно для заполнения" >
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="secondname">Second name</label>
					<div class="controls">
						<input type="text" name="secondname"
						placeholder=""
						value="<?php echo $row['secondname']; ?>" maxlength="50" required
						data-validation-regex-regex="^[a-zA-Zа-яА-Я]+$"
						data-validation-regex-message="Фамилия должна содержать только буквы"
						data-validation-required-message="Обязательно для заполнения" >
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="email">Email</label>
					<div class="controls">
						<input type="text" name="email"
						placeholder=""
						value="<?php echo $row['email']; ?>" maxlength="50" required
						data-validation-validemail-message="Неправильный формат e-mail"
						data-validation-required-message="Обязательно для заполнения" >
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
						<input type="submit" name="updaterecord" value="Save" class="btn btn-success btn-large">
					</div>
				</div>
			</form>
		</div>
	</div>

	<script type="text/javascript" src="bootstrap/js/jqBootstrapValidation.js"></script>
	<script type="text/javascript" src="bootstrap/js/script.js"></script>

	<footer class="navbar navbar-fixed-bottom">
		<span>2015 Denis Gurtovenko</span>
	</footer>
</div>
</body>
</html>