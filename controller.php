<?php
try
{
	$dsn = 'mysql:host=localhost;dbname=webinse';
	$user = 'root';
	$password = '';

	$pdo = new PDO($dsn, $user, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
	echo "Невозможно подключиться к базе данных! ".$e->getMessage();
	exit();
}

if (isset($_POST['addrecord']))
{
	try
	{
		$firstname = $_POST['firstname'];
		$secondname = $_POST['secondname'];
		$email = $_POST['email'];

		$data = array(
			'firstname'  => $firstname,
			'secondname' => $secondname,
			'email'      => $email
			);
		$sql = 'INSERT INTO users (firstname, secondname, email)
				VALUES (:firstname, :secondname, :email)';
		$sth = $pdo->prepare($sql);
		$sth->execute($data);
	}
	catch (PDOException $e)
	{
		echo "Ошибка добавления новой записи! ".$e->getMessage();
		exit();
	}
}

if (isset($_POST['updaterecord']))
{
	try
	{
		$data = array(
			'id'         => $_POST['id'],
			'firstname'  => $_POST['firstname'],
			'secondname' => $_POST['secondname'],
			'email'      => $_POST['email']
			);
		$sql = 'UPDATE users SET
			firstname = :firstname,
			secondname = :secondname,
			email = :email
			WHERE id = :id';
		$sth = $pdo->prepare($sql);
		$sth->execute($data);
	}
	catch (PDOException $e)
	{
		echo "Ошибка обновления записи! ".$e->getMessage();
		exit();
	}
}
if (isset($_GET['deleteuser']))
{
	try
	{
		$sql = 'DELETE FROM users WHERE id = :id';
		$sth = $pdo->prepare($sql);
		$sth->bindValue(':id', $_POST['id']);
		$sth->execute();
	}
	catch (PDOException $e)
	{
		echo "Ошибка удаления записи! ".$e->getMessage();
		exit();
	}
}
try
{
	$sql = 'SELECT * FROM users';
	$result = $pdo->query($sql);
}
catch (PDOException $e)
{
	echo "Ошибка при извлечении данных ".$e->getMessage();
	exit();
}
foreach ($result as $row)
{
	$users[] = array(
		'id'         => $row['id'],
		'firstname'  => $row['firstname'],
		'secondname' => $row['secondname'],
		'email'      => $row['email']
		);
}
if (isset($_GET['id']))
{
	try
	{
		$sql = 'SELECT * FROM users WHERE id ='.$_GET['id'];
		$result = $pdo->query($sql);
	}
	catch (PDOException $e)
	{
		echo "Ошибка при извлечении данных ".$e->getMessage();
		exit();
	}
}
$row = $result->fetch();
?>