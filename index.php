<?php
include('controller.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta http-equiv="content-style-type" content="text/css">
	<title>Webinse</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css">
	<link rel="stylesheet" href="bootstrap/css/style.css">
</head>
<body>
<div class="wrapper">
<div class="container">
    <div class="content">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>First name</th>
					<th>Second name</th>
					<th>E-mail</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($users == 0):?>
				<tr>
					<td colspan="3"><strong>The table is empty!</strong></td>
				</tr>
				<?php else: ?>
				<?php foreach ($users as $user): ?>
				<tr>
					<td><?php echo $user['firstname']; ?></td>
					<td><?php echo $user['secondname']; ?></td>
					<td><?php echo $user['email']; ?></td>
					<td>
						<a href="update.php?id=<?php echo $user['id']; ?>" class="btn">Edit</a>
					</td>
					<td>
						<form action="?deleteuser" method="post">
						<input type="hidden" name="id" value="<?php echo $user['id']; ?>">
						<input type="submit" value="Delete" class="btn">
						</form>
					</td>
				</tr>
				<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
		<a href="addrecord.php" class="btn btn-success btn-large">Add a new record</a>
	</div>
	<footer class="navbar navbar-fixed-bottom">
		<span>2015 Denis Gurtovenko</span>
	</footer>
</div>
</div>
</body>
</html>